import './style.css';
import './blog-components.css';
import { createSVGFilters, generateHandDrawnRect, generateHandDrawnCircle, generateHandDrawnLine, generateBlob, generateStar, generateFlower, generateWaveLine, generateLaurelWreath } from './svg-filters.js';
import { initThemePanel, initBackToTop, initArticleTOC } from './theme.js';
import { initCursorTrail } from './cursor-trail.js';
import { initConfetti } from './confetti.js';
import { initCodeCopy, initModal, initToast, initAccordion, initCustomSelect } from './interactive.js';

createSVGFilters();

renderLogoIcon();
renderHeroDecorations();
renderShapes();
renderDividers();
renderCardIcons();
renderDecorations();
renderAnimShapes();
renderFloatingStars();

initThemePanel();
initBackToTop();
initArticleTOC();
initCursorTrail();
initConfetti();
initCodeCopy();
initModal();
initToast();
initAccordion();
initCustomSelect();
initScrollReveal();

function renderLogoIcon() {
  const el = document.getElementById('logo-icon');
  const svg = `<svg width="36" height="36" viewBox="0 0 36 36">
    ${generateBlob(18, 18, 16, { fill: '#e07a5f', stroke: '#3d3229', strokeWidth: 2, seed: 42 })}
    ${generateStar(18, 18, 8, 4, 5, { fill: '#fdf6e3', stroke: '#3d3229', strokeWidth: 1.5, seed: 43 })}
  </svg>`;
  el.innerHTML = svg;
}

function renderHeroDecorations() {
  const el = document.getElementById('hero-decorations');
  const decos = [];

  decos.push(`<svg style="position:absolute;top:10%;left:5%;opacity:0.15" width="60" height="60" viewBox="0 0 60 60">
    ${generateStar(30, 30, 28, 12, 5, { fill: '#f2cc8f', stroke: '#3d3229', strokeWidth: 1.5, seed: 10 })}
  </svg>`);

  decos.push(`<svg style="position:absolute;top:20%;right:8%;opacity:0.12" width="50" height="50" viewBox="0 0 50 50">
    ${generateFlower(25, 25, 22, { fill: '#e88d97', centerFill: '#f2cc8f', stroke: '#3d3229', seed: 20 })}
  </svg>`);

  decos.push(`<svg style="position:absolute;bottom:15%;left:10%;opacity:0.1" width="80" height="80" viewBox="0 0 80 80">
    ${generateBlob(40, 40, 35, { fill: '#81b29a', stroke: '#3d3229', strokeWidth: 1.5, seed: 30 })}
  </svg>`);

  decos.push(`<svg style="position:absolute;bottom:10%;right:5%;opacity:0.15" width="40" height="40" viewBox="0 0 40 40">
    ${generateHandDrawnCircle(20, 20, 16, { fill: 'none', stroke: '#3d85c6', strokeWidth: 2, seed: 40 })}
  </svg>`);

  el.innerHTML = decos.join('');
}

function renderShapes() {
  const grid = document.getElementById('shapes-grid');
  const shapes = [
    {
      label: 'Rectangle',
      svg: `<svg width="100" height="70" viewBox="0 0 100 70">${generateHandDrawnRect(5, 5, 90, 60, { fill: '#fdf6e3', stroke: '#3d3229', strokeWidth: 2, seed: 1 })}</svg>`
    },
    {
      label: 'Circle',
      svg: `<svg width="80" height="80" viewBox="0 0 80 80">${generateHandDrawnCircle(40, 40, 35, { fill: '#fdf6e3', stroke: '#3d3229', strokeWidth: 2, seed: 2 })}</svg>`
    },
    {
      label: 'Blob',
      svg: `<svg width="90" height="90" viewBox="0 0 90 90">${generateBlob(45, 45, 38, { fill: '#FFE4B5', stroke: '#3d3229', strokeWidth: 2, seed: 3 })}</svg>`
    },
    {
      label: 'Star',
      svg: `<svg width="80" height="80" viewBox="0 0 80 80">${generateStar(40, 40, 35, 15, 5, { fill: '#FFD700', stroke: '#3d3229', strokeWidth: 2, seed: 4 })}</svg>`
    },
    {
      label: 'Flower',
      svg: `<svg width="80" height="80" viewBox="0 0 80 80">${generateFlower(40, 40, 35, { fill: '#FFB6C1', centerFill: '#FFD700', stroke: '#3d3229', seed: 5 })}</svg>`
    },
    {
      label: 'Triangle',
      svg: `<svg width="80" height="80" viewBox="0 0 80 80">${generateTriangleSVG()}</svg>`
    },
    {
      label: 'Ellipse',
      svg: `<svg width="100" height="60" viewBox="0 0 100 60">${generateHandDrawnCircle(50, 30, 40, { fill: '#E8D5B7', stroke: '#3d3229', strokeWidth: 2, seed: 7 })}</svg>`
    },
  ];

  grid.innerHTML = shapes.map(s => `
    <div class="shape-item">
      ${s.svg}
      <span class="shape-label">${s.label}</span>
    </div>
  `).join('');
}

function generateTriangleSVG() {
  const points = [[40, 8], [72, 68], [8, 68]];
  let d = `M ${points[0][0]},${points[0][1]}`;
  for (let i = 1; i < points.length; i++) {
    const prev = points[i - 1];
    const curr = points[i];
    const mx = (prev[0] + curr[0]) / 2 + (Math.random() - 0.5) * 3;
    const my = (prev[1] + curr[1]) / 2 + (Math.random() - 0.5) * 3;
    d += ` Q ${mx},${my} ${curr[0]},${curr[1]}`;
  }
  const last = points[points.length - 1];
  const first = points[0];
  const mx = (last[0] + first[0]) / 2 + (Math.random() - 0.5) * 3;
  const my = (last[1] + first[1]) / 2 + (Math.random() - 0.5) * 3;
  d += ` Q ${mx},${my} ${first[0]},${first[1]} Z`;
  return `<path d="${d}" fill="#D4E6B5" stroke="#3d3229" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`;
}

function renderDividers() {
  const straight = document.getElementById('divider-straight');
  if (straight) {
    straight.innerHTML = `<svg width="600" height="12" viewBox="0 0 600 12">${generateHandDrawnLine(5, 6, 595, 6, { stroke: '#3d3229', strokeWidth: 2, seed: 10 })}</svg>`;
  }

  const wave = document.getElementById('divider-wave');
  if (wave) {
    wave.innerHTML = `<svg width="600" height="24" viewBox="0 0 600 24">${generateWaveLine(5, 12, 595, 12, { stroke: '#e07a5f', strokeWidth: 2, amplitude: 6, frequency: 5, seed: 11 })}</svg>`;
  }

  const dashed = document.getElementById('divider-dashed');
  if (dashed) {
    dashed.innerHTML = `<svg width="600" height="12" viewBox="0 0 600 12">${generateHandDrawnLine(5, 6, 595, 6, { stroke: '#81b29a', strokeWidth: 2, seed: 12 }).replace('/>', ' stroke-dasharray="10,8"/>')}</svg>`;
  }

  const stars = document.getElementById('divider-stars');
  if (stars) {
    let svg = '<svg width="600" height="20" viewBox="0 0 600 20">';
    svg += generateHandDrawnLine(5, 10, 260, 10, { stroke: '#3d3229', strokeWidth: 1, seed: 13 });
    for (let i = 0; i < 3; i++) {
      svg += generateStar(290 + i * 20, 10, 7, 3, 5, { fill: '#f2cc8f', stroke: '#3d3229', strokeWidth: 1, seed: 14 + i });
    }
    svg += generateHandDrawnLine(340, 10, 595, 10, { stroke: '#3d3229', strokeWidth: 1, seed: 15 });
    svg += '</svg>';
    stars.innerHTML = svg;
  }

  const ornament = document.getElementById('divider-ornament');
  if (ornament) {
    let svg = '<svg width="600" height="24" viewBox="0 0 600 24">';
    svg += generateHandDrawnLine(5, 12, 250, 12, { stroke: '#3d3229', strokeWidth: 1.5, seed: 16 });
    svg += generateFlower(300, 12, 10, { fill: '#FFB6C1', centerFill: '#FFD700', stroke: '#3d3229', strokeWidth: 1, petals: 5, seed: 17 });
    svg += generateHandDrawnLine(350, 12, 595, 12, { stroke: '#3d3229', strokeWidth: 1.5, seed: 18 });
    svg += '</svg>';
    ornament.innerHTML = svg;
  }
}

function renderCardIcons() {
  document.getElementById('card-icon-1').innerHTML = `<svg width="48" height="48" viewBox="0 0 48 48">
    ${generateHandDrawnRect(4, 4, 40, 40, { fill: '#FFE4B5', stroke: '#3d3229', strokeWidth: 2, wobble: 0.8, seed: 50 })}
  </svg>`;

  document.getElementById('card-icon-2').innerHTML = `<svg width="48" height="48" viewBox="0 0 48 48">
    ${generateHandDrawnCircle(24, 24, 20, { fill: '#B5D4E6', stroke: '#3d3229', strokeWidth: 2, wobble: 0.6, seed: 51 })}
  </svg>`;

  document.getElementById('card-icon-3').innerHTML = `<svg width="48" height="48" viewBox="0 0 48 48">
    ${generateStar(24, 24, 20, 10, 5, { fill: '#FFD700', stroke: '#3d3229', strokeWidth: 2, seed: 52 })}
  </svg>`;
}

function renderDecorations() {
  const laurel = document.getElementById('laurel-container');
  laurel.innerHTML = `<div style="text-align:center">
    <svg width="120" height="120" viewBox="0 0 120 120">
      ${generateLaurelWreath(60, 60, 45, { seed: 60 })}
      <text x="60" y="65" text-anchor="middle" font-family="Patrick Hand" font-size="14" fill="#3d3229">Laurel</text>
    </svg>
  </div>`;

  const flower = document.getElementById('flower-container');
  flower.innerHTML = `<svg width="100" height="100" viewBox="0 0 100 100">
    ${generateFlower(50, 50, 40, { fill: '#FFB6C1', centerFill: '#FFD700', stroke: '#3d3229', petals: 6, seed: 70 })}
  </svg>`;

  const stars = document.getElementById('stars-container');
  let starsSvg = '<svg width="120" height="80" viewBox="0 0 120 80">';
  const colors = ['#FFD700', '#e07a5f', '#3d85c6', '#81b29a'];
  for (let i = 0; i < 5; i++) {
    const x = 15 + i * 22;
    const y = 30 + Math.sin(i * 1.2) * 15;
    const r = 8 + Math.random() * 4;
    starsSvg += generateStar(x, y, r, r * 0.4, 5, { fill: colors[i % colors.length], stroke: '#3d3229', strokeWidth: 1.5, seed: 80 + i });
  }
  starsSvg += '</svg>';
  stars.innerHTML = starsSvg;
}

function renderAnimShapes() {
  const shapes = {
    'anim-shape-float': () => `<svg width="50" height="50" viewBox="0 0 50 50">${generateBlob(25, 25, 20, { fill: '#FFE4B5', stroke: '#3d3229', seed: 90 })}</svg>`,
    'anim-shape-swing': () => `<svg width="50" height="50" viewBox="0 0 50 50">${generateStar(25, 25, 22, 10, 5, { fill: '#FFD700', stroke: '#3d3229', seed: 91 })}</svg>`,
    'anim-shape-spin': () => `<svg width="50" height="50" viewBox="0 0 50 50">${generateFlower(25, 25, 22, { fill: '#FFB6C1', centerFill: '#FFD700', stroke: '#3d3229', seed: 92 })}</svg>`,
    'anim-shape-twinkle': () => `<svg width="50" height="50" viewBox="0 0 50 50">${generateStar(25, 25, 22, 10, 4, { fill: '#B5D4E6', stroke: '#3d3229', seed: 93 })}</svg>`,
    'anim-shape-pulse': () => `<svg width="50" height="50" viewBox="0 0 50 50">${generateHandDrawnCircle(25, 25, 20, { fill: '#D4E6B5', stroke: '#3d3229', seed: 94 })}</svg>`,
    'anim-shape-squiggly': () => `<svg width="50" height="50" viewBox="0 0 50 50">${generateHandDrawnRect(5, 5, 40, 40, { fill: '#E8D5B7', stroke: '#3d3229', seed: 95 })}</svg>`,
  };

  Object.entries(shapes).forEach(([id, render]) => {
    const el = document.getElementById(id);
    if (el) el.innerHTML = render();
  });
}

function renderFloatingStars() {
  const container = document.getElementById('floating-stars');
  let html = '';
  for (let i = 0; i < 8; i++) {
    const x = Math.random() * 100;
    const y = Math.random() * 100;
    const size = 6 + Math.random() * 10;
    const delay = Math.random() * 3;
    html += `<div class="floating-star" style="left:${x}%;top:${y}%;animation-delay:${delay}s">
      <svg width="${size}" height="${size}" viewBox="0 0 20 20">
        ${generateStar(10, 10, 9, 4, 4, { fill: '#f2cc8f', stroke: 'none', strokeWidth: 0, seed: 200 + i })}
      </svg>
    </div>`;
  }
  container.innerHTML = html;
}

function initScrollReveal() {
  const sections = document.querySelectorAll('.section');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  sections.forEach(s => observer.observe(s));
}
