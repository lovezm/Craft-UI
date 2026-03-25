<?php
/**
 * 全宽页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>

<div class="layout-wrapper layout-full">
    <div class="content-area content-area-full">

        <article class="post-detail hand-drawn-border">
            <h1 class="post-detail-title"><?php $this->title(); ?></h1>

            <div class="post-content">
                <?php craftui_render_content($this); ?>
            </div>
        </article>

        <?php $this->need('comments.php'); ?>

    </div>
</div>

<?php $this->need('footer.php'); ?>
