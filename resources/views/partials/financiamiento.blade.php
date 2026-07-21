{{-- ============================== FINANCIAMIENTO DIRECTO ============================== --}}
<section id="financiamiento" class="bg-ocean-950 py-24 text-sand-50 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="reveal-group max-w-2xl">
            <p class="eyebrow text-gold-300">Financiamiento directo</p>
            <h2 class="display mt-5 text-4xl font-light sm:text-5xl">Adquiere tu terreno con <span class="accent-italic">financiamiento directo</span></h2>
        </div>

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['n' => '$575', 'u' => 'USD/m²', 'l' => 'Precio desde'],
                ['n' => '296', 'u' => 'm²', 'l' => 'Terrenos desde'],
                ['n' => '25%', 'u' => 'de enganche', 'l' => 'Para apartar tu lote'],
                ['n' => '5', 'u' => 'años', 'l' => 'Financiamiento directo hasta'],
                ['n' => '24', 'u' => 'meses sin intereses', 'l' => 'Primeros pagos'],
                ['n' => '6%', 'u' => 'interés anual', 'l' => 'Posterior a los 24 meses'],
            ] as $card)
                <div class="reveal rounded-3xl border border-sand-50/15 bg-sand-50/[0.04] p-8 text-center backdrop-blur-sm lg:p-10">
                    <p class="eyebrow text-[0.6rem] text-gold-300">{{ $card['l'] }}</p>
                    <p class="display mt-4 text-5xl font-light tabular-nums lg:text-6xl">{{ $card['n'] }}</p>
                    <p class="eyebrow mt-2 text-[0.6rem] text-sand-200/60">{{ $card['u'] }}</p>
                </div>
            @endforeach
        </div>

        <p class="reveal mt-10 text-center text-sm text-sand-200/70">Consulta disponibilidad, medidas y condiciones actualizadas con nuestro equipo de ventas.</p>
        <p class="reveal mt-3 text-center text-xs text-sand-200/45">Precios y condiciones sujetos a cambio sin previo aviso.</p>
        <div class="reveal mt-8 text-center">
            <a href="#contacto" class="eyebrow inline-flex items-center justify-center rounded-full bg-city-white px-8 py-4 text-[0.7rem] text-city-blue transition-colors hover:bg-sand-200">Solicitar plan de pago</a>
        </div>
    </div>
</section>
