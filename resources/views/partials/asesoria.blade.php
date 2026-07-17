{{-- ============================== CONTACTO ============================== --}}
<section id="contacto" class="bg-beige py-24 lg:py-32"
    x-data="{
        sending: false,
        sent: false,
        error: false,
        async submitForm(ev) {
            const form = ev.target;
            const data = Object.fromEntries(new FormData(form));
            if (data['bot-field']) { this.sent = true; return; } // honeypot: silently 'succeed'
            delete data['bot-field'];
            delete data['form-name'];
            data.form = 'asesoria';
            data.sitio = location.host;
            data.pagina = location.href;
            this.sending = true;
            this.error = false;
            try {
                const r = await fetch('{{ config('services.forms_webhook') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                });
                if (!r.ok) throw new Error('HTTP ' + r.status);
                this.sent = true;
                form.reset();
                if (window.fbq) fbq('track', 'Lead');
            } catch (e) {
                this.error = true;
            } finally {
                this.sending = false;
            }
        },
    }">
    <div class="mx-auto max-w-xl px-6 lg:px-10">
        <div class="reveal-group text-center">
            <p class="eyebrow text-gold-500">Contacto</p>
            <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Agenda una asesoría <span class="accent-italic">privada</span></h2>
            <p class="mx-auto mt-5 max-w-lg text-lg leading-relaxed text-ink-soft">Déjanos tus datos y un asesor de Real del Mar te contactará con disponibilidad, precios y opciones de financiamiento para adquirir tu terreno en Costa Real.</p>
        </div>

        {{-- Envío: webhook de Bolt CRM (fetch JSON) + popup de confirmación --}}
        <form name="asesoria" @submit.prevent="submitForm"
            class="reveal mt-12 space-y-4 rounded-3xl bg-white p-8 shadow-xl shadow-ink/10 ring-1 ring-ink/5 lg:p-10">
            <p class="hidden" aria-hidden="true"><label>No llenar: <input name="bot-field" tabindex="-1" autocomplete="off"></label></p>

            <input type="text" name="nombre" placeholder="Nombre" required autocomplete="name"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm focus:border-gold-400 focus:ring-gold-400">
            <input type="email" name="email" placeholder="Correo electrónico" required autocomplete="email"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm focus:border-gold-400 focus:ring-gold-400">
            <input type="tel" name="telefono" placeholder="Teléfono" required autocomplete="tel"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm focus:border-gold-400 focus:ring-gold-400">

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <button type="submit" :disabled="sending"
                    class="eyebrow flex-1 rounded-full bg-gold-500 px-8 py-4 text-[0.7rem] text-sand-50 transition-colors hover:bg-gold-400 disabled:cursor-wait disabled:opacity-60"
                    x-text="sending ? 'Enviando…' : 'Enviar solicitud'">Enviar solicitud</button>
                <a href="tel:+526646313458" onclick="if(window.fbq)fbq('track','Contact',{method:'call'})"
                    class="eyebrow flex flex-1 items-center justify-center gap-2 rounded-full border border-ink/20 px-8 py-4 text-[0.7rem] text-ink transition-colors hover:border-ink hover:bg-ink hover:text-sand-50">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M6.62 10.79a15.53 15.53 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.57 1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>
                    Llamar
                </a>
            </div>
            <p x-show="error" x-cloak class="pt-1 text-center text-xs text-red-600">No pudimos enviar tu solicitud. Intenta de nuevo o llámanos directamente.</p>
            <p class="pt-2 text-center text-[0.7rem] leading-relaxed text-ink-soft/70">Al enviar aceptas ser contactado por Real del Mar vía llamada, mensaje o correo electrónico. Tu información será tratada con privacidad.</p>
        </form>
    </div>

    {{-- ============================== POPUP DE CONFIRMACIÓN ============================== --}}
    <div x-show="sent" x-cloak
        class="fixed inset-0 z-[96] flex items-center justify-center p-6"
        @keydown.escape.window="sent = false" role="dialog" aria-modal="true" aria-label="Solicitud enviada">
        <div x-show="sent" x-transition.opacity class="absolute inset-0 bg-ink/80 backdrop-blur-sm" @click="sent = false"></div>
        <div x-show="sent"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            class="relative w-full max-w-md rounded-3xl bg-white p-10 text-center shadow-2xl">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500/15 text-emerald-600">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            </span>
            <h3 class="display mt-6 text-3xl font-light text-ink">¡Solicitud enviada!</h3>
            <p class="mt-3 text-sm leading-relaxed text-ink-soft">Gracias por tu interés en Costa Real. Un asesor de Real del Mar te contactará muy pronto con disponibilidad, precios y financiamiento.</p>
            <button type="button" @click="sent = false"
                class="eyebrow mt-7 inline-flex items-center justify-center rounded-full bg-gold-500 px-8 py-3.5 text-[0.65rem] text-sand-50 transition-colors hover:bg-gold-400">Entendido</button>
        </div>
    </div>
</section>
