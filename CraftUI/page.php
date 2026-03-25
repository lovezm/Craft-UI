<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="layout-wrapper">
    <div class="content-area">

        <article class="post-detail hand-drawn-border">
            <h1 class="post-detail-title"><?php $this->title(); ?></h1>

            <div class="post-content">
                <?php craftui_render_content($this); ?>
            </div>
        </article>

        <?php $this->need('comments.php'); ?>

    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
