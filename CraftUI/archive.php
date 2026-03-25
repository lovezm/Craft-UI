<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="layout-wrapper">
    <div class="content-area">

        <div class="page-header" style="margin-top: 32px;">
            <h1 class="page-title"><?php $this->archiveTitle(array(
                'category' => _t('Category: %s'),
                'search'   => _t('Search: %s'),
                'tag'      => _t('Tag: %s'),
                'author'   => _t('Author: %s'),
                'date'     => _t('Archive: %s'),
            ), '', ''); ?></h1>
            <?php if ($this->getDescription()): ?>
            <p class="page-desc"><?php $this->getDescription(); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($this->have()): ?>
        <div class="archive-list">
            <?php $currentYear = ''; ?>
            <?php while ($this->next()): ?>
                <?php $year = $this->date('Y'); ?>
                <?php if ($year !== $currentYear): ?>
                    <?php $currentYear = $year; ?>
                    <h3 class="archive-year"><?php echo $year; ?></h3>
                <?php endif; ?>
                <div class="archive-item">
                    <span class="archive-date"><?php $this->date('m-d'); ?></span>
                    <span class="archive-title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></span>
                </div>
            <?php endwhile; ?>
        </div>

        <nav class="sketch-pagination">
            <?php $this->pageNav('&laquo;', '&raquo;'); ?>
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
