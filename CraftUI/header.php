<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="<?php $this->options->lang(); ?>">
<head>
    <meta charset="<?php $this->options->charset(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $this->archiveTitle(array(
        'category' => _t('%s'),
        'search'   => _t('%s'),
        'tag'      => _t('%s'),
        'author'   => _t('%s')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>" />
    <?php $this->header(); ?>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <div class="logo-area">
                <a href="<?php $this->options->siteUrl(); ?>">
                    <div class="logo-icon">
                        <svg width="36" height="36" viewBox="0 0 36 36">
                            <circle cx="18" cy="18" r="14" fill="#e07a5f" stroke="#3d3229" stroke-width="2"/>
                            <polygon points="18,8 20.5,14.5 27,15 22,19.5 23.5,26 18,22.5 12.5,26 14,19.5 9,15 15.5,14.5" fill="#fdf6e3" stroke="#3d3229" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <h1 class="logo-text"><?php $this->options->logoText ? $this->options->logoText() : $this->options->title(); ?></h1>
                </a>
            </div>

            <button class="mobile-nav-toggle" aria-label="Menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            </button>

            <nav class="header-nav">
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <a href="<?php $this->options->siteUrl(); ?>" class="nav-link<?php if ($this->is('index')): ?> active<?php endif; ?>">Home</a>
                <?php while ($pages->next()): ?>
                <a href="<?php $pages->permalink(); ?>" class="nav-link<?php if ($this->is('page', $pages->slug)): ?> active<?php endif; ?>"><?php $pages->title(); ?></a>
                <?php endwhile; ?>
            </nav>
        </div>
    </header>

    <main class="main-content">
