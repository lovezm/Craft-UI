<?php
/**
 * 组件演示（自定义页面模板）
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>

<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/showcase.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/showcase-components.css'); ?>" />

<div class="showcase-page">
    <section class="hero-section">
        <div class="hero-text">
            <h2 class="hero-title"><?php $this->title(); ?></h2>
            <p class="hero-subtitle">Craft UI Hand-drawn Design System / 手绘风格组件库完整展示</p>
        </div>
        <div class="hero-decorations" id="hero-decorations"></div>
    </section>

    <?php include __DIR__ . '/includes/showcase-content.php'; ?>
</div>

<script>
(function () {
    function markSectionsVisible() {
        document.querySelectorAll('.showcase-page .section').forEach(function (section) {
            section.classList.add('visible');
        });
    }

    function initShowcaseModals() {
        var overlay = document.getElementById('sketch-modal-overlay');
        var modal = document.getElementById('sketch-modal');
        var openBtn = document.getElementById('modal-open-btn');
        var confirmBtn = document.getElementById('modal-confirm-btn');
        var closeBtn = document.getElementById('modal-close-btn');
        var cancelBtn = document.getElementById('modal-cancel-btn');
        var okBtn = document.getElementById('modal-ok-btn');
        if (!overlay) return;

        function openModal() {
            overlay.classList.add('active');
            if (modal) modal.classList.add('active');
        }

        function closeModal() {
            overlay.classList.remove('active');
            if (modal) modal.classList.remove('active');
        }

        if (openBtn) openBtn.addEventListener('click', openModal);
        if (confirmBtn) confirmBtn.addEventListener('click', openModal);
        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
        if (okBtn) okBtn.addEventListener('click', closeModal);
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) closeModal();
        });
    }

    function initShowcaseToasts() {
        var container = document.getElementById('toast-container');
        if (!container) return;

        var messages = {
            info: 'This is an info toast 这是一条信息提示',
            success: 'Operation successful! 操作成功！',
            warning: 'Please be careful! 请注意！',
            error: 'Something went wrong! 出了点问题！'
        };

        document.querySelectorAll('.toast-trigger').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var type = btn.dataset.type;
                var toast = document.createElement('div');
                toast.className = 'sketch-toast sketch-toast-' + type + ' hand-drawn-border';
                toast.innerHTML =
                    '<span class="toast-icon toast-icon-' + type + '">' +
                    (type === 'success' ? '&#10003;' : type === 'warning' ? '!' : type === 'error' ? '&#10007;' : '&#9432;') +
                    '</span>' +
                    '<span class="toast-msg">' + (messages[type] || 'Toast!') + '</span>';
                container.appendChild(toast);
                setTimeout(function () { toast.classList.add('active'); }, 10);
                setTimeout(function () {
                    toast.classList.remove('active');
                    setTimeout(function () { toast.remove(); }, 300);
                }, 3000);
            });
        });
    }

    function initShowcaseSelect() {
        document.querySelectorAll('.sketch-select-wrap').forEach(function (wrap) {
            var trigger = wrap.querySelector('.sketch-select-trigger');
            var dropdown = wrap.querySelector('.sketch-select-dropdown');
            var valueSpan = wrap.querySelector('.sketch-select-value');
            if (!trigger || !dropdown) return;

            trigger.addEventListener('click', function () {
                wrap.classList.toggle('open');
            });

            wrap.querySelectorAll('.sketch-select-option').forEach(function (opt) {
                opt.addEventListener('click', function () {
                    wrap.querySelectorAll('.sketch-select-option').forEach(function (o) {
                        o.classList.remove('active');
                    });
                    opt.classList.add('active');
                    if (valueSpan) valueSpan.textContent = opt.dataset.value;
                    wrap.classList.remove('open');
                });
            });

            document.addEventListener('click', function (e) {
                if (!wrap.contains(e.target)) wrap.classList.remove('open');
            });
        });
    }

    function initShowcaseCheckbox() {
        document.querySelectorAll('.checkbox-label').forEach(function (label) {
            label.addEventListener('click', function (e) {
                e.preventDefault();
                var box = label.querySelector('.checkbox-box');
                if (box) box.classList.toggle('checked');
            });
        });

        document.querySelectorAll('.radio-label').forEach(function (label) {
            label.addEventListener('click', function (e) {
                e.preventDefault();
                var group = label.closest('.radio-group');
                if (group) {
                    group.querySelectorAll('.radio-inner').forEach(function (r) {
                        r.classList.remove('active');
                    });
                }
                var inner = label.querySelector('.radio-inner');
                if (inner) inner.classList.add('active');
            });
        });
    }

    function initCodeCopy() {
        document.querySelectorAll('.code-copy-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var wrap = btn.closest('.code-block-wrapper');
                if (!wrap) return;
                var codeEl = wrap.querySelector('pre code');
                if (!codeEl) return;

                var text = codeEl.innerText || codeEl.textContent || '';
                navigator.clipboard.writeText(text).then(function () {
                    var old = btn.getAttribute('title') || 'Copy';
                    btn.setAttribute('title', 'Copied');
                    btn.classList.add('copied');
                    setTimeout(function () {
                        btn.setAttribute('title', old);
                        btn.classList.remove('copied');
                    }, 1200);
                });
            });
        });
    }

    function initShowcaseDividers() {
        var straight = document.getElementById('divider-straight');
        if (straight) {
            straight.innerHTML = '<svg width="100%" height="6" viewBox="0 0 600 6" preserveAspectRatio="none"><path d="M0,3 Q150,0 300,3 T600,3" stroke="var(--border)" stroke-width="2" fill="none" stroke-linecap="round"/></svg>';
        }
        var wave = document.getElementById('divider-wave');
        if (wave) {
            wave.innerHTML = '<svg width="100%" height="16" viewBox="0 0 600 16" preserveAspectRatio="none"><path d="M0,8 Q50,0 100,8 T200,8 T300,8 T400,8 T500,8 T600,8" stroke="var(--border)" stroke-width="2" fill="none" stroke-linecap="round"/></svg>';
        }
        var dashed = document.getElementById('divider-dashed');
        if (dashed) {
            dashed.innerHTML = '<svg width="100%" height="6" viewBox="0 0 600 6" preserveAspectRatio="none"><path d="M0,3 L600,3" stroke="var(--border)" stroke-width="2" fill="none" stroke-dasharray="12,8" stroke-linecap="round"/></svg>';
        }
        var stars = document.getElementById('divider-stars');
        if (stars) {
            var html = '';
            for (var i = 0; i < 5; i++) {
                html += '<svg width="16" height="16" viewBox="0 0 20 20" style="margin:0 8px;opacity:0.6"><polygon points="10,1 12.5,7.5 19,8 14,12.5 15.5,19 10,15.5 4.5,19 6,12.5 1,8 7.5,7.5" fill="var(--primary)" stroke="none"/></svg>';
            }
            stars.innerHTML = html;
        }
        var ornament = document.getElementById('divider-ornament');
        if (ornament) {
            ornament.innerHTML = '<svg width="100%" height="20" viewBox="0 0 600 20" preserveAspectRatio="none"><path d="M0,10 L250,10" stroke="var(--border)" stroke-width="1.5" fill="none"/><circle cx="300" cy="10" r="4" fill="var(--primary)" stroke="var(--border)" stroke-width="1"/><path d="M350,10 L600,10" stroke="var(--border)" stroke-width="1.5" fill="none"/></svg>';
        }
    }

    function initShowcaseShapes() {
        var icons = {
            'card-icon-1': '<svg width="48" height="48" viewBox="0 0 48 48"><rect x="4" y="8" width="40" height="32" rx="3" fill="none" stroke="var(--primary)" stroke-width="2.5"/><path d="M4,30 L18,18 L28,26 L38,14 L44,20" stroke="var(--primary)" stroke-width="2" fill="none" stroke-linecap="round"/></svg>',
            'card-icon-2': '<svg width="48" height="48" viewBox="0 0 48 48"><circle cx="24" cy="24" r="18" fill="none" stroke="var(--secondary)" stroke-width="2.5"/><path d="M16,24 Q24,10 32,24 Q24,38 16,24Z" fill="var(--secondary)" opacity="0.2" stroke="var(--secondary)" stroke-width="1.5"/></svg>',
            'card-icon-3': '<svg width="48" height="48" viewBox="0 0 48 48"><polygon points="24,4 30,18 44,18 32,28 36,44 24,34 12,44 16,28 4,18 18,18" fill="none" stroke="var(--accent)" stroke-width="2.5" stroke-linejoin="round"/></svg>'
        };
        Object.keys(icons).forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.innerHTML = icons[id];
        });

        var animShapes = {
            'anim-shape-float': '<svg width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="16" fill="var(--primary)" opacity="0.8"/></svg>',
            'anim-shape-swing': '<svg width="40" height="40" viewBox="0 0 40 40"><rect x="6" y="6" width="28" height="28" rx="4" fill="var(--secondary)" opacity="0.8"/></svg>',
            'anim-shape-spin': '<svg width="40" height="40" viewBox="0 0 40 40"><polygon points="20,2 26,16 40,16 28,26 32,40 20,32 8,40 12,26 0,16 14,16" fill="var(--accent)" opacity="0.8"/></svg>',
            'anim-shape-twinkle': '<svg width="40" height="40" viewBox="0 0 40 40"><polygon points="20,2 24,16 38,20 24,24 20,38 16,24 2,20 16,16" fill="var(--warning)" opacity="0.8"/></svg>',
            'anim-shape-pulse': '<svg width="40" height="40" viewBox="0 0 40 40"><circle cx="20" cy="20" r="16" fill="var(--danger)" opacity="0.8"/></svg>',
            'anim-shape-squiggly': '<svg width="40" height="40" viewBox="0 0 40 40"><polygon points="20,4 25,15 36,15 27,23 30,34 20,28 10,34 13,23 4,15 15,15" fill="var(--primary)" opacity="0.8"/></svg>'
        };
        Object.keys(animShapes).forEach(function (id) {
            var el = document.getElementById(id);
            if (el) el.innerHTML = animShapes[id];
        });
    }

    function initShowcaseConfetti() {
        var btn = document.getElementById('confetti-btn');
        var container = document.getElementById('confetti-container');
        if (!btn || !container) return;

        btn.addEventListener('click', function () {
            var colors = ['#e07a5f', '#3d85c6', '#81b29a', '#f2cc8f', '#e88d97', '#FFD700'];
            for (var i = 0; i < 40; i++) {
                var piece = document.createElement('div');
                piece.style.cssText = 'position:absolute;width:8px;height:8px;border-radius:' + (Math.random() > 0.5 ? '50%' : '2px') + ';background:' + colors[Math.floor(Math.random() * colors.length)] + ';left:50%;top:50%;pointer-events:none;';
                var angle = Math.random() * Math.PI * 2;
                var dist = 60 + Math.random() * 120;
                var dx = Math.cos(angle) * dist;
                var dy = Math.sin(angle) * dist - 40;
                piece.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                container.appendChild(piece);
                requestAnimationFrame(function (p, x, y) {
                    return function () {
                        p.style.transform = 'translate(' + x + 'px,' + y + 'px) rotate(' + (Math.random() * 360) + 'deg)';
                        p.style.opacity = '0';
                    };
                }(piece, dx, dy));
                setTimeout(function (p) {
                    return function () { p.remove(); };
                }(piece), 1000);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        markSectionsVisible();
        initShowcaseModals();
        initShowcaseToasts();
        initShowcaseSelect();
        initShowcaseCheckbox();
        initCodeCopy();
        initShowcaseDividers();
        initShowcaseShapes();
        initShowcaseConfetti();
    });
})();
</script>

<?php $this->need('footer.php'); ?>
