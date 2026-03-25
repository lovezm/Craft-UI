<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="layout-wrapper">
    <div class="content-area">

        <nav class="sketch-breadcrumb">
            <a href="<?php $this->options->siteUrl(); ?>" class="breadcrumb-item">Home</a>
            <span class="breadcrumb-sep">/</span>
            <?php $this->category(','); ?>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current"><?php $this->title(); ?></span>
        </nav>

        <article class="post-detail hand-drawn-border">
            <h1 class="post-detail-title"><?php $this->title(); ?></h1>

            <div class="post-detail-meta">
                <span><?php $this->date('Y-m-d'); ?></span>
                <span>/</span>
                <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                <?php if ($this->categories->length > 0): ?>
                <span>/</span>
                <span><?php $this->category(','); ?></span>
                <?php endif; ?>
                <span>/</span>
                <span><?php $this->commentsNum('%d'); ?> comments</span>
            </div>

            <div class="post-content">
                <?php craftui_render_content($this); ?>
            </div>

            <?php if ($this->tags): ?>
            <div class="post-tags">
                <?php $this->tags(', ', true, 'none'); ?>
            </div>
            <?php endif; ?>
        </article>

        <div class="post-nav">
            <?php $this->thePrev(
                '<a class="post-nav-item prev hand-drawn-border" href="%s"><span class="post-nav-label">上一篇</span><span class="post-nav-title">%s</span></a>',
                '<span class="post-nav-item prev is-empty hand-drawn-border"><span class="post-nav-label">上一篇</span><span class="post-nav-title">没有了</span></span>'
            ); ?>
            <?php $this->theNext(
                '<a class="post-nav-item next hand-drawn-border" href="%s"><span class="post-nav-label">下一篇</span><span class="post-nav-title">%s</span></a>',
                '<span class="post-nav-item next is-empty hand-drawn-border"><span class="post-nav-label">下一篇</span><span class="post-nav-title">没有了</span></span>'
            ); ?>
        </div>

        <?php $this->need('comments.php'); ?>

    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
