<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php if ($this->is('index') && $this->request->page < 2 && $this->options->showHero !== '0'): ?>
<section class="hero-section">
    <div class="hero-text">
        <h2 class="hero-title"><?php $this->options->title(); ?></h2>
        <?php if ($this->options->siteSubtitle): ?>
        <p class="hero-subtitle"><?php $this->options->siteSubtitle(); ?></p>
        <?php else: ?>
        <p class="hero-subtitle"><?php $this->options->description(); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($this->is('index')): ?>
<?php else: ?>
<div class="page-header" style="margin-top: 32px;">
    <h1 class="page-title"><?php $this->archiveTitle(array(
        'category' => _t('Category: %s'),
        'search'   => _t('Search: %s'),
        'tag'      => _t('Tag: %s'),
        'author'   => _t('Author: %s')
    ), '', ''); ?></h1>
    <?php if ($this->getDescription()): ?>
    <p class="page-desc"><?php $this->getDescription(); ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>

<div class="layout-wrapper">
    <div class="content-area">

        <?php if ($this->have()): ?>
        <div class="post-list">
            <?php while ($this->next()): ?>
            <?php $cardThumb = craftui_get_first_image_url($this); ?>
            <article class="post-card hand-drawn-border">
                <h2 class="post-card-title">
                    <a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
                </h2>
                <div class="post-card-meta">
                    <span><?php $this->date('Y-m-d'); ?></span>
                    <span class="meta-sep">/</span>
                    <span><?php $this->author(); ?></span>
                    <?php if (!empty($this->categories)): ?>
                    <span class="meta-sep">/</span>
                    <span><?php $this->category(','); ?></span>
                    <?php endif; ?>
                    <span class="meta-sep">/</span>
                    <span><?php $this->commentsNum('%d'); ?> comments</span>
                </div>
                <div class="post-card-main<?php if (!empty($cardThumb)): ?> has-thumb<?php endif; ?>">
                    <div class="post-card-excerpt">
                        <?php craftui_render_excerpt($this, 200, '...'); ?>
                    </div>
                    <?php if (!empty($cardThumb)): ?>
                    <a class="post-card-thumb" href="<?php $this->permalink(); ?>" aria-label="<?php $this->title(); ?>">
                        <img src="<?php echo htmlspecialchars($cardThumb); ?>" alt="<?php $this->title(); ?>">
                    </a>
                    <?php endif; ?>
                </div>
                <div class="post-card-footer">
                    <div class="post-card-tags">
                        <?php if ($this->tags): ?>
                        <?php $this->tags(', ', true, 'none'); ?>
                        <?php endif; ?>
                    </div>
                    <a href="<?php $this->permalink(); ?>" class="read-more">Read more &rarr;</a>
                </div>
            </article>
            <?php endwhile; ?>
        </div>

        <nav class="sketch-pagination">
            <?php $this->pageNav('&laquo;', '&raquo;', 1, '...', array(
                'wrapTag'   => 'div',
                'wrapClass' => 'sketch-pagination',
                'itemTag'   => '',
                'textTag'   => 'a',
                'currentClass' => 'page-active',
                'prevClass' => 'page-prev',
                'nextClass' => 'page-next',
            )); ?>
        </nav>

        <?php else: ?>
        <div class="error-page" style="padding: 40px 20px;">
            <div class="error-message">No posts found</div>
            <p class="error-desc">There are no posts matching your criteria.</p>
        </div>
        <?php endif; ?>

    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
