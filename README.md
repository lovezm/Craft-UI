# Craft UI

CraftUI is a hand-drawn style theme for Typecho blogs, built with vanilla JavaScript, CSS, and SVG.

[Live Demo](https://9yo.cc)

## Features

- **Hand-drawn aesthetic** - SVG filters (`feTurbulence` + `feDisplacementMap`) create organic wobble effects on borders, shapes, and lines
- **Real-time theme panel** - Change primary color, background, fonts, wobble intensity, and line weight live
- **Cursor trails** - Star or bubble particles follow your cursor
- **Rich components** - Typography, code blocks with syntax highlighting, callouts, tags, tables, modals, toasts, accordions, progress bars, avatars, and more
- **Custom fonts** - Bundled Chinese and Latin hand-drawn fonts
- **Animations** - Float, swing, spin, twinkle, pulse, and squiggly motion effects
- **Confetti** - Click-to-celebrate effect
- **Article TOC** - Auto-generated table of contents for long-form content
- **Dark mode ready** - Theme panel switches to dark backgrounds with adjusted text colors

## Quick Start

```bash
npm install
npm run dev
```

Open `http://localhost:5173` in your browser.

## Build

```bash
npm run build
```

Production files will be output to the `dist/` directory.

## Project Structure

```text
├── main.js              # Entry point, orchestrates all modules
├── svg-filters.js       # SVG filters + shape generators
├── interactive.js       # UI interactions (modals, toasts, etc.)
├── theme.js             # Theme panel, back-to-top, article TOC
├── cursor-trail.js      # Mouse trail particles
├── confetti.js          # Confetti burst effect
├── style.css            # Core styles and CSS variables
├── blog-components.css  # Blog-specific components
└── public/fonts/        # Custom hand-drawn fonts
```

## How It Works

The hand-drawn look comes from two systems working together:

1. **SVG Filters** - Injected into the DOM via `createSVGFilters()`. The `#hand-drawn` filter uses `feTurbulence` to generate noise and `feDisplacementMap` to distort element edges.

2. **CSS `filter: url(#hand-drawn)`** - The `.hand-drawn-border` class applies these filters to elements, making straight borders appear naturally wobbly.

Theming is driven entirely by CSS custom properties (e.g. `--primary`, `--bg`, `--text`), updated in real-time by the theme panel.

## License

MIT
