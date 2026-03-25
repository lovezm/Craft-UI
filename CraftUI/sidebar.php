<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<aside class="sidebar">

    <?php if (is_array($this->options->sidebarWidgets) && in_array('profile', $this->options->sidebarWidgets)): ?>
    <div class="sidebar-widget">
        <div class="sidebar-profile">
            <?php if ($this->options->avatarUrl): ?>
            <img src="<?php $this->options->avatarUrl(); ?>" alt="<?php $this->options->title(); ?>" class="sketch-avatar-img sketch-avatar-lg hand-drawn-border">
            <?php else: ?>
            <div class="sketch-avatar sketch-avatar-lg hand-drawn-border"><?php echo mb_substr($this->options->title(), 0, 1); ?></div>
            <?php endif; ?>
            <h4 class="sidebar-author"><?php $this->options->title(); ?></h4>
            <?php if ($this->options->authorBio): ?>
            <p class="sidebar-bio"><?php $this->options->authorBio(); ?></p>
            <?php endif; ?>

            <?php
            $hasSocial = $this->options->socialGithub || $this->options->socialTwitter || $this->options->socialEmail || $this->options->socialTelegram;
            if ($hasSocial):
            ?>
            <div class="social-row" style="margin-top: 12px;">
                <?php if ($this->options->socialGithub): ?>
                <a href="<?php $this->options->socialGithub(); ?>" class="social-icon-sm" title="GitHub" target="_blank" rel="noopener noreferrer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg>
                </a>
                <?php endif; ?>
                <?php if ($this->options->socialTwitter): ?>
                <a href="<?php $this->options->socialTwitter(); ?>" class="social-icon-sm" title="X/Twitter" target="_blank" rel="noopener noreferrer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
                <?php endif; ?>
                <?php if ($this->options->socialTelegram): ?>
                <a href="<?php $this->options->socialTelegram(); ?>" class="social-icon-sm" title="Telegram" target="_blank" rel="noopener noreferrer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21.198 2.433a2.242 2.242 0 00-1.022.215l-16.5 7.5a.75.75 0 00.06 1.39l4.764 1.588 2 6.3a.75.75 0 001.27.29l2.3-2.3 4.242 3.22a1.5 1.5 0 002.36-1.06l2.5-15.5a2.25 2.25 0 00-1.974-1.643z"/><path d="M10.5 13.5l8-7.5"/></svg>
                </a>
                <?php endif; ?>
                <?php if ($this->options->socialEmail): ?>
                <a href="mailto:<?php $this->options->socialEmail(); ?>" class="social-icon-sm" title="Email">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (is_array($this->options->sidebarWidgets) && in_array('navigation', $this->options->sidebarWidgets)): ?>
    <div class="sidebar-widget">
        <h5 class="sidebar-widget-title">Navigation</h5>
        <nav class="sidebar-nav">
            <a href="<?php $this->options->siteUrl(); ?>" class="sidebar-nav-item">Home</a>
            <?php $this->widget('Widget_Contents_Page_List')->to($sidebarPages); ?>
            <?php while ($sidebarPages->next()): ?>
            <a href="<?php $sidebarPages->permalink(); ?>" class="sidebar-nav-item"><?php $sidebarPages->title(); ?></a>
            <?php endwhile; ?>
        </nav>
    </div>
    <?php endif; ?>

    <?php if (is_array($this->options->sidebarWidgets) && in_array('categories', $this->options->sidebarWidgets)): ?>
    <div class="sidebar-widget">
        <h5 class="sidebar-widget-title">Categories</h5>
        <nav class="sidebar-nav">
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php while ($categories->next()): ?>
            <a href="<?php $categories->permalink(); ?>" class="sidebar-nav-item"><?php $categories->name(); ?> <span style="opacity:0.5;font-size:13px">(<?php $categories->count(); ?>)</span></a>
            <?php endwhile; ?>
        </nav>
    </div>
    <?php endif; ?>

    <?php if (is_array($this->options->sidebarWidgets) && in_array('tags', $this->options->sidebarWidgets)): ?>
    <div class="sidebar-widget">
        <h5 class="sidebar-widget-title">Tags</h5>
        <div class="sidebar-tags">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=20')->to($tags); ?>
            <?php while ($tags->next()): ?>
            <a href="<?php $tags->permalink(); ?>" class="sketch-tag tag-category"># <?php $tags->name(); ?></a>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (is_array($this->options->sidebarWidgets) && in_array('recent', $this->options->sidebarWidgets)): ?>
    <div class="sidebar-widget">
        <h5 class="sidebar-widget-title">Recent Posts</h5>
        <div class="sidebar-post-list">
            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')->to($recentPosts); ?>
            <?php while ($recentPosts->next()): ?>
            <a href="<?php $recentPosts->permalink(); ?>" class="sidebar-post-item">
                <span class="sidebar-post-title"><?php $recentPosts->title(); ?></span>
                <span class="sidebar-post-date"><?php $recentPosts->date('Y-m-d'); ?></span>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>

</aside>
