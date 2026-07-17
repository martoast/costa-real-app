{{-- ============================== CONOCE COSTA REAL ============================== --}}
<section id="proyecto" class="bg-sand-50 py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            {{-- Text --}}
            <div class="reveal-group">
                <p class="eyebrow text-gold-500">Conoce Costa Real</p>
                <h2 class="display mt-5 text-4xl font-light text-ink sm:text-5xl">Terrenos residenciales con <span class="accent-italic">financiamiento directo</span></h2>
                <p class="mt-6 text-lg leading-relaxed text-ink-soft">
                    Terrenos desde 296 m² con financiamiento directo de hasta 5 años, en una ubicación privilegiada dentro de Real del Mar.
                </p>

                <dl class="mt-8 grid grid-cols-2 gap-x-6 gap-y-5 sm:grid-cols-4">
                    @foreach ([
                        ['n' => '296', 'l' => 'm² desde'],
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

            </div>

            {{-- Image --}}
            <div class="reveal overflow-hidden rounded-3xl shadow-xl shadow-ink/10">
                <img src="{{ asset('images/costa-campo-golf.jpg') }}" alt="Campo de golf en Costa Real · Real del Mar" loading="lazy"
                    class="aspect-[4/3] w-full object-cover">
            </div>
        </div>
    </div>
</section>
