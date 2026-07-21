<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Lock scroll during the first-load preloader (safety-unlocks after 14s) --}}
    <script>
        document.documentElement.classList.add('is-loading');
        setTimeout(function () { document.documentElement.classList.remove('is-loading'); }, 14000);
    </script>

    @php
        $siteUrl = rtrim(config('app.url'), '/');
        $metaTitle = $title ?? 'Costa Real · Real del Mar — Terrenos residenciales en la costa de Tijuana';
        $metaDesc = $description ?? 'Costa Real: exclusivos terrenos desde 296 m² dentro de Real del Mar Residencial, con financiamiento directo, enganche del 25% y hasta 5 años de plazo. Construye tu residencia en la costa de Tijuana, rodeado de golf, hotel y amenidades.';
        $ogImage = $siteUrl . '/images/og-costa-real.jpg';
    @endphp
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <meta name="keywords" content="Costa Real, Real del Mar, terrenos Tijuana, terrenos Rosarito, lotes residenciales, financiamiento directo, Grupo Frisa, terrenos frente al mar, terrenos con golf, invertir Baja California">
    <meta name="author" content="Real del Mar · Grupo Frisa">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#021637">
    <link rel="canonical" href="{{ $siteUrl }}/">

    {{-- Icons --}}
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" href="/icon-512.png" sizes="512x512">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    {{-- Open Graph (WhatsApp, Facebook, iMessage, LinkedIn) — URLs must be absolute --}}
    <meta property="og:site_name" content="Costa Real">
    <meta property="og:title" content="Costa Real · Terrenos en Real del Mar">
    <meta property="og:description" content="Exclusivos terrenos desde 296 m² dentro de Real del Mar Residencial, con financiamiento directo. Construye tu residencia en la costa de Tijuana.">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:secure_url" content="{{ $ogImage }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Costa Real — terrenos residenciales dentro de Real del Mar">
    <meta property="og:url" content="{{ $siteUrl }}/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_MX">

    {{-- Twitter / X card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Costa Real · Terrenos en Real del Mar">
    <meta name="twitter:description" content="Terrenos desde 296 m² y $575 USD/m² dentro de Real del Mar, con financiamiento directo hasta 5 años.">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="Costa Real — Real del Mar">

    {{-- Structured data — Residential land development --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'ResidentialComplex',
        'name' => 'Costa Real',
        'description' => $metaDesc,
        'url' => $siteUrl . '/',
        'image' => $ogImage,
        'slogan' => 'Exclusivos terrenos en Real del Mar Residencial',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Km. 19.5, Escénica Tijuana–Rosarito, Real del Mar',
            'addressLocality' => 'Tijuana',
            'addressRegion' => 'Baja California',
            'postalCode' => '22565',
            'addressCountry' => 'MX',
        ],
        'developer' => ['@type' => 'Organization', 'name' => 'Real del Mar · Grupo Frisa'],
        'broker' => ['@type' => 'RealEstateAgent', 'name' => 'Real del Mar', 'telephone' => '+52 664 115 8106', 'email' => 'ventas@cityinmobiliaria.mx'],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{ navSolid: false, navOpen: false }"
    @scroll.window.passive="navSolid = window.scrollY > 40"
    :class="navOpen ? 'overflow-hidden lg:overflow-auto' : ''"
>

    {{-- ============================== PRELOADER ============================== --}}
    <div id="preloader" class="fixed inset-0 z-[100] flex items-center justify-center bg-ocean-950">
        <div class="preloader-mark flex flex-col items-center text-sand-50">
            <div class="flex items-center">
                <img src="{{ asset('images/city-logo-blanco.png') }}" alt="City Inmobiliaria"
                    class="h-8 w-auto object-contain sm:h-9">
            </div>
            <div class="mt-10 h-px w-44 overflow-hidden rounded-full bg-sand-50/15">
                <div id="preloader-bar" class="h-full w-0 rounded-full bg-city-light transition-[width] duration-300 ease-out"></div>
            </div>
            <p id="preloader-pct" class="eyebrow mt-4 text-[0.55rem] text-sand-200/50">0%</p>
        </div>
    </div>

    @php
        $navLinks = [
            ['label' => 'Terrenos',       'href' => '#terrenos'],
            ['label' => 'Financiamiento', 'href' => '#financiamiento'],
            ['label' => 'Entorno',        'href' => '#zona'],
            ['label' => 'Ubicación',      'href' => '#ubicacion'],
        ];
    @endphp

    {{-- ============================== NAV ============================== --}}
    <header
        class="fixed inset-x-0 top-0 z-50 transition-all duration-500"
        :class="navSolid || navOpen ? 'bg-sand-50/95 backdrop-blur-sm shadow-[0_1px_0_0_rgba(35,32,25,0.08)]' : 'bg-transparent'"
    >
        <nav class="mx-auto flex max-w-7xl items-center gap-6 px-6 py-5 lg:gap-10 lg:px-10">
            {{-- Logo --}}
            <div class="flex shrink-0 justify-start">
                <a
                    href="#inicio"
                    class="group relative z-50 flex shrink-0 items-center"
                    aria-label="City Inmobiliaria — inicio"
                >
                    {{-- City logo — white/azul crossfade on the solid nav --}}
                    <span class="relative block">
                        <img src="{{ asset('images/city-logo-blanco.png') }}" alt="City Inmobiliaria"
                            class="block h-8 w-auto shrink-0 object-contain opacity-100 transition-opacity duration-500 sm:h-9 lg:h-10"
                            :class="navSolid || navOpen ? 'opacity-0' : 'opacity-100'">
                        <img src="{{ asset('images/city-logo-azul.png') }}" alt="City Inmobiliaria"
                            class="absolute left-0 top-0 block h-8 w-auto shrink-0 object-contain opacity-0 transition-opacity duration-500 sm:h-9 lg:h-10"
                            :class="navSolid || navOpen ? 'opacity-100' : 'opacity-0'">
                    </span>
                </a>
            </div>

            {{-- Desktop links — centered in the navbar --}}
            <div class="hidden flex-1 items-center justify-center gap-5 lg:flex xl:gap-6">
                @foreach ($navLinks as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="nav-link eyebrow whitespace-nowrap text-[0.65rem] transition-colors duration-300"
                        :class="navSolid ? 'text-ink-soft hover:text-gold-500' : 'text-sand-100 hover:text-white'"
                    >{{ $item['label'] }}</a>
                @endforeach
            </div>

            {{-- CTA + hamburger (right) --}}
            <div class="ml-auto flex shrink-0 items-center justify-end">
                <a
                    href="#contacto"
                    class="eyebrow z-50 hidden whitespace-nowrap rounded-full px-4 py-2.5 text-[0.65rem] text-sand-50 transition-all duration-300 bg-gold-500 hover:bg-gold-400 lg:inline-flex xl:px-5"
                ><span class="hidden xl:inline">Solicitar información</span><span class="xl:hidden">Contacto</span></a>

                {{-- Mobile hamburger --}}
                <button
                    class="relative z-50 flex h-10 w-10 flex-col items-center justify-center gap-1.5 lg:hidden"
                    @click="navOpen = !navOpen"
                    aria-label="Menú"
                >
                    <span class="block h-px w-6 transition-all duration-300"
                        :class="[navOpen ? 'translate-y-[3.5px] rotate-45' : '', navSolid || navOpen ? 'bg-ink' : 'bg-sand-50']"></span>
                    <span class="block h-px w-6 transition-all duration-300"
                        :class="[navOpen ? '-translate-y-[3.5px] -rotate-45' : '', navSolid || navOpen ? 'bg-ink' : 'bg-sand-50']"></span>
                </button>
            </div>
        </nav>

        {{-- Mobile menu --}}
        <div
            x-show="navOpen"
            x-collapse.duration.400ms
            class="lg:hidden"
        >
            <div class="space-y-1 border-t border-ink/5 bg-sand-50 px-6 pb-8 pt-4">
                @foreach ($navLinks as $item)
                    <a href="{{ $item['href'] }}" @click="navOpen = false"
                        class="display block py-3 text-2xl text-ink transition-colors hover:text-gold-500">{{ $item['label'] }}</a>
                @endforeach
                <a href="#contacto" @click="navOpen = false"
                    class="eyebrow mt-4 inline-block rounded-full bg-gold-500 px-6 py-3 text-[0.65rem] text-sand-50">Solicitar información</a>
            </div>
        </div>
    </header>

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- ============================== FOOTER ============================== --}}
    <footer class="bg-ocean-950 text-sand-200">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-10">
            <div class="grid gap-12 md:grid-cols-3">
                {{-- Brand + address --}}
                <div class="text-sand-50">
                    <div class="flex items-center gap-[18px]">
                        <img src="{{ asset('images/city-logo-blanco.png') }}" alt="City Inmobiliaria"
                            class="h-8 w-auto object-contain sm:h-9">
                        <span class="h-7 w-px shrink-0 bg-white/45 sm:h-8" aria-hidden="true"></span>
                        <img src="{{ asset('images/costa-real-logo.png') }}" alt="Costa Real"
                            class="h-5 w-auto object-contain sm:h-6">
                    </div>
                    <p class="mt-6 max-w-xs text-sm leading-relaxed text-sand-200/70">
                        Dentro de Real del Mar.<br>
                        Km. 19.5, Escénica Tijuana–Rosarito,<br>
                        22565 Tijuana, B.C.
                    </p>
                    <p class="mt-5 text-xs leading-relaxed text-sand-200/55">
                        Un desarrollo de Real del Mar · Grupo Frisa.
                    </p>
                </div>

                {{-- Quick links --}}
                <div>
                    <p class="eyebrow mb-5 text-[0.6rem] text-gold-300">El desarrollo</p>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#proyecto" class="transition-colors hover:text-gold-300">Conoce Costa Real</a></li>
                        <li><a href="#terrenos" class="transition-colors hover:text-gold-300">Terrenos</a></li>
                        <li><a href="#financiamiento" class="transition-colors hover:text-gold-300">Financiamiento directo</a></li>
                        <li><a href="#zona" class="transition-colors hover:text-gold-300">Entorno Real del Mar</a></li>
                        <li><a href="#ubicacion" class="transition-colors hover:text-gold-300">Ubicación</a></li>
                    </ul>
                </div>

                {{-- Contacto --}}
                <div>
                    <p class="eyebrow mb-5 text-[0.6rem] text-gold-300">Contacto</p>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="https://wa.me/526641158106" target="_blank" rel="noopener" class="inline-flex items-center gap-2 transition-colors hover:text-gold-300">
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.298.297-.497.1-.198.05-.371-.025-.52-.074-.149-.668-1.612-.916-2.207-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                WhatsApp · 664-115-8106
                            </a>
                        </li>
                        <li>
                            <a href="tel:6641158106" onclick="if(window.fbq)fbq('track','Contact',{method:'call'})" class="inline-flex items-center gap-2 transition-colors hover:text-gold-300">
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M6.62 10.79a15.53 15.53 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.57 1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>
                                Llamar · 664-115-8106
                            </a>
                        </li>
                        <li>
                            <a href="mailto:ventas@cityinmobiliaria.mx" class="inline-flex items-center gap-2 transition-colors hover:text-gold-300">
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.24-8 5-8-5V6.24l8 5 8-5v2z"/></svg>
                                ventas@cityinmobiliaria.mx
                            </a>
                        </li>
                    </ul>
                    <a href="#contacto" class="eyebrow mt-7 inline-flex items-center justify-center rounded-full bg-city-white px-7 py-3.5 text-[0.65rem] text-city-blue transition-colors hover:bg-sand-200">Agendar asesoría</a>
                </div>
            </div>

            <div class="mt-14 border-t border-sand-50/10 pt-8 text-xs leading-relaxed text-sand-200/50">
                <p>© {{ date('Y') }} Costa Real · Real del Mar. Todos los derechos reservados. · Aviso de Privacidad <span class="text-sand-200/30">· v1.0.3</span></p>
                <p class="mt-2">
                    Las imágenes mostradas son representaciones ilustrativas del proyecto y pueden variar respecto al producto final.
                    La información de medidas, precios, condiciones de financiamiento y disponibilidad está sujeta a cambios sin previo aviso.
                </p>
            </div>
        </div>
    </footer>

    {{-- ============================== FLOATING ACTIONS ============================== --}}
    @php
        // City Inmobiliaria — 664 115 8106
        $waNumber = '526641158106';
        $telNumber = '6641158106';
        $mapsUrl = 'https://maps.google.com/?q=Real+del+Mar+Km+19.5+Escenica+Tijuana+Rosarito';
        $waText = rawurlencode('Hola, me interesa Costa Real. ¿Me pueden enviar el inventario de terrenos disponibles?');
    @endphp
    <div class="fixed right-3 top-1/2 z-40 flex -translate-y-1/2 flex-col items-center gap-2.5 sm:right-6 sm:gap-3">
        {{-- Maps --}}
        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener" aria-label="Ver ubicación en Google Maps"
            class="flex h-10 w-10 items-center justify-center rounded-full bg-ocean-900 text-sand-50 shadow-lg shadow-ink/20 transition-transform duration-300 hover:scale-110 sm:h-12 sm:w-12">
            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current sm:h-6 sm:w-6"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg>
        </a>
        {{-- Call --}}
        <a href="tel:{{ $telNumber }}" aria-label="Llamar" onclick="if(window.fbq)fbq('track','Contact',{method:'call'})"
            class="flex h-10 w-10 items-center justify-center rounded-full bg-gold-500 text-sand-50 shadow-lg shadow-ink/20 transition-transform duration-300 hover:scale-110 sm:h-12 sm:w-12">
            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current sm:h-6 sm:w-6"><path d="M6.62 10.79a15.53 15.53 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.57 1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>
        </a>
        {{-- WhatsApp --}}
        <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank" rel="noopener" aria-label="WhatsApp" onclick="if(window.fbq)fbq('track','Contact',{method:'whatsapp'})"
            class="flex h-11 w-11 items-center justify-center rounded-full bg-[#25D366] shadow-lg shadow-ink/20 transition-transform duration-300 hover:scale-110 sm:h-14 sm:w-14">
            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-white sm:h-7 sm:w-7"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.298.297-.497.1-.198.05-.371-.025-.52-.074-.149-.668-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
    </div>

</body>
</html>
