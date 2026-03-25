export function initConfetti() {
  const btn = document.getElementById('confetti-btn');
  const container = document.getElementById('confetti-container');

  btn.addEventListener('click', () => {
    const colors = ['#e07a5f', '#3d85c6', '#81b29a', '#f2cc8f', '#FFD700', '#FFB6C1', '#c44536'];
    const rect = container.getBoundingClientRect();

    for (let i = 0; i < 40; i++) {
      const piece = document.createElement('div');
      piece.className = 'confetti-piece';
      const color = colors[Math.floor(Math.random() * colors.length)];
      const x = Math.random() * rect.width;
      const size = 6 + Math.random() * 8;
      const duration = 1.5 + Math.random() * 1;
      const delay = Math.random() * 0.3;
      const xDrift = (Math.random() - 0.5) * 200;
      const rotation = Math.random() * 720;

      piece.style.cssText = `
        left: ${x}px;
        top: 20px;
        width: ${size}px;
        height: ${size}px;
        background: ${color};
        border-radius: ${Math.random() > 0.5 ? '50%' : '2px'};
        animation: confetti-custom ${duration}s ease-out ${delay}s forwards;
        --x-drift: ${xDrift}px;
        --rotation: ${rotation}deg;
      `;

      container.appendChild(piece);
      setTimeout(() => piece.remove(), (duration + delay) * 1000 + 100);
    }
  });

  if (!document.getElementById('confetti-custom-style')) {
    const style = document.createElement('style');
    style.id = 'confetti-custom-style';
    style.textContent = `
      @keyframes confetti-custom {
        0% {
          opacity: 1;
          transform: translateY(0) translateX(0) rotate(0deg) scale(1);
        }
        100% {
          opacity: 0;
          transform: translateY(250px) translateX(var(--x-drift)) rotate(var(--rotation)) scale(0.2);
        }
      }
    `;
    document.head.appendChild(style);
  }
}
