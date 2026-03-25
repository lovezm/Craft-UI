let currentTrail = 'stars';
let throttleTimer = null;

export function initCursorTrail() {
  document.querySelectorAll('.trail-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.trail-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      currentTrail = btn.dataset.trail;
    });
  });

  document.addEventListener('mousemove', (e) => {
    if (currentTrail === 'none' || throttleTimer) return;
    throttleTimer = setTimeout(() => { throttleTimer = null; }, 50);

    if (currentTrail === 'stars') {
      createStarParticle(e.clientX, e.clientY);
    } else if (currentTrail === 'bubbles') {
      createBubbleParticle(e.clientX, e.clientY);
    }
  });
}

function createStarParticle(x, y) {
  const el = document.createElement('div');
  el.className = 'cursor-particle cursor-star';
  const size = 8 + Math.random() * 8;
  const colors = ['#FFD700', '#e07a5f', '#3d85c6', '#81b29a', '#f2cc8f'];
  const color = colors[Math.floor(Math.random() * colors.length)];

  el.innerHTML = `<svg width="${size}" height="${size}" viewBox="0 0 20 20">
    <polygon points="10,1 12.5,7.5 19,8 14,12.5 15.5,19 10,15.5 4.5,19 6,12.5 1,8 7.5,7.5"
      fill="${color}" stroke="none"/>
  </svg>`;

  el.style.left = (x - size / 2) + 'px';
  el.style.top = (y - size / 2) + 'px';
  document.body.appendChild(el);

  setTimeout(() => el.remove(), 1000);
}

function createBubbleParticle(x, y) {
  const el = document.createElement('div');
  el.className = 'cursor-particle cursor-bubble';
  const size = 6 + Math.random() * 12;
  el.style.width = size + 'px';
  el.style.height = size + 'px';
  el.style.left = (x - size / 2 + (Math.random() - 0.5) * 10) + 'px';
  el.style.top = (y - size / 2) + 'px';
  document.body.appendChild(el);

  setTimeout(() => el.remove(), 1500);
}
