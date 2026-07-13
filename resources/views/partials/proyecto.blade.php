{{-- ============================== CONOCE COSTA REAL ============================== --}}
<section id="proyecto" class="bg-sand-50 py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            {{-- Text --}}
            <div class="reveal-group">
                <p class="eyebrow text-gold-500">Conoce Costa Real</p>
                <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Terrenos residenciales dentro de <span class="accent-italic">Real del Mar</span></h2>
                <p class="mt-6 text-lg leading-relaxed text-ink-soft">
                    Costa Real es una oportunidad para construir tu residencia dentro de Real del Mar, una comunidad consolidada que integra ubicación, entorno natural, servicios, amenidades y estilo de vida. Con terrenos desde 290 m², está diseñado para quienes buscan invertir en patrimonio dentro de un residencial privado con acceso a todo lo necesario para vivir, descansar y disfrutar.
                </p>

                <dl class="mt-10 grid grid-cols-2 gap-x-6 gap-y-5 sm:grid-cols-4">
                    @foreach ([
                        ['n' => '290', 'l' => 'm² desde'],
                        ['n' => '$575', 'l' => 'USD por m²'],
                        ['n' => '25%', 'l' => 'Enganche'],
                        ['n' => '5', 'l' => 'Años de financiamiento'],
                    ] as $stat)
                        <div>
                            <dt class="display text-4xl font-light text-ink">{{ $stat['n'] }}</dt>
                            <dd class="eyebrow mt-1 text-[0.55rem] text-ink-soft">{{ $stat['l'] }}</dd>
                        </div>
                    @endforeach
                </dl>

                <ul class="mt-8 flex flex-wrap gap-2.5">
                    @foreach (['Dentro de Real del Mar', 'Financiamiento directo', 'Primera fase en venta', 'Entorno consolidado'] as $tag)
                        <li class="rounded-full bg-olive-500/10 px-4 py-2 text-xs font-medium text-olive-700">{{ $tag }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Image --}}
            <div class="reveal overflow-hidden rounded-3xl shadow-xl shadow-ink/10">
                <img src="{{ asset('images/costa-panorama.jpg') }}" alt="Vista panorámica de Costa Real en Real del Mar" loading="lazy"
                    class="aspect-[4/3] w-full object-cover">
            </div>
        </div>
    </div>
</section>
