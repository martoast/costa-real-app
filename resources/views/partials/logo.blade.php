{{-- Costa Real wordmark (text-based — no logo asset yet).
     variant 'white' → fixed light wordmark (footer, preloader)
     variant 'auto'  → inherits currentColor so the nav can crossfade light ↔ dark. --}}
@php
    $variant = $variant ?? 'white';
    $color = $variant === 'auto' ? 'text-current' : 'text-sand-50';
@endphp
<span class="flex flex-col leading-none {{ $color }}" role="img" aria-label="Costa Real — Real del Mar">
    <span class="display text-xl font-light uppercase tracking-[0.18em] xl:text-2xl">Costa Real</span>
    <span class="eyebrow mt-1.5 text-[0.5rem] tracking-[0.32em] text-gold-400">Real del Mar</span>
</span>
