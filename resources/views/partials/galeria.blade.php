{{-- ============================== GALERÍA DEL DESARROLLO ============================== --}}
@php
    $galeria = [
        ['img' => 'costa-panorama.jpg',    't' => 'Vista del desarrollo', 'span' => 'lg:col-span-2 lg:row-span-2'],
        ['img' => 'costa-delimitada.jpg',  't' => 'Primera fase', 'span' => ''],
        ['img' => 'costa-vista-golf.jpg',  't' => 'Costa y campo de golf', 'span' => ''],
        ['img' => 'costa-enero.jpg',       't' => 'Accesos y vialidades', 'span' => ''],
        ['img' => 'costa-cielo.jpg',       't' => 'Entorno residencial', 'span' => ''],
        ['img' => 'costa-hero-desktop.jpg','t' => 'Real del Mar al atardecer', 'span' => 'lg:col-span-2'],
        ['img' => 'costa-hotel-rdm.jpg',   't' => 'Hotel Real del Mar', 'span' => ''],
        ['img' => 'rdm-golf-1.jpg',        't' => 'Campo de golf', 'span' => ''],
    ];
    $lb = collect($galeria)->map(fn ($e) => ['src' => asset('images/' . $e['img']), 't' => $e['t']])->values();
@endphp

<section id="galeria" class="bg-sand-50 py-24 lg:py-32"
    x-data="gallery(@js($lb))"
    @keydown.escape.window="open = false"
    @keydown.arrow-right.window="open && next()"
    @keydown.arrow-left.window="open && prev()">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-gold-500">Galería</p>
            <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Terrenos exclusivos en <span class="accent-italic">Real del Mar</span></h2>
            <p class="mt-4 text-base leading-relaxed text-ink-soft">El desarrollo, el entorno y el paisaje costero donde construirás tu residencia.</p>
        </div>

        <div class="reveal mt-12 grid auto-rows-[220px] grid-cols-2 gap-4 lg:grid-cols-4">
            @foreach ($galeria as $e)
                <button type="button" @click="show({{ $loop->index }})"
                    class="group relative overflow-hidden rounded-2xl bg-ocean-950 {{ $e['span'] }}">
                    <img src="{{ asset('images/' . $e['img']) }}" alt="{{ $e['t'] }} — Costa Real" loading="lazy"
                        class="h-full w-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/60 via-transparent to-transparent opacity-0 transition-opacity group-hover:opacity-100"></div>
                    <span class="eyebrow absolute bottom-4 left-4 text-[0.6rem] text-sand-50 opacity-0 transition-opacity group-hover:opacity-100">{{ $e['t'] }}</span>
                </button>
            @endforeach
        </div>
    </div>

    @include('partials.lightbox')
</section>
