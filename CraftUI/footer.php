<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-main">
                <div class="footer-brand">
                    <span class="footer-logo"><?php $this->options->logoText ? $this->options->logoText() : $this->options->title(); ?></span>
                    <p class="footer-desc"><?php $this->options->description(); ?></p>
                </div>
                <div class="footer-links">
                    <a href="<?php $this->options->siteUrl(); ?>" class="footer-link">Home</a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($footerPages); ?>
                    <?php while ($footerPages->next()): ?>
                    <a href="<?php $footerPages->permalink(); ?>" class="footer-link"><?php $footerPages->title(); ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-bottom">
                <p class="footer-copyright">
                    &copy; <?php echo date('Y'); ?>
                    <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
                    <?php if ($this->options->footerText): ?>
                    &middot; <?php $this->options->footerText(); ?>
                    <?php endif; ?>
                    &middot; Powered by <a href="https://typecho.org" target="_blank" rel="noopener noreferrer">Typecho</a>
                    &middot; Theme <a href="#">CraftUI</a>
                </p>
                <?php if ($this->options->icpNumber): ?>
                <p class="footer-icp">
                    <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener noreferrer"><?php $this->options->icpNumber(); ?></a>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <div class="fab-group" id="fab-group">
        <button class="fab-btn fab-back-to-top" id="back-to-top" title="回到顶部">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 16V4"/><path d="M4 10l6-6 6 6"/></svg>
        </button>
        <?php if ($this->options->showThemePanel !== '0'): ?>
        <button class="fab-btn fab-settings" id="panel-toggle" title="主题设置">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="3"/><path d="M10 1.5v2M10 16.5v2M1.5 10h2M16.5 10h2M3.4 3.4l1.4 1.4M15.2 15.2l1.4 1.4M3.4 16.6l1.4-1.4M15.2 4.8l1.4-1.4"/></svg>
        </button>
        <?php endif; ?>
    </div>

    <?php if ($this->options->showThemePanel !== '0'): ?>
    <aside class="theme-panel" id="theme-panel">
        <div class="panel-content">
            <div class="panel-header">
                <h3 class="panel-title">主题设置</h3>
                <button class="panel-close" id="panel-close">&times;</button>
            </div>

            <div class="control-group">
                <label class="control-label">主色调</label>
                <div class="color-swatches" id="primary-swatches">
                    <button class="swatch active" data-color="#e07a5f" style="background:#e07a5f" title="陶土橙"></button>
                    <button class="swatch" data-color="#3d85c6" style="background:#3d85c6" title="天空蓝"></button>
                    <button class="swatch" data-color="#81b29a" style="background:#81b29a" title="薄荷绿"></button>
                    <button class="swatch" data-color="#f2cc8f" style="background:#f2cc8f" title="暖杏黄"></button>
                    <button class="swatch" data-color="#e88d97" style="background:#e88d97" title="樱花粉"></button>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">背景色</label>
                <div class="color-swatches" id="bg-swatches">
                    <button class="swatch active" data-color="#fdf6e3" style="background:#fdf6e3" title="暖白"></button>
                    <button class="swatch" data-color="#f5f0eb" style="background:#f5f0eb" title="米灰"></button>
                    <button class="swatch" data-color="#e8e4df" style="background:#e8e4df" title="浅灰"></button>
                    <button class="swatch" data-color="#ffffff" style="background:#ffffff" title="纯白"></button>
                    <button class="swatch" data-color="#2d2d2d" style="background:#2d2d2d" title="暗色"></button>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">标题字体</label>
                <div class="font-options" id="title-font-options">
                    <button class="font-btn active" data-font="xile" style="font-family:'xile',cursive">习乐</button>
                    <button class="font-btn" data-font="dymon" style="font-family:'Dymon ShouXieTi',cursive">手写</button>
                    <button class="font-btn" data-font="caveat" style="font-family:'Caveat',cursive">Caveat</button>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">正文字体</label>
                <div class="font-options" id="body-font-options">
                    <button class="font-btn active" data-font="kangkang" style="font-family:'kangkang',cursive">康康</button>
                    <button class="font-btn" data-font="patrick" style="font-family:'Patrick Hand',cursive">Patrick</button>
                    <button class="font-btn" data-font="caveat" style="font-family:'Caveat',cursive">Caveat</button>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">手绘抖动: <span id="wobble-val">0.2</span></label>
                <input type="range" class="range-slider" id="wobble-slider" min="0" max="1" step="0.1" value="0.2">
            </div>

            <div class="control-group">
                <label class="control-label">光标拖尾</label>
                <div class="trail-options">
                    <button class="trail-btn" data-trail="none">关闭</button>
                    <button class="trail-btn active" data-trail="stars">星星</button>
                    <button class="trail-btn" data-trail="bubbles">气泡</button>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">
                    <input type="checkbox" id="pencil-filter-toggle"> 铅笔纹理
                </label>
            </div>

            <div class="control-group panel-reset-group">
                <button class="btn-reset" id="panel-reset">恢复默认</button>
            </div>
        </div>
    </aside>
    <?php endif; ?>

    <?php if ($this->options->showFloatingStars !== '0'): ?>
    <div class="floating-stars" id="floating-stars"></div>
    <?php endif; ?>

    <script>
    window.CraftUIConfig = {
        cursorTrail: <?php echo ($this->options->showCursorTrail !== '0') ? 'true' : 'false'; ?>,
        themePanel: <?php echo ($this->options->showThemePanel !== '0') ? 'true' : 'false'; ?>,
        floatingStars: <?php echo ($this->options->showFloatingStars !== '0') ? 'true' : 'false'; ?>
    };
    </script>
    <script src="<?php $this->options->themeUrl('assets/js/craft-ui.js'); ?>"></script>
    <?php $this->footer(); ?>
</body>
</html>
