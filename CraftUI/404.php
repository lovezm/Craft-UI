<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="error-page">
    <div class="error-number">404</div>
    <h2 class="error-message">Page Not Found</h2>
    <p class="error-desc">The page you are looking for doesn't exist or has been moved.</p>
    <a href="<?php $this->options->siteUrl(); ?>" class="btn btn-primary hand-drawn-border">Back to Home</a>
</div>

<?php $this->need('footer.php'); ?>
