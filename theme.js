export function initThemePanel() {
  const panel = document.getElementById('theme-panel');
  const toggle = document.getElementById('panel-toggle');
  const closeBtn = document.getElementById('panel-close');

  toggle.addEventListener('click', () => {
    panel.classList.toggle('open');
  });

  closeBtn.addEventListener('click', () => {
    panel.classList.remove('open');
  });

  document.addEventListener('click', (e) => {
    if (panel.classList.contains('open') &&
        !panel.contains(e.target) &&
        !toggle.contains(e.target)) {
      panel.classList.remove('open');
    }
  });

  document.querySelectorAll('#primary-swatches .swatch').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('#primary-swatches .swatch').forEach(s => s.classList.remove('active'));
      btn.classList.add('active');
      document.documentElement.style.setProperty('--primary', btn.dataset.color);
      document.documentElement.style.setProperty('--primary-light', lightenColor(btn.dataset.color, 30));
    });
  });

  document.querySelectorAll('#bg-swatches .swatch').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('#bg-swatches .swatch').forEach(s => s.classList.remove('active'));
      btn.classList.add('active');
      const color = btn.dataset.color;
      document.documentElement.style.setProperty('--bg', color);
      const isDark = isColorDark(color);
      if (isDark) {
        document.documentElement.style.setProperty('--text', '#e8e0d8');
        document.documentElement.style.setProperty('--text-light', '#b0a898');
        document.documentElement.style.setProperty('--border', '#e8e0d8');
        document.documentElement.style.setProperty('--bg-card', '#3d3d3d');
      } else {
        document.documentElement.style.setProperty('--text', '#3d3229');
        document.documentElement.style.setProperty('--text-light', '#7a6e63');
        document.documentElement.style.setProperty('--border', '#3d3229');
        document.documentElement.style.setProperty('--bg-card', '#fffdf7');
      }
    });
  });

  const wobbleSlider = document.getElementById('wobble-slider');
  const wobbleVal = document.getElementById('wobble-val');

  applyWobble(parseFloat(wobbleSlider.value));

  wobbleSlider.addEventListener('input', () => {
    wobbleVal.textContent = wobbleSlider.value;
    applyWobble(parseFloat(wobbleSlider.value));
  });

  const weightSlider = document.getElementById('weight-slider');
  const weightVal = document.getElementById('weight-val');
  weightSlider.addEventListener('input', () => {
    weightVal.textContent = weightSlider.value;
  });

  const pencilToggle = document.getElementById('pencil-filter-toggle');
  pencilToggle.addEventListener('change', () => {
    document.body.classList.toggle('pencil-mode', pencilToggle.checked);
  });

  const titleFontMap = {
    xile: "'xile', 'Dymon ShouXieTi', cursive",
    dymon: "'Dymon ShouXieTi', 'xile', cursive",
    caveat: "'Caveat', cursive",
  };

  const bodyFontMap = {
    kangkang: "'kangkang', 'Patrick Hand', cursive",
    patrick: "'Patrick Hand', 'kangkang', cursive",
    caveat: "'Caveat', cursive",
  };

  document.querySelectorAll('#title-font-options .font-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('#title-font-options .font-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      document.documentElement.style.setProperty('--font-title', titleFontMap[btn.dataset.font]);
    });
  });

  document.querySelectorAll('#body-font-options .font-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('#body-font-options .font-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const fontValue = bodyFontMap[btn.dataset.font];
      document.documentElement.style.setProperty('--font-hand', fontValue);
      document.documentElement.style.setProperty('--font-body', fontValue);
    });
  });
}

function applyWobble(value) {
  const scale = value * 6;
  updateFilterScale('hand-drawn', scale);
  updateFilterScale('hand-drawn-strong', scale * 1.5);
}

function updateFilterScale(filterId, scale) {
  const filter = document.getElementById(filterId);
  if (filter) {
    const displace = filter.querySelector('feDisplacementMap');
    if (displace) displace.setAttribute('scale', scale);
  }
}

export function initBackToTop() {
  const btn = document.getElementById('back-to-top');
  let ticking = false;

  const checkScroll = () => {
    if (window.scrollY > 400) {
      btn.classList.add('visible');
    } else {
      btn.classList.remove('visible');
    }
    ticking = false;
  };

  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(checkScroll);
      ticking = true;
    }
  });

  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

export function initArticleTOC() {
  const article = document.getElementById('article-content');
  const tocList = document.getElementById('toc-list');
  if (!article || !tocList) return;

  const headings = article.querySelectorAll('[data-toc]');
  if (headings.length === 0) return;

  headings.forEach((heading, i) => {
    const id = `article-heading-${i}`;
    heading.id = id;

    const level = parseInt(heading.tagName.charAt(1));
    const li = document.createElement('li');
    const link = document.createElement('a');
    link.href = `#${id}`;
    link.className = 'toc-link';
    link.dataset.level = level;
    link.textContent = heading.textContent.substring(0, 40) + (heading.textContent.length > 40 ? '...' : '');
    li.appendChild(link);
    tocList.appendChild(li);
  });

  const tocLinks = tocList.querySelectorAll('.toc-link');
  let tocTicking = false;

  const updateActiveTOC = () => {
    let current = null;
    headings.forEach(h => {
      const rect = h.getBoundingClientRect();
      if (rect.top <= 120) current = h;
    });

    tocLinks.forEach(link => {
      link.classList.remove('active');
      if (current && link.getAttribute('href') === `#${current.id}`) {
        link.classList.add('active');
      }
    });
    tocTicking = false;
  };

  window.addEventListener('scroll', () => {
    if (!tocTicking) {
      requestAnimationFrame(updateActiveTOC);
      tocTicking = true;
    }
  });

  updateActiveTOC();
}

function lightenColor(hex, percent) {
  const num = parseInt(hex.replace('#', ''), 16);
  const r = Math.min(255, (num >> 16) + Math.round(2.55 * percent));
  const g = Math.min(255, ((num >> 8) & 0x00FF) + Math.round(2.55 * percent));
  const b = Math.min(255, (num & 0x0000FF) + Math.round(2.55 * percent));
  return `#${(r << 16 | g << 8 | b).toString(16).padStart(6, '0')}`;
}

function isColorDark(hex) {
  const num = parseInt(hex.replace('#', ''), 16);
  const r = (num >> 16) & 0xFF;
  const g = (num >> 8) & 0xFF;
  const b = num & 0xFF;
  const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;
  return luminance < 0.5;
}
