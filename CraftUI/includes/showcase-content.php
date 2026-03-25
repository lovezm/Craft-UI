<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<section class="section" id="typography">
    <h3 class="section-title"><span class="title-text">Typography 排版</span></h3>
    <div class="typo-demos">
        <h1 class="typo-h1">Heading 1 一级标题</h1>
        <h2 class="typo-h2">Heading 2 二级标题</h2>
        <h3 class="typo-h3">Heading 3 三级标题</h3>
        <h4 class="typo-h4">Heading 4 四级标题</h4>
        <h5 class="typo-h5">Heading 5 五级标题</h5>
        <div class="typo-body-demo">
            <p class="typo-body">This is body text for a blog article. Good typography is the foundation of readability. 这是博客文章的正文文本。好的排版是可读性的基础，让读者能够专注于内容本身。</p>
            <p class="typo-body typo-secondary">Secondary text with lighter weight. 次要文本使用较浅的颜色。</p>
            <p class="typo-small">Small / Caption text 小号说明文字 &mdash; used for dates, metadata, footnotes.</p>
        </div>
        <div class="typo-link-demo">
            <a href="#" class="typo-link">A hand-drawn link 手绘链接</a>
            <a href="#" class="typo-link typo-link-external">External link 外部链接 &#8599;</a>
        </div>
    </div>
</section>

<section class="section" id="notation">
    <h3 class="section-title"><span class="title-text">Notation 文本标注</span></h3>
    <div class="notation-demos">
        <div class="notation-row"><span class="notation-underline">Hand-drawn underline 手绘下划线</span></div>
        <div class="notation-row"><span class="notation-circle">Circled 圈注</span></div>
        <div class="notation-row"><span class="notation-highlight">Highlight 高亮标记</span></div>
        <div class="notation-row"><span class="notation-highlight-half">Half-highlight 半高亮</span></div>
        <div class="notation-row"><span class="notation-box">Boxed 方框标注</span></div>
        <div class="notation-row"><span class="notation-strike">Strikethrough 删除线</span></div>
        <div class="notation-row"><span class="notation-bracket">Bracket 括号强调</span></div>
        <div class="notation-row"><span class="notation-wavy">Wavy underline 波浪线</span></div>
    </div>
</section>

<section class="section" id="blockquote">
    <h3 class="section-title"><span class="title-text">Blockquote 引用</span></h3>
    <blockquote class="sketch-blockquote hand-drawn-border">
        <p>"The best design is the one you don't notice."</p>
        <p>"最好的设计是你注意不到的设计。"</p>
        <footer>&mdash; Dieter Rams</footer>
    </blockquote>
    <blockquote class="sketch-blockquote sketch-blockquote-accent hand-drawn-border">
        <p>"简约不是少，而是没有多余。足够也不是多，而是刚好你需要。"</p>
        <footer>&mdash; 无名</footer>
    </blockquote>
</section>

<section class="section" id="lists">
    <h3 class="section-title"><span class="title-text">Lists 列表</span></h3>
    <div class="lists-grid">
        <div>
            <h4 class="list-heading">Unordered 无序列表</h4>
            <ul class="sketch-ul">
                <li>First item 第一项</li>
                <li>Second item 第二项
                    <ul class="sketch-ul">
                        <li>Nested child 嵌套子项</li>
                        <li>Another child 另一个子项</li>
                    </ul>
                </li>
                <li>Third item 第三项</li>
            </ul>
        </div>
        <div>
            <h4 class="list-heading">Ordered 有序列表</h4>
            <ol class="sketch-ol">
                <li>Setup project 初始化项目</li>
                <li>Install dependencies 安装依赖</li>
                <li>Write components 编写组件</li>
                <li>Deploy 部署上线</li>
            </ol>
        </div>
        <div>
            <h4 class="list-heading">Checklist 任务列表</h4>
            <ul class="sketch-checklist">
                <li class="checked">Design system 设计系统</li>
                <li class="checked">Typography 排版体系</li>
                <li class="checked">Components 组件开发</li>
                <li>Dark mode 暗色模式</li>
                <li>Accessibility 无障碍适配</li>
            </ul>
        </div>
    </div>
</section>

<section class="section" id="code">
    <h3 class="section-title"><span class="title-text">Code 代码</span></h3>
    <div class="code-demos">
        <div class="code-inline-demo">
            <p>Inline code: use <code class="sketch-code-inline">const greeting = "Hello"</code> to declare a variable. 行内代码：使用 <code class="sketch-code-inline">npm install</code> 安装依赖。</p>
        </div>
        <div class="code-block-wrapper hand-drawn-border">
            <div class="code-block-header">
                <span class="code-block-lang">JavaScript</span>
                <div class="code-block-header-right">
                    <span class="code-block-filename">main.js</span>
                    <button class="code-copy-btn" title="Copy">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="5" y="5" width="9" height="9" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M3 10V3a1 1 0 011-1h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    </button>
                </div>
            </div>
            <pre class="sketch-code-block"><code><span class="code-keyword">function</span> <span class="code-func">greet</span>(<span class="code-param">name</span>) {
  <span class="code-keyword">const</span> message = <span class="code-string">`Hello, ${name}!`</span>;
  console.<span class="code-func">log</span>(message);
  <span class="code-keyword">return</span> message;
}

<span class="code-comment">// 调用示例 Usage example</span>
<span class="code-func">greet</span>(<span class="code-string">'World'</span>);</code></pre>
        </div>
        <div class="code-block-wrapper hand-drawn-border">
            <div class="code-block-header">
                <span class="code-block-lang">CSS</span>
                <div class="code-block-header-right">
                    <span class="code-block-filename">style.css</span>
                    <button class="code-copy-btn" title="Copy">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="5" y="5" width="9" height="9" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M3 10V3a1 1 0 011-1h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    </button>
                </div>
            </div>
            <pre class="sketch-code-block"><code><span class="code-selector">.hand-drawn-card</span> {
  <span class="code-prop">background</span>: <span class="code-string">#fffdf7</span>;
  <span class="code-prop">border</span>: <span class="code-number">2px</span> solid <span class="code-string">#3d3229</span>;
  <span class="code-prop">filter</span>: <span class="code-func">url</span>(<span class="code-string">#hand-drawn</span>);
  <span class="code-prop">border-radius</span>: <span class="code-number">3px</span>;
  <span class="code-prop">transition</span>: transform <span class="code-number">0.3s</span> ease;
}

<span class="code-selector">.hand-drawn-card</span><span class="code-pseudo">:hover</span> {
  <span class="code-prop">transform</span>: <span class="code-func">translateY</span>(<span class="code-number">-4px</span>) <span class="code-func">rotate</span>(<span class="code-number">0.5deg</span>);
}</code></pre>
        </div>
        <div class="code-block-wrapper code-block-diff hand-drawn-border">
            <div class="code-block-header">
                <span class="code-block-lang">Diff</span>
                <div class="code-block-header-right">
                    <span class="code-block-filename">config.js</span>
                    <button class="code-copy-btn" title="Copy">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="5" y="5" width="9" height="9" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M3 10V3a1 1 0 011-1h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                    </button>
                </div>
            </div>
            <pre class="sketch-code-block"><code><span class="code-diff-context"> const config = {</span>
<span class="code-diff-del">-  theme: 'default',</span>
<span class="code-diff-add">+  theme: 'hand-drawn',</span>
<span class="code-diff-context">   lang: 'zh-CN',</span>
<span class="code-diff-del">-  wobble: 0,</span>
<span class="code-diff-add">+  wobble: 0.5,</span>
<span class="code-diff-context"> };</span></code></pre>
        </div>
    </div>
</section>

<section class="section" id="components">
    <h3 class="section-title"><span class="title-text">Callouts 提示框</span></h3>
    <div class="callouts-grid">
        <div class="callout callout-info hand-drawn-border">
            <div class="callout-icon">&#x1D4D8;</div>
            <div class="callout-body">
                <strong>Info 提示</strong>
                <p>This is an informational callout for helpful tips. 这是一条信息提示，用于展示有用的小贴士。</p>
            </div>
        </div>
        <div class="callout callout-warning hand-drawn-border">
            <div class="callout-icon">!</div>
            <div class="callout-body">
                <strong>Warning 警告</strong>
                <p>Be careful with this operation. 请注意，此操作需要谨慎。</p>
            </div>
        </div>
        <div class="callout callout-success hand-drawn-border">
            <div class="callout-icon">&#10003;</div>
            <div class="callout-body">
                <strong>Success 成功</strong>
                <p>Operation completed successfully! 操作已成功完成！</p>
            </div>
        </div>
        <div class="callout callout-error hand-drawn-border">
            <div class="callout-icon">&#10007;</div>
            <div class="callout-body">
                <strong>Error 错误</strong>
                <p>Something went wrong, please try again. 出了点问题，请重试。</p>
            </div>
        </div>
        <div class="callout callout-note hand-drawn-border">
            <div class="callout-icon">&#9998;</div>
            <div class="callout-body">
                <strong>Note 备注</strong>
                <p>A side note for additional context. 一条补充说明，提供更多背景信息。</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="tags">
    <h3 class="section-title"><span class="title-text">Tags & Badges 标签</span></h3>
    <div class="tags-demos">
        <div class="tags-row">
            <h4 class="tags-heading">Basic Tags 基础标签</h4>
            <div class="tags-wrap">
                <span class="sketch-tag">Default 默认</span>
                <span class="sketch-tag tag-primary">Primary 主要</span>
                <span class="sketch-tag tag-secondary">Secondary 次要</span>
                <span class="sketch-tag tag-accent">Accent 强调</span>
                <span class="sketch-tag tag-warning">Warning 警告</span>
                <span class="sketch-tag tag-danger">Danger 危险</span>
                <span class="sketch-tag tag-success">Success 成功</span>
            </div>
        </div>
        <div class="tags-row">
            <h4 class="tags-heading">Outline Tags 描边标签</h4>
            <div class="tags-wrap">
                <span class="sketch-tag tag-outline">Outline</span>
                <span class="sketch-tag tag-outline tag-outline-primary">Primary</span>
                <span class="sketch-tag tag-outline tag-outline-accent">Accent</span>
                <span class="sketch-tag tag-outline tag-outline-warning">Warning</span>
            </div>
        </div>
        <div class="tags-row">
            <h4 class="tags-heading">Pill Badges 胶囊徽章</h4>
            <div class="tags-wrap">
                <span class="sketch-badge">v2.0</span>
                <span class="sketch-badge badge-primary">New 新</span>
                <span class="sketch-badge badge-accent">Beta</span>
                <span class="sketch-badge badge-warning">WIP</span>
                <span class="sketch-badge badge-danger">Hot 热门</span>
            </div>
        </div>
        <div class="tags-row">
            <h4 class="tags-heading">Category Tags 分类标签</h4>
            <div class="tags-wrap">
                <span class="sketch-tag tag-category"># JavaScript</span>
                <span class="sketch-tag tag-category"># CSS</span>
                <span class="sketch-tag tag-category"># 设计</span>
                <span class="sketch-tag tag-category"># 前端</span>
                <span class="sketch-tag tag-category"># React</span>
                <span class="sketch-tag tag-category"># 教程</span>
            </div>
        </div>
    </div>
</section>

<section class="section" id="table">
    <h3 class="section-title"><span class="title-text">Table 表格</span></h3>
    <div class="table-wrapper hand-drawn-border">
        <table class="sketch-table">
            <thead>
                <tr>
                    <th>Component 组件</th>
                    <th>Status 状态</th>
                    <th>Description 描述</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Typography 排版</td>
                    <td><span class="sketch-badge badge-accent">Done 完成</span></td>
                    <td>Headings, body, links 标题、正文、链接</td>
                </tr>
                <tr>
                    <td>Code Block 代码块</td>
                    <td><span class="sketch-badge badge-accent">Done 完成</span></td>
                    <td>Syntax highlight, inline code 语法高亮、行内代码</td>
                </tr>
                <tr>
                    <td>Callout 提示</td>
                    <td><span class="sketch-badge badge-accent">Done 完成</span></td>
                    <td>Info, warning, error, success 信息、警告、错误、成功</td>
                </tr>
                <tr>
                    <td>Dark Mode 暗色</td>
                    <td><span class="sketch-badge badge-warning">WIP</span></td>
                    <td>Theme toggle 主题切换</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section" id="modal">
    <h3 class="section-title"><span class="title-text">Modal 弹窗</span></h3>
    <div class="buttons-grid">
        <button class="btn btn-primary hand-drawn-border" id="modal-open-btn">Open Modal 打开弹窗</button>
        <button class="btn btn-secondary hand-drawn-border" id="modal-confirm-btn">Confirm Dialog 确认对话</button>
    </div>
</section>
<div class="sketch-modal-overlay" id="sketch-modal-overlay">
    <div class="sketch-modal hand-drawn-border" id="sketch-modal">
        <div class="sketch-modal-header">
            <h4 class="sketch-modal-title">Modal Title 弹窗标题</h4>
            <button class="sketch-modal-close" id="modal-close-btn">&times;</button>
        </div>
        <div class="sketch-modal-body">
            <p>This is a hand-drawn style modal dialog. You can put any content here.</p>
            <p>这是一个手绘风格的弹窗对话框，你可以在这里放置任何内容。</p>
        </div>
        <div class="sketch-modal-footer">
            <button class="btn btn-outline hand-drawn-border" id="modal-cancel-btn">Cancel 取消</button>
            <button class="btn btn-primary hand-drawn-border" id="modal-ok-btn">Confirm 确定</button>
        </div>
    </div>
</div>

<section class="section" id="toast-section">
    <h3 class="section-title"><span class="title-text">Toast 轻提示</span></h3>
    <div class="buttons-grid">
        <button class="btn btn-secondary hand-drawn-border toast-trigger" data-type="info">Info 信息</button>
        <button class="btn btn-accent hand-drawn-border toast-trigger" data-type="success">Success 成功</button>
        <button class="btn btn-outline hand-drawn-border toast-trigger" data-type="warning">Warning 警告</button>
        <button class="btn btn-danger hand-drawn-border toast-trigger" data-type="error">Error 错误</button>
    </div>
</section>
<div class="toast-container" id="toast-container"></div>

<section class="section" id="tooltip-section">
    <h3 class="section-title"><span class="title-text">Tooltip 提示气泡</span></h3>
    <div class="buttons-grid">
        <span class="sketch-tooltip-wrap">
            <button class="btn btn-outline hand-drawn-border">Hover me 悬停</button>
            <span class="sketch-tooltip sketch-tooltip-top">Tooltip on top 顶部提示</span>
        </span>
        <span class="sketch-tooltip-wrap">
            <button class="btn btn-outline hand-drawn-border">Hover me 悬停</button>
            <span class="sketch-tooltip sketch-tooltip-bottom">Bottom tooltip 底部提示</span>
        </span>
        <span class="sketch-tooltip-wrap">
            <span class="notation-underline" style="cursor:help">Hover this text 悬停此文本</span>
            <span class="sketch-tooltip sketch-tooltip-top">A helpful tooltip 有用的提示信息</span>
        </span>
    </div>
</section>

<section class="section" id="accordion-section">
    <h3 class="section-title"><span class="title-text">Accordion 折叠面板</span></h3>
    <div class="sketch-accordion">
        <div class="accordion-item hand-drawn-border">
            <button class="accordion-header">
                <span>What is Craft UI? 什么是 Craft UI?</span>
                <span class="accordion-arrow">&#9662;</span>
            </button>
            <div class="accordion-body">
                <p>Craft UI is a hand-drawn style design system for blogs, built with pure CSS, JS, and SVG. No frameworks needed.</p>
                <p>Craft UI 是一套手绘风格的博客设计系统，使用纯 CSS、JS 和 SVG 构建，无需任何框架。</p>
            </div>
        </div>
        <div class="accordion-item hand-drawn-border">
            <button class="accordion-header">
                <span>How does the sketch effect work? 手绘效果如何实现？</span>
                <span class="accordion-arrow">&#9662;</span>
            </button>
            <div class="accordion-body">
                <p>We use SVG filters (<code class="sketch-code-inline">feTurbulence</code> + <code class="sketch-code-inline">feDisplacementMap</code>) to create the wobble effect on borders and shapes.</p>
                <p>我们使用 SVG 滤镜来为边框和图形创建抖动效果。</p>
            </div>
        </div>
        <div class="accordion-item hand-drawn-border">
            <button class="accordion-header">
                <span>Can I customize colors? 可以自定义颜色吗？</span>
                <span class="accordion-arrow">&#9662;</span>
            </button>
            <div class="accordion-body">
                <p>Yes! Use the theme panel on the right to change primary colors, background, wobble intensity, and more.</p>
                <p>当然可以！使用右侧的主题面板即可更换主色调、背景色、抖动强度等。</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="progress-section">
    <h3 class="section-title"><span class="title-text">Progress 进度条</span></h3>
    <div class="progress-demos">
        <div class="progress-item">
            <div class="progress-label"><span>Design 设计</span><span>80%</span></div>
            <div class="sketch-progress hand-drawn-border"><div class="sketch-progress-fill" style="width:80%"></div></div>
        </div>
        <div class="progress-item">
            <div class="progress-label"><span>Development 开发</span><span>55%</span></div>
            <div class="sketch-progress hand-drawn-border"><div class="sketch-progress-fill progress-secondary" style="width:55%"></div></div>
        </div>
        <div class="progress-item">
            <div class="progress-label"><span>Testing 测试</span><span>30%</span></div>
            <div class="sketch-progress hand-drawn-border"><div class="sketch-progress-fill progress-accent" style="width:30%"></div></div>
        </div>
    </div>
</section>

<section class="section" id="kbd-section">
    <h3 class="section-title"><span class="title-text">Keyboard 键盘快捷键</span></h3>
    <div class="kbd-demos">
        <p>Press <kbd class="sketch-kbd">Ctrl</kbd> + <kbd class="sketch-kbd">C</kbd> to copy 复制</p>
        <p>Press <kbd class="sketch-kbd">Ctrl</kbd> + <kbd class="sketch-kbd">V</kbd> to paste 粘贴</p>
        <p>Press <kbd class="sketch-kbd">Ctrl</kbd> + <kbd class="sketch-kbd">Z</kbd> to undo 撤销</p>
        <p>Press <kbd class="sketch-kbd">&#8984; Cmd</kbd> + <kbd class="sketch-kbd">Shift</kbd> + <kbd class="sketch-kbd">P</kbd> to open command palette 打开命令面板</p>
        <p>Press <kbd class="sketch-kbd">Esc</kbd> to close 关闭</p>
    </div>
</section>

<section class="section" id="breadcrumb-section">
    <h3 class="section-title"><span class="title-text">Breadcrumb 面包屑</span></h3>
    <nav class="sketch-breadcrumb">
        <a href="#" class="breadcrumb-item">Home 首页</a>
        <span class="breadcrumb-sep">/</span>
        <a href="#" class="breadcrumb-item">Blog 博客</a>
        <span class="breadcrumb-sep">/</span>
        <a href="#" class="breadcrumb-item">Category 分类</a>
        <span class="breadcrumb-sep">/</span>
        <span class="breadcrumb-current">Current Page 当前页面</span>
    </nav>
    <nav class="sketch-breadcrumb" style="margin-top:12px">
        <a href="#" class="breadcrumb-item">Home</a>
        <span class="breadcrumb-sep">&#8250;</span>
        <a href="#" class="breadcrumb-item">Docs 文档</a>
        <span class="breadcrumb-sep">&#8250;</span>
        <span class="breadcrumb-current">Components 组件</span>
    </nav>
</section>

<section class="section" id="pagination-section">
    <h3 class="section-title"><span class="title-text">Pagination 分页</span></h3>
    <nav class="sketch-pagination">
        <button class="page-btn hand-drawn-border page-prev">&laquo; Prev</button>
        <button class="page-btn hand-drawn-border">1</button>
        <button class="page-btn hand-drawn-border page-active">2</button>
        <button class="page-btn hand-drawn-border">3</button>
        <span class="page-dots">...</span>
        <button class="page-btn hand-drawn-border">12</button>
        <button class="page-btn hand-drawn-border page-next">Next &raquo;</button>
    </nav>
</section>

<section class="section" id="avatar-section">
    <h3 class="section-title"><span class="title-text">Avatar & Image 头像与图片</span></h3>
    <div class="avatar-demos">
        <div class="avatar-row">
            <div class="sketch-avatar sketch-avatar-sm hand-drawn-border">A</div>
            <div class="sketch-avatar hand-drawn-border">B</div>
            <div class="sketch-avatar sketch-avatar-lg hand-drawn-border">C</div>
            <div class="sketch-avatar sketch-avatar-lg hand-drawn-border" style="background:var(--secondary)">D</div>
        </div>
        <div class="avatar-row">
            <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=120&h=120&dpr=1" alt="Avatar" class="sketch-avatar-img sketch-avatar-sm hand-drawn-border">
            <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=120&h=120&dpr=1" alt="Avatar" class="sketch-avatar-img hand-drawn-border">
            <img src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=120&h=120&dpr=1" alt="Avatar" class="sketch-avatar-img sketch-avatar-lg hand-drawn-border">
        </div>
        <div class="figure-grid">
            <figure class="sketch-figure hand-drawn-border">
                <img src="https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=480&h=300&dpr=1" alt="Demo image" class="sketch-figure-img">
                <figcaption>Image caption 图片说明 &mdash; A hand-drawn style image</figcaption>
            </figure>
            <figure class="sketch-figure hand-drawn-border">
                <div class="sketch-figure-placeholder">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><rect x="4" y="8" width="40" height="32" rx="3" stroke="currentColor" stroke-width="2"/><circle cx="16" cy="20" r="4" stroke="currentColor" stroke-width="1.5"/><path d="M4 34l10-8 6 5 8-10 16 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <figcaption>Placeholder 占位图 &mdash; When no image is available</figcaption>
            </figure>
        </div>
    </div>
</section>

<section class="section" id="social-icons">
    <h3 class="section-title"><span class="title-text">Social Icons 社交图标</span></h3>
    <div class="social-demos">
        <div class="social-row">
            <a href="#" class="social-icon hand-drawn-border" title="GitHub">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg>
                <span class="social-label">GitHub</span>
            </a>
            <a href="#" class="social-icon hand-drawn-border" title="X / Twitter">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                <span class="social-label">X</span>
            </a>
            <a href="#" class="social-icon hand-drawn-border" title="Telegram">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21.198 2.433a2.242 2.242 0 00-1.022.215l-16.5 7.5a.75.75 0 00.06 1.39l4.764 1.588 2 6.3a.75.75 0 001.27.29l2.3-2.3 4.242 3.22a1.5 1.5 0 002.36-1.06l2.5-15.5a2.25 2.25 0 00-1.974-1.643z"/><path d="M10.5 13.5l8-7.5"/></svg>
                <span class="social-label">Telegram</span>
            </a>
            <a href="#" class="social-icon hand-drawn-border" title="Email">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <span class="social-label">Email</span>
            </a>
        </div>
    </div>
</section>

<section class="section" id="dividers">
    <h3 class="section-title"><span class="title-text">Dividers 分割线</span></h3>
    <div class="dividers-demos">
        <p class="divider-label">Straight 直线</p>
        <div class="divider-line" id="divider-straight"></div>
        <p class="divider-label">Wave 波浪</p>
        <div class="divider-line" id="divider-wave"></div>
        <p class="divider-label">Dashed 虚线</p>
        <div class="divider-line" id="divider-dashed"></div>
        <p class="divider-label">Dots 点线</p>
        <div class="divider-dots"></div>
        <p class="divider-label">Stars 星星</p>
        <div class="divider-stars" id="divider-stars"></div>
        <p class="divider-label">Ornamental 装饰线</p>
        <div class="divider-ornament" id="divider-ornament"></div>
    </div>
</section>

<section class="section" id="buttons">
    <h3 class="section-title"><span class="title-text">Buttons 按钮</span></h3>
    <div class="buttons-grid">
        <button class="btn btn-primary hand-drawn-border">Primary 主要</button>
        <button class="btn btn-secondary hand-drawn-border">Secondary 次要</button>
        <button class="btn btn-accent hand-drawn-border">Accent 强调</button>
        <button class="btn btn-outline hand-drawn-border">Outline 描边</button>
        <button class="btn btn-ghost">Ghost 幽灵</button>
        <button class="btn btn-danger hand-drawn-border">Danger 危险</button>
    </div>
    <div class="buttons-grid" style="margin-top: 16px;">
        <button class="btn btn-sm btn-primary hand-drawn-border">Small 小</button>
        <button class="btn btn-primary hand-drawn-border">Medium 中</button>
        <button class="btn btn-lg btn-primary hand-drawn-border">Large 大</button>
    </div>
</section>

<section class="section" id="cards">
    <h3 class="section-title"><span class="title-text">Cards 卡片</span></h3>
    <div class="cards-grid">
        <div class="card hand-drawn-border anim-float">
            <div class="card-icon" id="card-icon-1"></div>
            <h4 class="card-title">Sketchy Borders 手绘边框</h4>
            <p class="card-desc">Every border wobbles slightly, mimicking real hand-drawn strokes. 每条边框都会轻微抖动，模拟真实的手绘笔触。</p>
            <div class="card-tags">
                <span class="sketch-tag tag-primary">SVG</span>
                <span class="sketch-tag tag-accent">Filter</span>
            </div>
        </div>
        <div class="card hand-drawn-border anim-float" style="animation-delay: 0.5s;">
            <div class="card-icon" id="card-icon-2"></div>
            <h4 class="card-title">SVG Filters 滤镜效果</h4>
            <p class="card-desc">Pencil textures and ink bleeding effects via SVG filter chains. 通过SVG滤镜链实现铅笔纹理和墨水晕染效果。</p>
            <div class="card-tags">
                <span class="sketch-tag tag-primary">CSS</span>
                <span class="sketch-tag tag-accent">Art</span>
            </div>
        </div>
        <div class="card hand-drawn-border anim-float" style="animation-delay: 1s;">
            <div class="card-icon" id="card-icon-3"></div>
            <h4 class="card-title">Animations 动画</h4>
            <p class="card-desc">Float, swing, twinkle and squiggly motion effects for lively pages. 浮动、摇摆、闪烁和抖动动效，让页面充满活力。</p>
            <div class="card-tags">
                <span class="sketch-tag tag-primary">Motion</span>
                <span class="sketch-tag tag-accent">UX</span>
            </div>
        </div>
    </div>
</section>

<section class="section" id="forms">
    <h3 class="section-title"><span class="title-text">Form Elements 表单</span></h3>
    <div class="inputs-grid">
        <div class="input-group hand-drawn-border">
            <label class="input-label">Name 姓名</label>
            <input type="text" class="input-field" placeholder="Write here... 在此输入">
        </div>
        <div class="input-group hand-drawn-border">
            <label class="input-label">Email 邮箱</label>
            <input type="email" class="input-field" placeholder="you@example.com">
        </div>
        <div class="input-group hand-drawn-border">
            <label class="input-label">Message 留言</label>
            <textarea class="input-field textarea-field" placeholder="Tell me something... 说点什么吧"></textarea>
        </div>
        <div class="input-group hand-drawn-border">
            <label class="input-label">Select 下拉选择</label>
            <div class="sketch-select-wrap">
                <button class="sketch-select-trigger" type="button">
                    <span class="sketch-select-value">Option A 选项A</span>
                    <svg class="sketch-select-arrow" width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div class="sketch-select-dropdown hand-drawn-border">
                    <div class="sketch-select-option active" data-value="Option A 选项A">Option A 选项A</div>
                    <div class="sketch-select-option" data-value="Option B 选项B">Option B 选项B</div>
                    <div class="sketch-select-option" data-value="Option C 选项C">Option C 选项C</div>
                </div>
            </div>
        </div>
        <div class="checkbox-group">
            <label class="checkbox-label">
                <span class="checkbox-box hand-drawn-border"><span class="checkmark">&#10003;</span></span>
                <span>I love hand-drawn style 我喜欢手绘风格</span>
            </label>
            <label class="checkbox-label">
                <span class="checkbox-box hand-drawn-border"></span>
                <span>Pure CSS + JS 纯CSS+JS</span>
            </label>
        </div>
        <div class="radio-group">
            <label class="radio-label"><span class="radio-dot hand-drawn-border"><span class="radio-inner active"></span></span> Light 明亮</label>
            <label class="radio-label"><span class="radio-dot hand-drawn-border"><span class="radio-inner"></span></span> Dark 暗色</label>
        </div>
    </div>
</section>

<section class="section" id="animations">
    <h3 class="section-title"><span class="title-text">Animations 动画</span></h3>
    <div class="anim-grid" id="anim-grid">
        <div class="anim-demo anim-float">
            <div class="anim-shape" id="anim-shape-float"></div>
            <span class="anim-label">Float 浮动</span>
        </div>
        <div class="anim-demo anim-swing-wrapper">
            <div class="anim-shape anim-swing" id="anim-shape-swing"></div>
            <span class="anim-label">Swing 摇摆</span>
        </div>
        <div class="anim-demo">
            <div class="anim-shape anim-spin" id="anim-shape-spin"></div>
            <span class="anim-label">Spin 旋转</span>
        </div>
        <div class="anim-demo">
            <div class="anim-shape anim-twinkle" id="anim-shape-twinkle"></div>
            <span class="anim-label">Twinkle 闪烁</span>
        </div>
        <div class="anim-demo">
            <div class="anim-shape anim-pulse" id="anim-shape-pulse"></div>
            <span class="anim-label">Pulse 脉冲</span>
        </div>
        <div class="anim-demo">
            <div class="anim-shape anim-squiggly" id="anim-shape-squiggly"></div>
            <span class="anim-label">Squiggly 抖动</span>
        </div>
    </div>
</section>

<section class="section" id="confetti">
    <h3 class="section-title"><span class="title-text">Confetti 彩纸特效</span></h3>
    <div class="confetti-area">
        <button class="btn btn-primary hand-drawn-border confetti-trigger" id="confetti-btn">Click for Confetti! 点击撒花</button>
        <div class="confetti-container" id="confetti-container"></div>
    </div>
</section>
