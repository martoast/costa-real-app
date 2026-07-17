{{-- ============================== TERRENOS DISPONIBLES ============================== --}}
@php
    $terrenos = [
        [
            'nombre' => 'Lote residencial',
            'img' => 'costa-real-delimitada.jpg',
            'specs' => ['Desde 296 m²', 'Desde $575 USD/m²', 'Uso residencial', 'Primera fase', 'Dentro de Real del Mar', 'Financiamiento directo'],
            'texto' => 'Elige tu ubicación dentro de la primera fase y construye una residencia a la medida de tu proyecto de vida: una casa familiar, una inversión a futuro o un espacio diseñado por ti dentro de Real del Mar.',
        ],
    ];
@endphp

<section id="terrenos" class="bg-sand-100 py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-gold-500">Terrenos destacados</p>
            <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Terreno listo <span class="accent-italic">para construir</span></h2>
        </div>

        <div class="mt-14 grid gap-8">
            @foreach ($terrenos as $t)
                <article class="reveal group mx-auto w-full max-w-2xl overflow-hidden rounded-3xl bg-white shadow-lg shadow-ink/5 ring-1 ring-ink/5">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/' . $t['img']) }}" alt="{{ $t['nombre'] }} — Costa Real" loading="lazy"
                            class="aspect-[16/10] w-full object-cover object-[center_88%] transition-transform duration-[1.2s] ease-out group-hover:scale-105">
                    </div>
                    <div class="p-8">
                        <h3 class="display text-3xl font-light text-ink">{{ $t['nombre'] }}</h3>
                        <ul class="mt-5 grid grid-cols-2 gap-x-6 gap-y-2.5">
                            @foreach ($t['specs'] as $spec)
                                <li class="flex items-start gap-2 text-sm text-ink-soft">
                                    <svg class="mt-1 h-3.5 w-3.5 shrink-0 text-gold-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0L3.3 9.7a1 1 0 1 1 1.4-1.4l3.3 3.3 6.8-6.8a1 1 0 0 1 1.4 0z" clip-rule="evenodd"/></svg>
                                    <span>{{ $spec }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <p class="mt-6 text-sm leading-relaxed text-ink-soft">{{ $t['texto'] }}</p>
                        <a href="#contacto" class="eyebrow mt-7 inline-flex items-center justify-center rounded-full bg-ink px-6 py-3 text-[0.65rem] text-sand-50 transition-colors hover:bg-gold-500">Consultar disponibilidad</a>
                    </div>
                </article>
            @endforeach
        </div>

        <p class="reveal mt-8 text-center text-xs text-ink-soft/70">Inventario sujeto a disponibilidad. Solicita el inventario actualizado con medidas, ubicaciones y precios por lote.</p>
    </div>
</section>
