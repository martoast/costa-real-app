{{-- ============================== AMENIDADES DE LA ZONA / REAL DEL MAR ============================== --}}
@php
    $amenities = [
        [
            't' => 'Campo de golf',
            'sub' => 'Deporte y recreación',
            'desc' => 'Campo de golf profesional con extensos greens y vistas panorámicas al Océano Pacífico. Un entorno diseñado para jugar todo el año frente al mar.',
            'tags' => ['Frente al Pacífico', 'Driving range', 'Clases'],
            'imgs' => ['rdm-golf-1', 'rdm-golf-2', 'rdm-golf-3', 'rdm-golf-4', 'rdm-golf-5', 'rdm-golf-6', 'rdm-golf-7'],
        ],
        [
            't' => 'Hotel Real del Mar',
            'sub' => 'Servicios y comunidad',
            'desc' => 'Hospedaje estilo resort boutique con alberca, restaurantes y áreas de relajación integradas al paisaje costero de Real del Mar.',
            'tags' => ['Alberca', 'Restaurantes', 'Vista al mar'],
            'imgs' => ['rdm-hotel-1', 'rdm-hotel-2', 'rdm-hotel-3', 'rdm-hotel-4', 'rdm-hotel-5', 'rdm-hotel-6', 'rdm-hotel-7', 'rdm-hotel-8', 'rdm-hotel-9', 'rdm-hotel-10'],
        ],
        [
            't' => 'Pádel y tenis',
            'sub' => 'Deporte y recreación',
            'desc' => 'Canchas de pádel y tenis dentro de la comunidad para mantener un estilo de vida activo, a unos pasos de casa.',
            'tags' => ['Pádel', 'Tenis', 'Iluminadas'],
            'imgs' => ['rdm-padel-1', 'rdm-padel-2', 'rdm-padel-3', 'rdm-padel-4', 'rdm-padel-5'],
        ],
        [
            't' => 'Club hípico',
            'sub' => 'Deporte y recreación',
            'desc' => 'Club hípico frente al mar. Clases y paseos ecuestres con una ubicación privilegiada sobre la costa del Pacífico.',
            'tags' => ['Frente al mar', 'Clases', 'Paseos'],
            'imgs' => ['rdm-hipico-1', 'rdm-hipico-2', 'rdm-hipico-3'],
        ],
        [
            't' => 'Naturaleza y vistas',
            'sub' => 'Entorno natural',
            'desc' => 'Senderos, jardines y miradores con vistas panorámicas al océano en cada rincón de Real del Mar. Arquitectura contemporánea integrada al paisaje.',
            'tags' => ['Senderos', 'Jardines', 'Miradores'],
            'imgs' => ['rdm-natura-1', 'rdm-natura-2', 'rdm-natura-3', 'rdm-natura-4', 'rdm-natura-5', 'rdm-natura-6', 'rdm-natura-7'],
        ],
        [
            't' => 'Restaurante',
            'sub' => 'Servicios y comunidad',
            'desc' => 'Gastronomía dentro de la comunidad, sin salir de Real del Mar. Un punto de encuentro para residentes y visitantes.',
            'tags' => ['Gastronomía', 'Dentro de la comunidad'],
            'imgs' => ['rdm-am-restaurante.webp'],
        ],
        [
            't' => 'Escuela',
            'sub' => 'Servicios y comunidad',
            'desc' => 'Educación a unos minutos de casa: escuela dentro del entorno de Real del Mar para la vida familiar de todos los días.',
            'tags' => ['Educación', 'Vida familiar'],
            'imgs' => ['rdm-am-escuela.webp'],
        ],
        [
            't' => 'Capilla',
            'sub' => 'Comunidad',
            'desc' => 'Una capilla dentro de la comunidad, rodeada de jardines y áreas de tranquilidad para el encuentro y la reflexión.',
            'tags' => ['Capilla', 'Jardines'],
            'imgs' => ['rdm-capilla-1', 'rdm-natura-7', 'rdm-natura-4'],
        ],
    ];

    // Build the JS payload with resolved asset URLs (cover = first image).
    // Entries without an extension are .jpg; .webp entries carry their own.
    $img = fn ($i) => asset('images/' . (str_contains($i, '.') ? $i : $i . '.jpg'));
    $amenitiesJs = collect($amenities)->map(fn ($a) => [
        't' => $a['t'],
        'sub' => $a['sub'],
        'desc' => $a['desc'],
        'tags' => $a['tags'],
        'cover' => $img($a['imgs'][0]),
        'gallery' => collect($a['imgs'])->map($img)->values(),
    ])->values();
@endphp

<section id="zona" class="overflow-hidden bg-sand-50 py-24 lg:py-32"
    x-data="amenities(@js($amenitiesJs))">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="flex flex-col gap-8 md:flex-row md:items-end md:justify-between">
            <div class="reveal-group max-w-xl">
                <p class="eyebrow text-gold-500">Entorno</p>
                <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Real del Mar lo tiene <span class="accent-italic">todo</span></h2>
                <p class="mt-5 text-lg leading-relaxed text-ink-soft">Un entorno completo para vivir la vida que mereces. Toca cada tarjeta para ver más.</p>
            </div>
            <div class="flex gap-3">
                <button @click="nudge(-1)" aria-label="Anterior"
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-ink/15 text-ink transition-colors hover:border-ink/40 hover:bg-ink hover:text-sand-50">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="nudge(1)" aria-label="Siguiente"
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-ink/15 text-ink transition-colors hover:border-ink/40 hover:bg-ink hover:text-sand-50">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Slider --}}
    <div x-ref="track"
        class="mt-12 flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth px-6 pb-2 lg:px-10 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        <template x-for="(a, idx) in items" :key="idx">
            <article data-card class="group w-[70vw] shrink-0 snap-start sm:w-[320px] lg:w-[360px]">
                <button type="button" @click="show(idx)"
                    class="relative block w-full overflow-hidden rounded-2xl bg-ocean-950 text-left shadow-lg shadow-ink/5 ring-1 ring-transparent transition-shadow hover:ring-gold-400/60">
                    <img :src="a.cover" :alt="a.t + ' en Real del Mar'" loading="lazy"
                        class="aspect-[3/4] w-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/85 via-ocean-950/10 to-transparent"></div>
                    {{-- count badge --}}
                    <span class="absolute right-4 top-4 inline-flex items-center gap-1.5 rounded-full bg-ocean-950/55 px-3 py-1.5 text-[0.6rem] font-semibold uppercase tracking-wider text-sand-50 backdrop-blur-sm">
                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v14H4z M4 15l4-4 4 4 M14 13l2-2 4 4"/></svg>
                        <span x-text="a.gallery.length"></span>
                    </span>
                    <div class="absolute inset-x-0 bottom-0 p-6">
                        <p class="eyebrow mb-1 text-[0.55rem] text-gold-300" x-text="a.sub"></p>
                        <h3 class="display text-2xl text-sand-50" x-text="a.t"></h3>
                        <span class="mt-2 inline-flex items-center gap-1.5 text-[0.7rem] font-medium text-sand-100/90 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            Ver galería
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </button>
            </article>
        </template>
        <div class="w-2 shrink-0 lg:w-6" aria-hidden="true"></div>
    </div>

    {{-- ============================== BENTO MODAL ============================== --}}
    <div x-show="open" x-cloak
        class="fixed inset-0 z-[95] flex items-end justify-center sm:items-center"
        @keydown.escape.window="close()" role="dialog" aria-modal="true">
        {{-- backdrop --}}
        <div x-show="open" x-transition.opacity
            class="absolute inset-0 bg-ocean-950/80 backdrop-blur-sm" @click="close()"></div>

        {{-- panel --}}
        <div x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-8 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            class="relative m-0 flex max-h-[92svh] w-full max-w-5xl flex-col overflow-hidden rounded-t-3xl bg-sand-50 shadow-2xl sm:m-6 sm:max-h-[90svh] sm:rounded-3xl">
            {{-- header --}}
            <div class="flex items-start justify-between gap-6 border-b border-ink/10 p-6 sm:p-8">
                <div class="min-w-0" x-show="active">
                    <p class="eyebrow text-[0.6rem] text-gold-500" x-text="active?.sub"></p>
                    <h3 class="display mt-2 text-3xl font-light text-ink sm:text-4xl" x-text="active?.t"></h3>
                    <p class="mt-3 max-w-2xl text-sm leading-relaxed text-ink-soft" x-text="active?.desc"></p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <template x-for="(tag, ti) in (active?.tags || [])" :key="ti">
                            <span class="rounded-full bg-olive-500/10 px-3 py-1.5 text-[0.7rem] font-medium text-olive-700" x-text="tag"></span>
                        </template>
                    </div>
                </div>
                <button type="button" @click="close()" aria-label="Cerrar"
                    class="shrink-0 rounded-full border border-ink/15 p-2.5 text-ink transition-colors hover:bg-ink hover:text-sand-50">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/></svg>
                </button>
            </div>

            {{-- bento grid --}}
            <div class="grow overflow-y-auto p-4 sm:p-6">
                <div class="grid auto-rows-[120px] grid-cols-2 gap-3 sm:auto-rows-[150px] sm:grid-cols-4">
                    <template x-for="(img, gi) in (active?.gallery || [])" :key="gi">
                        <button type="button" @click="lightbox(gi)"
                            class="group relative overflow-hidden rounded-xl bg-ocean-950" :class="span(gi)">
                            <img :src="img" :alt="active?.t" loading="lazy"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-ocean-950/0 transition-colors group-hover:bg-ocean-950/15"></div>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    {{-- fullscreen image viewer (from bento) --}}
    <div x-show="viewer" x-cloak x-transition.opacity
        class="fixed inset-0 z-[97] flex items-center justify-center bg-ocean-950/95 p-4"
        @keydown.escape.window="viewer = false"
        @keydown.arrow-right.window="viewer && viewNext()"
        @keydown.arrow-left.window="viewer && viewPrev()"
        @click.self="viewer = false">
        <button type="button" @click="viewPrev()" aria-label="Anterior"
            class="absolute left-3 top-1/2 -translate-y-1/2 rounded-full bg-sand-50/10 p-3 text-sand-50 backdrop-blur-sm transition-colors hover:bg-sand-50/25 sm:left-6">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <div class="relative flex max-h-[88svh] max-w-full flex-col items-center gap-4">
            <img :src="(active?.gallery || [])[vi]" :alt="active?.t" class="max-h-[80svh] max-w-full rounded-xl object-contain">
            {{-- counter --}}
            <span class="rounded-full bg-sand-50/10 px-4 py-1.5 text-[0.7rem] font-medium tracking-wider text-sand-50 backdrop-blur-sm">
                <span x-text="vi + 1"></span> / <span x-text="(active?.gallery || []).length"></span>
            </span>
        </div>
        <button type="button" @click="viewNext()" aria-label="Siguiente"
            class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-sand-50/10 p-3 text-sand-50 backdrop-blur-sm transition-colors hover:bg-sand-50/25 sm:right-6">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </button>
        <button type="button" @click="viewer = false" aria-label="Cerrar"
            class="absolute right-4 top-4 rounded-full bg-sand-50/10 p-2.5 text-sand-50 backdrop-blur-sm transition-colors hover:bg-sand-50/25">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
    </div>
</section>
