(function() {
  'use strict';

  var STORAGE_KEY = 'craftui_theme';
  var currentTrail = 'stars';
  var trailTimer = null;

  var DEFAULTS = {
    primary: '#e07a5f',
    bg: '#fdf6e3',
    titleFont: 'xile',
    bodyFont: 'kangkang',
    wobble: 0.2,
    trail: 'stars',
    pencil: false
  };

  var titleFontMap = {
    xile: "'xile', 'Dymon ShouXieTi', cursive",
    dymon: "'Dymon ShouXieTi', 'xile', cursive",
    caveat: "'Caveat', cursive"
  };

  var bodyFontMap = {
    kangkang: "'kangkang', 'Patrick Hand', cursive",
    patrick: "'Patrick Hand', 'kangkang', cursive",
    caveat: "'Caveat', cursive"
  };

  function loadSettings() {
    try {
      var raw = localStorage.getItem(STORAGE_KEY);
      if (raw) return JSON.parse(raw);
    } catch (e) {}
    return null;
  }

  function saveSettings(settings) {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
    } catch (e) {}
  }

  function clearSettings() {
    try {
      localStorage.removeItem(STORAGE_KEY);
    } catch (e) {}
  }

  function isColorDark(hex) {
    var num = parseInt(hex.replace('#', ''), 16);
    var r = (num >> 16) & 0xFF;
    var g = (num >> 8) & 0xFF;
    var b = num & 0xFF;
    return (0.299 * r + 0.587 * g + 0.114 * b) / 255 < 0.5;
  }

  function lightenColor(hex, percent) {
    var num = parseInt(hex.replace('#', ''), 16);
    var r = Math.min(255, (num >> 16) + Math.round(2.55 * percent));
    var g = Math.min(255, ((num >> 8) & 0x00FF) + Math.round(2.55 * percent));
    var b = Math.min(255, (num & 0x0000FF) + Math.round(2.55 * percent));
    return '#' + (r << 16 | g << 8 | b).toString(16).padStart(6, '0');
  }

  function applyPrimary(color) {
    document.documentElement.style.setProperty('--primary', color);
    document.documentElement.style.setProperty('--primary-light', lightenColor(color, 30));
  }

  function applyBg(color) {
    document.documentElement.style.setProperty('--bg', color);
    if (isColorDark(color)) {
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
  }

  function applyWobble(value) {
    var scale = value * 6;
    updateFilterScale('hand-drawn', scale);
    updateFilterScale('hand-drawn-strong', scale * 1.5);
  }

  function updateFilterScale(filterId, scale) {
    var filter = document.getElementById(filterId);
    if (filter) {
      var displace = filter.querySelector('feDisplacementMap');
      if (displace) displace.setAttribute('scale', scale);
    }
  }

  function applyTitleFont(key) {
    if (titleFontMap[key]) {
      document.documentElement.style.setProperty('--font-title', titleFontMap[key]);
    }
  }

  function applyBodyFont(key) {
    if (bodyFontMap[key]) {
      document.documentElement.style.setProperty('--font-hand', bodyFontMap[key]);
      document.documentElement.style.setProperty('--font-body', bodyFontMap[key]);
    }
  }

  function applyPencil(enabled) {
    document.body.classList.toggle('pencil-mode', enabled);
  }

  function applySavedSettings() {
    var s = loadSettings();
    if (!s) return;
    if (s.primary) applyPrimary(s.primary);
    if (s.bg) applyBg(s.bg);
    if (s.titleFont) applyTitleFont(s.titleFont);
    if (s.bodyFont) applyBodyFont(s.bodyFont);
    if (typeof s.wobble === 'number') applyWobble(s.wobble);
    if (s.trail) currentTrail = s.trail;
    if (s.pencil) applyPencil(true);
  }

  function syncPanelUI(s) {
    if (!s) return;

    if (s.primary) {
      document.querySelectorAll('#primary-swatches .swatch').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.color === s.primary);
      });
    }
    if (s.bg) {
      document.querySelectorAll('#bg-swatches .swatch').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.color === s.bg);
      });
    }
    if (s.titleFont) {
      document.querySelectorAll('#title-font-options .font-btn').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.font === s.titleFont);
      });
    }
    if (s.bodyFont) {
      document.querySelectorAll('#body-font-options .font-btn').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.font === s.bodyFont);
      });
    }
    if (typeof s.wobble === 'number') {
      var slider = document.getElementById('wobble-slider');
      var val = document.getElementById('wobble-val');
      if (slider) slider.value = s.wobble;
      if (val) val.textContent = s.wobble;
    }
    if (s.trail) {
      document.querySelectorAll('.trail-btn').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.trail === s.trail);
      });
    }
    var pencilToggle = document.getElementById('pencil-filter-toggle');
    if (pencilToggle) pencilToggle.checked = !!s.pencil;
  }

  function getCurrentSettings() {
    var s = loadSettings();
    return s || JSON.parse(JSON.stringify(DEFAULTS));
  }

  function updateSetting(key, value) {
    var s = getCurrentSettings();
    s[key] = value;
    saveSettings(s);
  }

  function createSVGFilters() {
    var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.setAttribute('width', '0');
    svg.setAttribute('height', '0');
    svg.style.position = 'absolute';
    svg.innerHTML =
      '<defs>' +
        '<filter id="hand-drawn" x="-5%" y="-5%" width="110%" height="110%">' +
          '<feTurbulence type="turbulence" baseFrequency="0.02" numOctaves="3" seed="1" result="noise"/>' +
          '<feDisplacementMap in="SourceGraphic" in2="noise" scale="2.5" xChannelSelector="R" yChannelSelector="G"/>' +
        '</filter>' +
        '<filter id="hand-drawn-strong" x="-5%" y="-5%" width="110%" height="110%">' +
          '<feTurbulence type="turbulence" baseFrequency="0.03" numOctaves="4" seed="2" result="noise"/>' +
          '<feDisplacementMap in="SourceGraphic" in2="noise" scale="4" xChannelSelector="R" yChannelSelector="G"/>' +
        '</filter>' +
        '<filter id="squiggly-0"><feTurbulence baseFrequency="0.02" numOctaves="3" seed="0" result="noise"/><feDisplacementMap in="SourceGraphic" in2="noise" scale="2"/></filter>' +
        '<filter id="squiggly-1"><feTurbulence baseFrequency="0.02" numOctaves="3" seed="1" result="noise"/><feDisplacementMap in="SourceGraphic" in2="noise" scale="3"/></filter>' +
        '<filter id="squiggly-2"><feTurbulence baseFrequency="0.02" numOctaves="3" seed="2" result="noise"/><feDisplacementMap in="SourceGraphic" in2="noise" scale="2"/></filter>' +
        '<filter id="squiggly-3"><feTurbulence baseFrequency="0.02" numOctaves="3" seed="3" result="noise"/><feDisplacementMap in="SourceGraphic" in2="noise" scale="3"/></filter>' +
        '<filter id="colored-pencil" x="-5%" y="-5%" width="110%" height="110%">' +
          '<feTurbulence type="fractalNoise" baseFrequency="0.5" numOctaves="5" result="noise"/>' +
          '<feDisplacementMap in="SourceGraphic" in2="noise" scale="1.5" xChannelSelector="R" yChannelSelector="G"/>' +
        '</filter>' +
      '</defs>';
    document.body.insertBefore(svg, document.body.firstChild);
  }

  function initBackToTop() {
    var btn = document.getElementById('back-to-top');
    if (!btn) return;
    var ticking = false;

    function checkScroll() {
      if (window.scrollY > 400) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
      ticking = false;
    }

    window.addEventListener('scroll', function() {
      if (!ticking) {
        requestAnimationFrame(checkScroll);
        ticking = true;
      }
    });

    btn.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  function initAccordion() {
    document.querySelectorAll('.accordion-header').forEach(function(header) {
      header.addEventListener('click', function() {
        var item = header.parentElement;
        var wrap = item.closest('.accordion-wrap');
        var isOpen = item.classList.contains('open');
        if (wrap) {
          wrap.querySelectorAll('.accordion-item').forEach(function(i) {
            i.classList.remove('open');
          });
        }
        if (!isOpen) item.classList.add('open');
      });
    });
  }

  function initMobileNav() {
    var toggle = document.querySelector('.mobile-nav-toggle');
    var nav = document.querySelector('.header-nav');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', function() {
      nav.classList.toggle('open');
    });

    document.addEventListener('click', function(e) {
      if (!toggle.contains(e.target) && !nav.contains(e.target)) {
        nav.classList.remove('open');
      }
    });
  }

  function initFloatingStars() {
    var container = document.getElementById('floating-stars');
    if (!container) return;

    var html = '';
    var colors = ['#f2cc8f', '#e07a5f', '#3d85c6', '#81b29a'];
    for (var i = 0; i < 6; i++) {
      var x = Math.random() * 100;
      var y = Math.random() * 100;
      var size = 6 + Math.random() * 10;
      var delay = Math.random() * 3;
      var color = colors[i % colors.length];
      html += '<div class="floating-star" style="left:' + x + '%;top:' + y + '%;animation-delay:' + delay + 's">' +
        '<svg width="' + size + '" height="' + size + '" viewBox="0 0 20 20">' +
        '<polygon points="10,1 12.5,7.5 19,8 14,12.5 15.5,19 10,15.5 4.5,19 6,12.5 1,8 7.5,7.5" fill="' + color + '" stroke="none"/>' +
        '</svg></div>';
    }
    container.innerHTML = html;
  }

  function initCommentReply() {
    var cancelReply = document.getElementById('cancel-comment-reply-link');
    if (cancelReply) {
      cancelReply.addEventListener('click', function(e) {
        e.preventDefault();
        var respond = document.getElementById('respond');
        var commentsArea = document.querySelector('.comments-area');
        if (respond && commentsArea) {
          commentsArea.appendChild(respond);
        }
        this.style.display = 'none';
      });
    }
  }

  function initCursorTrail() {
    var cfg = window.CraftUIConfig || {};
    if (!cfg.cursorTrail) {
      currentTrail = 'none';
    }

    var saved = loadSettings();
    if (saved && saved.trail) {
      currentTrail = saved.trail;
    }

    document.addEventListener('mousemove', function(e) {
      if (currentTrail === 'none' || trailTimer) return;
      trailTimer = setTimeout(function() { trailTimer = null; }, 50);

      if (currentTrail === 'stars') {
        createStarParticle(e.clientX, e.clientY);
      } else if (currentTrail === 'bubbles') {
        createBubbleParticle(e.clientX, e.clientY);
      }
    });
  }

  function createStarParticle(x, y) {
    var el = document.createElement('div');
    el.className = 'cursor-particle cursor-star';
    var size = 8 + Math.random() * 8;
    var colors = ['#FFD700', '#e07a5f', '#3d85c6', '#81b29a', '#f2cc8f'];
    var color = colors[Math.floor(Math.random() * colors.length)];
    el.innerHTML = '<svg width="' + size + '" height="' + size + '" viewBox="0 0 20 20">' +
      '<polygon points="10,1 12.5,7.5 19,8 14,12.5 15.5,19 10,15.5 4.5,19 6,12.5 1,8 7.5,7.5" fill="' + color + '" stroke="none"/></svg>';
    el.style.left = (x - size / 2) + 'px';
    el.style.top = (y - size / 2) + 'px';
    document.body.appendChild(el);
    setTimeout(function() { el.remove(); }, 1000);
  }

  function createBubbleParticle(x, y) {
    var el = document.createElement('div');
    el.className = 'cursor-particle cursor-bubble';
    var size = 6 + Math.random() * 12;
    el.style.width = size + 'px';
    el.style.height = size + 'px';
    el.style.left = (x - size / 2 + (Math.random() - 0.5) * 10) + 'px';
    el.style.top = (y - size / 2) + 'px';
    document.body.appendChild(el);
    setTimeout(function() { el.remove(); }, 1500);
  }

  function initThemePanel() {
    var panel = document.getElementById('theme-panel');
    var toggle = document.getElementById('panel-toggle');
    var closeBtn = document.getElementById('panel-close');
    var resetBtn = document.getElementById('panel-reset');

    if (!panel || !toggle) return;

    toggle.addEventListener('click', function() {
      panel.classList.toggle('open');
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', function() {
        panel.classList.remove('open');
      });
    }

    document.addEventListener('click', function(e) {
      if (panel.classList.contains('open') &&
          !panel.contains(e.target) &&
          !toggle.contains(e.target)) {
        panel.classList.remove('open');
      }
    });

    document.querySelectorAll('#primary-swatches .swatch').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.querySelectorAll('#primary-swatches .swatch').forEach(function(s) { s.classList.remove('active'); });
        btn.classList.add('active');
        applyPrimary(btn.dataset.color);
        updateSetting('primary', btn.dataset.color);
      });
    });

    document.querySelectorAll('#bg-swatches .swatch').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.querySelectorAll('#bg-swatches .swatch').forEach(function(s) { s.classList.remove('active'); });
        btn.classList.add('active');
        applyBg(btn.dataset.color);
        updateSetting('bg', btn.dataset.color);
      });
    });

    document.querySelectorAll('#title-font-options .font-btn').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.querySelectorAll('#title-font-options .font-btn').forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        applyTitleFont(btn.dataset.font);
        updateSetting('titleFont', btn.dataset.font);
      });
    });

    document.querySelectorAll('#body-font-options .font-btn').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.querySelectorAll('#body-font-options .font-btn').forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        applyBodyFont(btn.dataset.font);
        updateSetting('bodyFont', btn.dataset.font);
      });
    });

    var wobbleSlider = document.getElementById('wobble-slider');
    var wobbleVal = document.getElementById('wobble-val');
    if (wobbleSlider) {
      applyWobble(parseFloat(wobbleSlider.value));
      wobbleSlider.addEventListener('input', function() {
        var v = parseFloat(wobbleSlider.value);
        if (wobbleVal) wobbleVal.textContent = v;
        applyWobble(v);
        updateSetting('wobble', v);
      });
    }

    document.querySelectorAll('.trail-btn').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.querySelectorAll('.trail-btn').forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        currentTrail = btn.dataset.trail;
        updateSetting('trail', currentTrail);
      });
    });

    var pencilToggle = document.getElementById('pencil-filter-toggle');
    if (pencilToggle) {
      pencilToggle.addEventListener('change', function() {
        applyPencil(pencilToggle.checked);
        updateSetting('pencil', pencilToggle.checked);
      });
    }

    if (resetBtn) {
      resetBtn.addEventListener('click', function() {
        clearSettings();
        applyPrimary(DEFAULTS.primary);
        applyBg(DEFAULTS.bg);
        applyTitleFont(DEFAULTS.titleFont);
        applyBodyFont(DEFAULTS.bodyFont);
        applyWobble(DEFAULTS.wobble);
        applyPencil(false);
        currentTrail = DEFAULTS.trail;
        syncPanelUI(DEFAULTS);
      });
    }

    var saved = loadSettings();
    if (saved) syncPanelUI(saved);
  }

  document.addEventListener('DOMContentLoaded', function() {
    createSVGFilters();
    applySavedSettings();
    initBackToTop();
    initAccordion();
    initMobileNav();
    initFloatingStars();
    initCommentReply();
    initCursorTrail();
    initThemePanel();
  });
})();
