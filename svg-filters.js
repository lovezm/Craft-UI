export function createSVGFilters() {
  const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  svg.setAttribute('width', '0');
  svg.setAttribute('height', '0');
  svg.style.position = 'absolute';
  svg.innerHTML = `
    <defs>
      <filter id="hand-drawn" x="-5%" y="-5%" width="110%" height="110%">
        <feTurbulence type="turbulence" baseFrequency="0.02" numOctaves="3" seed="1" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="2.5" xChannelSelector="R" yChannelSelector="G"/>
      </filter>

      <filter id="hand-drawn-strong" x="-5%" y="-5%" width="110%" height="110%">
        <feTurbulence type="turbulence" baseFrequency="0.03" numOctaves="4" seed="2" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="4" xChannelSelector="R" yChannelSelector="G"/>
      </filter>

      <filter id="pencil-texture" x="-10%" y="-10%" width="120%" height="120%">
        <feTurbulence type="fractalNoise" baseFrequency="0.6" numOctaves="4" seed="5" result="noise"/>
        <feComposite in="SourceGraphic" in2="noise" operator="in" result="textured"/>
        <feBlend in="SourceGraphic" in2="textured" mode="multiply"/>
      </filter>

      <filter id="ink-bleed" x="-5%" y="-5%" width="110%" height="110%">
        <feTurbulence type="turbulence" baseFrequency="0.04" numOctaves="2" seed="3" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="1.5" xChannelSelector="R" yChannelSelector="G" result="displaced"/>
        <feGaussianBlur in="displaced" stdDeviation="0.3"/>
      </filter>

      <filter id="squiggly-0">
        <feTurbulence baseFrequency="0.02" numOctaves="3" seed="0" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="2"/>
      </filter>
      <filter id="squiggly-1">
        <feTurbulence baseFrequency="0.02" numOctaves="3" seed="1" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="3"/>
      </filter>
      <filter id="squiggly-2">
        <feTurbulence baseFrequency="0.02" numOctaves="3" seed="2" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="2"/>
      </filter>
      <filter id="squiggly-3">
        <feTurbulence baseFrequency="0.02" numOctaves="3" seed="3" result="noise"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="3"/>
      </filter>

      <filter id="colored-pencil" x="-10%" y="-10%" width="120%" height="120%">
        <feTurbulence type="fractalNoise" baseFrequency="1.2" numOctaves="3" seed="10" result="grain"/>
        <feColorMatrix in="grain" type="saturate" values="0" result="bwgrain"/>
        <feBlend in="SourceGraphic" in2="bwgrain" mode="multiply"/>
      </filter>
    </defs>
  `;
  document.body.prepend(svg);
}

export function generateHandDrawnRect(x, y, w, h, opts = {}) {
  const {
    stroke = '#333',
    strokeWidth = 2,
    fill = 'none',
    wobble = 0.5,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  const wo = wobble * 3;

  const points = [
    [x + rand() * wo, y + rand() * wo],
    [x + w + rand() * wo, y + rand() * wo],
    [x + w + rand() * wo, y + h + rand() * wo],
    [x + rand() * wo, y + h + rand() * wo],
  ];

  let d = `M ${points[0][0]},${points[0][1]}`;
  for (let i = 1; i <= points.length; i++) {
    const p = points[i % points.length];
    const prev = points[(i - 1) % points.length];
    const mx = (prev[0] + p[0]) / 2 + (rand() - 0.5) * wo * 2;
    const my = (prev[1] + p[1]) / 2 + (rand() - 0.5) * wo * 2;
    d += ` Q ${mx},${my} ${p[0]},${p[1]}`;
  }
  d += ' Z';

  return `<path d="${d}" stroke="${stroke}" stroke-width="${strokeWidth}" fill="${fill}" stroke-linecap="round" stroke-linejoin="round"/>`;
}

export function generateHandDrawnCircle(cx, cy, r, opts = {}) {
  const {
    stroke = '#333',
    strokeWidth = 2,
    fill = 'none',
    wobble = 0.5,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  const segments = 8;
  const wo = wobble * 3;
  const points = [];

  for (let i = 0; i < segments; i++) {
    const angle = (i / segments) * Math.PI * 2;
    const rr = r + (rand() - 0.5) * wo * 2;
    points.push([
      cx + Math.cos(angle) * rr,
      cy + Math.sin(angle) * rr,
    ]);
  }

  let d = `M ${points[0][0]},${points[0][1]}`;
  for (let i = 1; i <= points.length; i++) {
    const p = points[i % points.length];
    const prev = points[(i - 1) % points.length];
    const cpAngle = ((i - 0.5) / segments) * Math.PI * 2;
    const cpR = r + (rand() - 0.5) * wo * 2;
    const cpx = cx + Math.cos(cpAngle) * cpR;
    const cpy = cy + Math.sin(cpAngle) * cpR;
    d += ` Q ${cpx},${cpy} ${p[0]},${p[1]}`;
  }
  d += ' Z';

  return `<path d="${d}" stroke="${stroke}" stroke-width="${strokeWidth}" fill="${fill}" stroke-linecap="round" stroke-linejoin="round"/>`;
}

export function generateHandDrawnLine(x1, y1, x2, y2, opts = {}) {
  const {
    stroke = '#333',
    strokeWidth = 2,
    wobble = 0.5,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  const wo = wobble * 2;
  const segments = 5;
  const points = [[x1, y1]];

  for (let i = 1; i < segments; i++) {
    const t = i / segments;
    points.push([
      x1 + (x2 - x1) * t + (rand() - 0.5) * wo * 3,
      y1 + (y2 - y1) * t + (rand() - 0.5) * wo * 3,
    ]);
  }
  points.push([x2, y2]);

  let d = `M ${points[0][0]},${points[0][1]}`;
  for (let i = 1; i < points.length; i++) {
    const prev = points[i - 1];
    const curr = points[i];
    const cpx = (prev[0] + curr[0]) / 2 + (rand() - 0.5) * wo;
    const cpy = (prev[1] + curr[1]) / 2 + (rand() - 0.5) * wo;
    d += ` Q ${cpx},${cpy} ${curr[0]},${curr[1]}`;
  }

  return `<path d="${d}" stroke="${stroke}" stroke-width="${strokeWidth}" fill="none" stroke-linecap="round"/>`;
}

export function generateBlob(cx, cy, r, opts = {}) {
  const {
    fill = '#FFE4B5',
    stroke = '#333',
    strokeWidth = 2,
    points: numPoints = 6,
    wobble = 0.4,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  const pts = [];

  for (let i = 0; i < numPoints; i++) {
    const angle = (i / numPoints) * Math.PI * 2;
    const rr = r * (0.8 + rand() * wobble);
    pts.push([cx + Math.cos(angle) * rr, cy + Math.sin(angle) * rr]);
  }

  let d = `M ${pts[0][0]},${pts[0][1]}`;
  for (let i = 0; i < pts.length; i++) {
    const curr = pts[i];
    const next = pts[(i + 1) % pts.length];
    const cpx = (curr[0] + next[0]) / 2 + (rand() - 0.5) * r * 0.3;
    const cpy = (curr[1] + next[1]) / 2 + (rand() - 0.5) * r * 0.3;
    d += ` Q ${cpx},${cpy} ${next[0]},${next[1]}`;
  }
  d += ' Z';

  return `<path d="${d}" fill="${fill}" stroke="${stroke}" stroke-width="${strokeWidth}" stroke-linecap="round"/>`;
}

export function generateStar(cx, cy, outerR, innerR, points, opts = {}) {
  const {
    fill = '#FFD700',
    stroke = '#333',
    strokeWidth = 2,
    wobble = 0.3,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  const wo = wobble * 3;
  const pts = [];

  for (let i = 0; i < points * 2; i++) {
    const angle = (i / (points * 2)) * Math.PI * 2 - Math.PI / 2;
    const r = i % 2 === 0 ? outerR : innerR;
    const rr = r + (rand() - 0.5) * wo;
    pts.push([cx + Math.cos(angle) * rr, cy + Math.sin(angle) * rr]);
  }

  let d = `M ${pts[0][0]},${pts[0][1]}`;
  for (let i = 1; i < pts.length; i++) {
    d += ` L ${pts[i][0]},${pts[i][1]}`;
  }
  d += ' Z';

  return `<path d="${d}" fill="${fill}" stroke="${stroke}" stroke-width="${strokeWidth}" stroke-linejoin="round"/>`;
}

export function generateFlower(cx, cy, r, opts = {}) {
  const {
    petals = 5,
    fill = '#FFB6C1',
    centerFill = '#FFD700',
    stroke = '#333',
    strokeWidth = 1.5,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  let svg = '';

  for (let i = 0; i < petals; i++) {
    const angle = (i / petals) * Math.PI * 2;
    const px = cx + Math.cos(angle) * r * 0.5;
    const py = cy + Math.sin(angle) * r * 0.5;
    const pr = r * (0.35 + rand() * 0.1);
    svg += generateHandDrawnCircle(px, py, pr, { fill, stroke, strokeWidth, wobble: 0.6, seed: seed + i });
  }

  svg += generateHandDrawnCircle(cx, cy, r * 0.2, { fill: centerFill, stroke, strokeWidth, wobble: 0.4, seed: seed + 99 });

  return svg;
}

export function generateWaveLine(x1, y1, x2, y2, opts = {}) {
  const {
    stroke = '#333',
    strokeWidth = 2,
    amplitude = 8,
    frequency = 4,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  const len = Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
  const angle = Math.atan2(y2 - y1, x2 - x1);
  const perpAngle = angle + Math.PI / 2;
  const segments = Math.max(20, Math.floor(len / 5));
  const points = [];

  for (let i = 0; i <= segments; i++) {
    const t = i / segments;
    const baseX = x1 + (x2 - x1) * t;
    const baseY = y1 + (y2 - y1) * t;
    const wave = Math.sin(t * Math.PI * 2 * frequency) * amplitude;
    const wobbleOffset = (rand() - 0.5) * 1.5;
    points.push([
      baseX + Math.cos(perpAngle) * (wave + wobbleOffset),
      baseY + Math.sin(perpAngle) * (wave + wobbleOffset),
    ]);
  }

  let d = `M ${points[0][0]},${points[0][1]}`;
  for (let i = 1; i < points.length; i++) {
    d += ` L ${points[i][0]},${points[i][1]}`;
  }

  return `<path d="${d}" stroke="${stroke}" stroke-width="${strokeWidth}" fill="none" stroke-linecap="round"/>`;
}

export function generateLaurelWreath(cx, cy, r, opts = {}) {
  const {
    stroke = '#2d5016',
    fill = '#4a8c1c',
    strokeWidth = 1.5,
    leaves = 8,
    seed = Math.random() * 100
  } = opts;

  const rand = seededRandom(seed);
  let svg = '';

  for (let side = -1; side <= 1; side += 2) {
    for (let i = 0; i < leaves; i++) {
      const angle = (Math.PI * 0.2) + (i / leaves) * Math.PI * 0.6;
      const lx = cx + side * Math.cos(angle) * r;
      const ly = cy - Math.sin(angle) * r;
      const leafAngle = angle * side + Math.PI / 2;
      const leafLen = r * (0.2 + rand() * 0.1);

      const tipX = lx + Math.cos(leafAngle) * leafLen;
      const tipY = ly + Math.sin(leafAngle) * leafLen;
      const cp1x = lx + Math.cos(leafAngle + 0.4) * leafLen * 0.7;
      const cp1y = ly + Math.sin(leafAngle + 0.4) * leafLen * 0.7;
      const cp2x = lx + Math.cos(leafAngle - 0.4) * leafLen * 0.7;
      const cp2y = ly + Math.sin(leafAngle - 0.4) * leafLen * 0.7;

      svg += `<path d="M ${lx},${ly} Q ${cp1x},${cp1y} ${tipX},${tipY} Q ${cp2x},${cp2y} ${lx},${ly} Z" fill="${fill}" stroke="${stroke}" stroke-width="${strokeWidth}"/>`;
    }
  }

  return svg;
}

function seededRandom(seed) {
  let s = seed;
  return () => {
    s = (s * 16807 + 0) % 2147483647;
    return (s - 1) / 2147483646;
  };
}
