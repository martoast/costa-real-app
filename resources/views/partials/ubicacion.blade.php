{{-- ============================== UBICACIÓN ============================== --}}
<section id="ubicacion" class="bg-ocean-950 py-24 text-sand-50 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            {{-- Text --}}
            <div class="reveal-group">
                <p class="eyebrow text-gold-300">Ubicación</p>
                <h2 class="display mt-5 text-4xl font-light sm:text-5xl">Conexión con lo <span class="accent-italic">esencial</span></h2>
                <p class="mt-4 text-lg text-gold-300">A solo 15 minutos de la garita de San Diego y 10 minutos de Rosarito.</p>
                <p class="mt-6 text-lg leading-relaxed text-sand-100/80">
                    Costa Real se encuentra dentro de Real del Mar, sobre la Escénica Tijuana–Rosarito, en una ubicación estratégica para quienes buscan construir cerca de la costa, con conexión rápida hacia Tijuana, Playas y Rosarito.
                </p>

                <ul class="mt-9 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    @foreach ([
                        'Dentro de Real del Mar',
                        'Km. 19.5, Escénica Tijuana–Rosarito',
                        'A 15 min de la garita de San Diego',
                        'A 10 min de Rosarito',
                        'Conexión con Playas de Tijuana',
                        'Adiós al tráfico',
                    ] as $punto)
                        <li class="flex items-start gap-3 text-sm text-sand-100/85">
                            <svg class="mt-0.5 h-4 w-4 shrink-0 text-gold-300" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg>
                            <span>{{ $punto }}</span>
                        </li>
                    @endforeach
                </ul>

                <a href="https://maps.google.com/?q=Real+del+Mar+Km+19.5+Escenica+Tijuana+Rosarito" target="_blank" rel="noopener"
                    class="eyebrow mt-9 inline-flex items-center justify-center rounded-full bg-gold-500 px-8 py-4 text-[0.7rem] text-sand-50 transition-colors hover:bg-gold-400">Ver ubicación en mapa</a>
            </div>

            {{-- Map --}}
            <div class="reveal overflow-hidden rounded-3xl border border-sand-50/15 shadow-xl shadow-ink/20">
                <iframe
                    title="Mapa de Costa Real en Real del Mar"
                    src="https://maps.google.com/maps?q=Real%20del%20Mar%20Km%2019.5%20Escenica%20Tijuana%20Rosarito&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    class="aspect-[4/3] w-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
