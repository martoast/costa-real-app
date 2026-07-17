{{-- ============================== HERO ============================== --}}
<section id="inicio" class="grain relative flex min-h-svh items-end justify-center overflow-hidden bg-ocean-950">
    {{-- Backdrop --}}
    <div class="absolute inset-0">
        <picture>
            {{-- Desktop gets the wide sunset aerial; mobile keeps the vertical crop --}}
            <source media="(min-width: 1024px)" srcset="{{ asset('images/costa-hero-desktop.jpg') }}">
            <img
                src="{{ asset('images/costa-hero.jpg') }}"
                alt="Costa Real — terrenos en Real del Mar"
                class="kenburns h-full w-full object-cover object-[center_62%] lg:object-center"
                fetchpriority="high"
            >
        </picture>
        <div class="absolute inset-0 bg-gradient-to-t from-ocean-950/75 via-transparent to-ocean-950/25"></div>
    </div>

    {{-- Copy — bottom-center, like every landing in this line --}}
    <div class="reveal-group is-revealed relative z-10 mx-auto w-full max-w-5xl px-6 pb-32 text-center sm:pb-20">
        <p class="font-sans text-base font-light leading-snug tracking-wide text-sand-100/95 drop-shadow-[0_2px_16px_rgba(10,26,38,0.75)] sm:text-lg">
            Exclusivos terrenos en <span class="font-bold text-sand-50">Real del Mar</span> Residencial
        </p>
        <h1 class="display mt-2 text-4xl font-light uppercase tracking-[0.02em] leading-[1.06] text-sand-50 drop-shadow-[0_2px_28px_rgba(10,26,38,0.7)] sm:text-5xl lg:whitespace-nowrap lg:text-7xl">
            Costa Real
        </h1>
        <p class="mx-auto mt-5 max-w-md text-sm leading-relaxed text-sand-100/90 drop-shadow-[0_2px_16px_rgba(10,26,38,0.7)] sm:max-w-xl sm:text-base">
            Construye tu residencia dentro de una de las comunidades más completas de la costa de Tijuana.
        </p>
    </div>
</section>
