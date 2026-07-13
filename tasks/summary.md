# Costa Real — Landing Page

## Overview
Landing page for **Costa Real**: exclusive residential land lots (terrenos) inside **Real del Mar**, Tijuana–Rosarito, B.C. Client: Ricardo. Cloned from the **Riviera Residencial** project — same design line, structure, and skin (the "Real del Mar look" the developer approved). Structural blueprint: `docs/landing-page-structure.md`.

## The offer (source: "Estructura Landing Page Costa Real.txt")
- Terrenos desde **290 m²**, desde **$575 USD/m²**
- **Financiamiento directo**: enganche 25%, hasta 5 años, 24 meses sin intereses, luego 6% anual
- **Primera fase ya en venta**
- Contact: ventas@realdelmar.com.mx · MX (664) 631-3458 · Km. 19.5 Escénica Tijuana–Rosarito

## Stack
- Laravel Blade + TailwindCSS v4 + Alpine.js, Vite
- Static export via `./build-static.sh` (SITE_URL baked into canonical/og tags)
- Netlify Forms (`asesoria` form → /gracias.html), floating WhatsApp

## Section order (Riviera archetypes, land-adapted)
hero → proyecto → video → primera-fase → terrenos → aspiracional → financiamiento → zona → ubicacion → galeria → asesoria → respaldo → cta-final

## Setup
```bash
composer install
npm install
./build-static.sh   # outputs ../dist
```
