{{-- ============================== CONTACTO ============================== --}}
<section id="contacto" class="bg-beige py-24 lg:py-32">
    <div class="mx-auto max-w-xl px-6 lg:px-10">
        <div class="reveal-group text-center">
            <p class="eyebrow text-gold-500">Contacto</p>
            <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Agenda una asesoría <span class="accent-italic">privada</span></h2>
            <p class="mx-auto mt-5 max-w-lg text-lg leading-relaxed text-ink-soft">Déjanos tus datos y un asesor de Real del Mar te contactará con disponibilidad, precios y opciones de financiamiento para adquirir tu terreno en Costa Real.</p>
        </div>

        <form name="asesoria" method="POST" data-netlify="true" netlify-honeypot="bot-field" action="/gracias.html"
            class="reveal mt-12 space-y-4 rounded-3xl bg-white p-8 shadow-xl shadow-ink/10 ring-1 ring-ink/5 lg:p-10">
            <input type="hidden" name="form-name" value="asesoria">
            <p class="hidden"><label>No llenar: <input name="bot-field"></label></p>

            <input type="text" name="nombre" placeholder="Nombre" required autocomplete="name"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm focus:border-gold-400 focus:ring-gold-400">
            <input type="email" name="email" placeholder="Correo electrónico" required autocomplete="email"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm focus:border-gold-400 focus:ring-gold-400">
            <input type="tel" name="telefono" placeholder="Teléfono" required autocomplete="tel"
                class="w-full rounded-xl border-ink/10 bg-sand-50 px-4 py-3.5 text-sm focus:border-gold-400 focus:ring-gold-400">

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <button type="submit"
                    class="eyebrow flex-1 rounded-full bg-gold-500 px-8 py-4 text-[0.7rem] text-sand-50 transition-colors hover:bg-gold-400">Enviar solicitud</button>
                <a href="tel:+526646313458" onclick="if(window.fbq)fbq('track','Contact',{method:'call'})"
                    class="eyebrow flex flex-1 items-center justify-center gap-2 rounded-full border border-ink/20 px-8 py-4 text-[0.7rem] text-ink transition-colors hover:border-ink hover:bg-ink hover:text-sand-50">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M6.62 10.79a15.53 15.53 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.57 1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>
                    Llamar
                </a>
            </div>
            <p class="pt-2 text-center text-[0.7rem] leading-relaxed text-ink-soft/70">Al enviar aceptas ser contactado por Real del Mar vía llamada, mensaje o correo electrónico. Tu información será tratada con privacidad.</p>
        </form>
    </div>
</section>
