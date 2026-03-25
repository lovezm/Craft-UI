<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoText = new Typecho_Widget_Helper_Form_Element_Text(
        'logoText',
        NULL,
        'Craft UI',
        _t('站点 Logo 文字'),
        _t('显示在页面顶部导航栏的站点名称')
    );
    $form->addInput($logoText);

    $siteSubtitle = new Typecho_Widget_Helper_Form_Element_Text(
        'siteSubtitle',
        NULL,
        '',
        _t('站点副标题'),
        _t('显示在首页 Hero 区域的副标题文字')
    );
    $form->addInput($siteSubtitle);

    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'avatarUrl',
        NULL,
        '',
        _t('侧边栏头像链接'),
        _t('作者头像图片的 URL 地址，留空则显示站名首字')
    );
    $form->addInput($avatarUrl);

    $authorBio = new Typecho_Widget_Helper_Form_Element_Textarea(
        'authorBio',
        NULL,
        '',
        _t('作者简介'),
        _t('显示在侧边栏头像下方的简短介绍')
    );
    $form->addInput($authorBio);

    $socialGithub = new Typecho_Widget_Helper_Form_Element_Text(
        'socialGithub', NULL, '',
        _t('GitHub 链接'),
        _t('你的 GitHub 主页地址')
    );
    $form->addInput($socialGithub);

    $socialTwitter = new Typecho_Widget_Helper_Form_Element_Text(
        'socialTwitter', NULL, '',
        _t('Twitter/X 链接'),
        _t('你的 Twitter/X 主页地址')
    );
    $form->addInput($socialTwitter);

    $socialEmail = new Typecho_Widget_Helper_Form_Element_Text(
        'socialEmail', NULL, '',
        _t('联系邮箱'),
        _t('用于侧边栏展示的联系邮箱地址')
    );
    $form->addInput($socialEmail);

    $socialTelegram = new Typecho_Widget_Helper_Form_Element_Text(
        'socialTelegram', NULL, '',
        _t('Telegram 链接'),
        _t('你的 Telegram 链接')
    );
    $form->addInput($socialTelegram);

    $icpNumber = new Typecho_Widget_Helper_Form_Element_Text(
        'icpNumber',
        NULL,
        '',
        _t('ICP 备案号'),
        _t('网站底部显示的 ICP 备案号，留空则不显示')
    );
    $form->addInput($icpNumber);

    $footerText = new Typecho_Widget_Helper_Form_Element_Text(
        'footerText',
        NULL,
        '',
        _t('底部附加文字'),
        _t('显示在页脚版权信息旁的自定义文字')
    );
    $form->addInput($footerText);

    $sidebarWidgets = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarWidgets',
        array(
            'profile'    => _t('作者信息卡片'),
            'navigation' => _t('导航链接'),
            'categories' => _t('文章分类'),
            'tags'       => _t('标签云'),
            'recent'     => _t('最近文章'),
        ),
        array('profile', 'navigation', 'categories', 'tags', 'recent'),
        _t('侧边栏组件'),
        _t('选择要在侧边栏显示的模块')
    );
    $form->addInput($sidebarWidgets);

    $postsPerPage = new Typecho_Widget_Helper_Form_Element_Text(
        'postsPerPage',
        NULL,
        '10',
        _t('每页文章数'),
        _t('首页及列表页每页显示的文章数量')
    );
    $form->addInput($postsPerPage);

    $showHero = new Typecho_Widget_Helper_Form_Element_Radio(
        'showHero',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('首页 Hero 区域'),
        _t('是否在首页展示大标题 Hero 区域')
    );
    $form->addInput($showHero);

    $showThemePanel = new Typecho_Widget_Helper_Form_Element_Radio(
        'showThemePanel',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('主题设置面板'),
        _t('在页面右下角显示设置按钮，允许访客自行调节主色调、背景色、标题字体、正文字体、手绘抖动强度、光标拖尾特效、铅笔纹理等外观参数')
    );
    $form->addInput($showThemePanel);

    $showCursorTrail = new Typecho_Widget_Helper_Form_Element_Radio(
        'showCursorTrail',
        array('1' => _t('开启'), '0' => _t('关闭')),
        '1',
        _t('光标拖尾特效'),
        _t('页面鼠标移动时是否显示星星/气泡拖尾效果（在设置面板中访客可自行切换或关闭）')
    );
    $form->addInput($showCursorTrail);

    $showFloatingStars = new Typecho_Widget_Helper_Form_Element_Radio(
        'showFloatingStars',
        array('1' => _t('显示'), '0' => _t('隐藏')),
        '1',
        _t('背景浮动星星'),
        _t('页面背景是否显示随机浮动闪烁的装饰星星')
    );
    $form->addInput($showFloatingStars);
}

function themeFields($layout)
{
    $banner = new Typecho_Widget_Helper_Form_Element_Text(
        'banner',
        NULL,
        NULL,
        _t('文章头图'),
        _t('为这篇文章设置自定义头图 URL')
    );
    $layout->addItem($banner);
}

function themeInit($archive)
{
    Helper::options()->commentsAntiSpam = false;
}

function _craftui_attr($text)
{
    $text = str_replace(
        array('&quot;', '&#034;', '&#039;', '&#8220;', '&#8221;', '&#8216;', '&#8217;', '&laquo;', '&raquo;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', "\xE2\x80\x9C", "\xE2\x80\x9D", "\xE2\x80\x98", "\xE2\x80\x99", "\xC2\xAB", "\xC2\xBB"),
        array('"', '"', "'", '"', '"', "'", "'", '"', '"', "'", "'", '"', '"', '"', '"', "'", "'", '"', '"'),
        $text
    );
    $text = preg_replace('/\x{201C}|\x{201D}/u', '"', $text);
    $text = preg_replace('/\x{2018}|\x{2019}/u', "'", $text);
    return $text;
}

function _craftui_unwrap_p($html)
{
    $html = preg_replace('#^\s*<p>\s*#i', '', $html);
    $html = preg_replace('#\s*</p>\s*$#i', '', $html);
    $html = preg_replace('#</p>\s*<p>#i', '<br />', $html);
    return trim($html);
}

function parseShortcodes($content)
{
    $content = _craftui_attr($content);

    $content = preg_replace(
        '#<p>\s*(\[(?:callout|accordion|progress|divider|blockquote|figure|checklist|codeblock|btn)[^\]]*\])</p>#i',
        '$1',
        $content
    );
    $content = preg_replace(
        '#<p>\s*(\[/(?:callout|accordion|blockquote|figure|checklist|codeblock|btn)\])\s*</p>#i',
        '$1',
        $content
    );
    $content = preg_replace(
        '#<p>\s*(\[(?:callout|accordion|progress|divider|blockquote|figure|checklist|codeblock|btn)[^\]]*\].*?\[/(?:callout|accordion|blockquote|figure|checklist|codeblock|btn)\])\s*</p>#s',
        '$1',
        $content
    );
    $content = preg_replace(
        '#<p>\s*(\[(?:progress|divider)[^\]]*\])\s*</p>#i',
        '$1',
        $content
    );
    $content = preg_replace('#<a\s+href="([^"]*)"[^>]*>\s*(\[btn\s[^\]]*\].*?\[/btn\])\s*</a>#s', '$2', $content);

    $content = preg_replace_callback(
        '/\[callout\s+type=["\']?(info|warning|success|error|note)["\']?\](.*?)\[\/callout\]/s',
        function ($m) {
            $type = $m[1];
            $body = trim($m[2]);
            $body = _craftui_unwrap_p($body);
            $icons = array('info' => '&#x2139;', 'warning' => '!', 'success' => '&#10003;', 'error' => '&#10007;', 'note' => '&#9998;');
            $titles = array('info' => 'Info', 'warning' => 'Warning', 'success' => 'Success', 'error' => 'Error', 'note' => 'Note');
            return '<div class="callout callout-' . $type . ' hand-drawn-border">' .
                '<div class="callout-icon">' . $icons[$type] . '</div>' .
                '<div class="callout-body"><strong>' . $titles[$type] . '</strong><p>' . $body . '</p></div></div>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[tag(?:\s+color=["\']?(primary|secondary|accent|warning|danger|success)["\']?)?\](.*?)\[\/tag\]/s',
        function ($m) {
            $color = !empty($m[1]) ? ' tag-' . $m[1] : '';
            return '<span class="sketch-tag' . $color . '">' . trim($m[2]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[tag-outline(?:\s+color=["\']?(primary|accent|warning)["\']?)?\](.*?)\[\/tag-outline\]/s',
        function ($m) {
            $color = !empty($m[1]) ? ' tag-outline-' . $m[1] : '';
            return '<span class="sketch-tag tag-outline' . $color . '">' . trim($m[2]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[tag-category\](.*?)\[\/tag-category\]/s',
        function ($m) {
            return '<span class="sketch-tag tag-category"># ' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[badge(?:\s+color=["\']?(primary|accent|warning|danger)["\']?)?\](.*?)\[\/badge\]/s',
        function ($m) {
            $color = !empty($m[1]) ? ' badge-' . $m[1] : '';
            return '<span class="sketch-badge' . $color . '">' . trim($m[2]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[kbd\](.*?)\[\/kbd\]/s',
        function ($m) {
            return '<kbd class="sketch-kbd">' . trim($m[1]) . '</kbd>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[underline\](.*?)\[\/underline\]/s',
        function ($m) {
            return '<span class="notation-underline">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[highlight\](.*?)\[\/highlight\]/s',
        function ($m) {
            return '<span class="notation-highlight">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[highlight-half\](.*?)\[\/highlight-half\]/s',
        function ($m) {
            return '<span class="notation-highlight-half">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[circle\](.*?)\[\/circle\]/s',
        function ($m) {
            return '<span class="notation-circle">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[box\](.*?)\[\/box\]/s',
        function ($m) {
            return '<span class="notation-box">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[strike\](.*?)\[\/strike\]/s',
        function ($m) {
            return '<span class="notation-strike">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[bracket\](.*?)\[\/bracket\]/s',
        function ($m) {
            return '<span class="notation-bracket">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[wavy\](.*?)\[\/wavy\]/s',
        function ($m) {
            return '<span class="notation-wavy">' . trim($m[1]) . '</span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[accordion\s+title=["\']?([^"\']*?)["\']?\s*\](.*?)\[\/accordion\]/s',
        function ($m) {
            $body = trim($m[2]);
            $body = _craftui_unwrap_p($body);
            return '<div class="accordion-wrap"><div class="accordion-item hand-drawn-border">' .
                '<button class="accordion-header"><span>' . htmlspecialchars($m[1]) . '</span>' .
                '<span class="accordion-arrow">&#9662;</span></button>' .
                '<div class="accordion-body"><p>' . $body . '</p></div></div></div>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[progress\s+label=["\']?([^"\']*?)["\']?\s+value=["\']?(\d+)["\']?(?:\s+color=["\']?(primary|secondary|accent)["\']?)?\s*\]/s',
        function ($m) {
            $label = htmlspecialchars($m[1]);
            $value = intval($m[2]);
            $colorClass = !empty($m[3]) ? ' progress-' . $m[3] : '';
            return '<div class="progress-bar-wrap"><div class="progress-label"><span>' . $label . '</span><span>' . $value . '%</span></div>' .
                '<div class="sketch-progress hand-drawn-border"><div class="sketch-progress-fill' . $colorClass . '" style="width:' . $value . '%"></div></div></div>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[btn\s+url=["\']?([^"\'<>\s\]]+)["\']?(?:\s+style=["\']?(primary|outline|secondary|accent|danger|ghost)["\']?)?\](.*?)\[\/btn\]/s',
        function ($m) {
            $url = strip_tags($m[1]);
            $url = htmlspecialchars($url);
            $style = !empty($m[2]) ? ' btn-' . $m[2] : ' btn-primary';
            $text = trim(strip_tags($m[3], '<strong><em><code><span><kbd>'));
            return '<a href="' . $url . '" class="btn' . $style . ' hand-drawn-border">' . $text . '</a>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[blockquote(?:\s+accent)?\](.*?)\[\/blockquote\]/s',
        function ($m) {
            $body = trim($m[1]);
            $body = _craftui_unwrap_p($body);
            $cls = strpos($m[0], 'accent') !== false ? ' sketch-blockquote-accent' : '';
            return '<blockquote class="sketch-blockquote hand-drawn-border' . $cls . '"><p>' . $body . '</p></blockquote>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[divider(?:\s+style=["\']?(wave|dashed|dots|stars|ornament)?["\']?)?\s*\]/s',
        function ($m) {
            $style = !empty($m[1]) ? $m[1] : 'straight';
            if ($style === 'dots') {
                return '<div class="divider-dots"></div>';
            }
            return '<hr class="post-content-hr" />';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[figure\s+src=["\']([^"\']*)["\']?(?:\s+alt=["\']([^"\']*)["\']?)?(?:\s+caption=["\']([^"\']*)["\']?)?\s*\](.*?)\[\/figure\]/s',
        function ($m) {
            $src = htmlspecialchars($m[1]);
            $alt = !empty($m[2]) ? htmlspecialchars($m[2]) : '';
            $caption = !empty($m[3]) ? htmlspecialchars($m[3]) : trim(strip_tags($m[4]));
            $html = '<figure class="sketch-figure hand-drawn-border"><img src="' . $src . '" alt="' . $alt . '" class="sketch-figure-img" />';
            if ($caption) {
                $html .= '<figcaption>' . $caption . '</figcaption>';
            }
            $html .= '</figure>';
            return $html;
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[figure\s+src=["\']([^"\']*)["\']?(?:\s+alt=["\']([^"\']*)["\']?)?(?:\s+caption=["\']([^"\']*)["\']?)?\s*\/?\]/s',
        function ($m) {
            $src = htmlspecialchars($m[1]);
            $alt = !empty($m[2]) ? htmlspecialchars($m[2]) : '';
            $caption = !empty($m[3]) ? htmlspecialchars($m[3]) : '';
            $html = '<figure class="sketch-figure hand-drawn-border"><img src="' . $src . '" alt="' . $alt . '" class="sketch-figure-img" />';
            if ($caption) {
                $html .= '<figcaption>' . $caption . '</figcaption>';
            }
            $html .= '</figure>';
            return $html;
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[tooltip\s+text=["\']([^"\']*)["\']?(?:\s+position=["\']?(top|bottom)["\']?)?\](.*?)\[\/tooltip\]/s',
        function ($m) {
            $text = htmlspecialchars($m[1]);
            $pos = !empty($m[2]) ? $m[2] : 'top';
            return '<span class="sketch-tooltip-wrap">' . trim($m[3]) .
                '<span class="sketch-tooltip sketch-tooltip-' . $pos . '">' . $text . '</span></span>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[checklist\](.*?)\[\/checklist\]/s',
        function ($m) {
            $items = trim($m[1]);
            $items = _craftui_unwrap_p($items);
            $lines = preg_split('/\r?\n|<br\s*\/?>/', $items);
            $html = '<ul class="sketch-checklist">';
            foreach ($lines as $line) {
                $line = trim(strip_tags($line));
                if (empty($line)) continue;
                $checked = false;
                if (preg_match('/^\[x\]\s*(.+)$/i', $line, $lm)) {
                    $checked = true;
                    $line = $lm[1];
                } elseif (preg_match('/^\[\s?\]\s*(.+)$/', $line, $lm)) {
                    $line = $lm[1];
                }
                $cls = $checked ? ' class="checked"' : '';
                $html .= '<li' . $cls . '>' . htmlspecialchars($line) . '</li>';
            }
            $html .= '</ul>';
            return $html;
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[codeblock(?:\s+lang=["\']?([^"\']*)["\']?)?(?:\s+filename=["\']?([^"\']*)["\']?)?\](.*?)\[\/codeblock\]/s',
        function ($m) {
            $lang = !empty($m[1]) ? htmlspecialchars($m[1]) : '';
            $filename = !empty($m[2]) ? htmlspecialchars($m[2]) : '';
            $code = trim($m[3]);
            $code = _craftui_unwrap_p($code);
            $code = str_replace(array('<br />', '<br>', '<br/>'), "\n", $code);
            $html = '<div class="code-block-wrapper hand-drawn-border">';
            if ($lang || $filename) {
                $html .= '<div class="code-block-header">';
                $html .= '<span class="code-block-lang">' . strtoupper($lang) . '</span>';
                if ($filename) {
                    $html .= '<div class="code-block-header-right"><span class="code-block-filename">' . $filename . '</span></div>';
                }
                $html .= '</div>';
            }
            $html .= '<pre class="sketch-code-block"><code>' . $code . '</code></pre></div>';
            return $html;
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[code\](.*?)\[\/code\]/s',
        function ($m) {
            return '<code class="sketch-code-inline">' . trim($m[1]) . '</code>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[table\](.*?)\[\/table\]/s',
        function ($m) {
            $body = trim($m[1]);
            return '<div class="table-wrapper hand-drawn-border">' . $body . '</div>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[avatar(?:\s+src=["\']([^"\']*)["\']?)?(?:\s+size=["\']?(sm|lg)["\']?)?(?:\s+letter=["\']?([^"\']*)["\']?)?\s*\/?\]/s',
        function ($m) {
            $src = !empty($m[1]) ? $m[1] : '';
            $size = !empty($m[2]) ? ' sketch-avatar-' . $m[2] : '';
            $letter = !empty($m[3]) ? htmlspecialchars($m[3]) : '';
            if ($src) {
                return '<img src="' . htmlspecialchars($src) . '" alt="Avatar" class="sketch-avatar-img' . $size . ' hand-drawn-border" />';
            }
            return '<div class="sketch-avatar' . $size . ' hand-drawn-border">' . ($letter ?: 'A') . '</div>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[columns(?:\s+count=["\']?(\d+)["\']?)?\](.*?)\[\/columns\]/s',
        function ($m) {
            $count = !empty($m[1]) ? intval($m[1]) : 2;
            return '<div style="display:grid;grid-template-columns:repeat(' . $count . ',1fr);gap:24px;">' . trim($m[2]) . '</div>';
        },
        $content
    );

    $content = preg_replace_callback(
        '/\[col\](.*?)\[\/col\]/s',
        function ($m) {
            return '<div>' . trim($m[1]) . '</div>';
        },
        $content
    );

    return $content;
}

function craftui_render_content($widget)
{
    ob_start();
    $widget->content();
    $content = ob_get_clean();
    echo parseShortcodes($content);
}

function craftui_render_excerpt($widget, $length = 200, $more = '...')
{
    ob_start();
    $widget->excerpt($length, $more);
    $content = ob_get_clean();
    echo parseShortcodes($content);
}

function craftui_get_first_image_url($widget)
{
    if (!empty($widget->fields->banner)) {
        return trim($widget->fields->banner);
    }

    $content = '';

    if (!empty($widget->content) && is_string($widget->content)) {
        $content = $widget->content;
    } else {
        ob_start();
        $widget->content();
        $content = ob_get_clean();
    }

    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $m)) {
        return html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
    }

    if (preg_match('/!\[[^\]]*\]\(([^)\s]+)(?:\s+"[^"]*")?\)/', $content, $m)) {
        return html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
    }

    if (preg_match('/\[figure\s+src=["\']([^"\']+)["\']/i', $content, $m)) {
        return html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
    }

    return '';
}

Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = function ($content, $widget, $lastResult) {
    $content = empty($lastResult) ? $content : $lastResult;
    return parseShortcodes($content);
};

Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = function ($content, $widget, $lastResult) {
    $content = empty($lastResult) ? $content : $lastResult;
    return parseShortcodes($content);
};
