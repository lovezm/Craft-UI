<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if (!$this->allow('comment')) return; ?>

<div class="comments-area" id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h3 class="comments-title"><?php $this->commentsNum(_t('No comments'), _t('1 comment'), _t('%d comments')); ?></h3>

    <ol id="comment_list" class="comment-list">
        <?php while ($comments->next()): ?>
        <li class="comment-item" id="<?php $comments->theId(); ?>">
            <div class="comment-avatar"><?php $comments->gravatar('40', ''); ?></div>
            <div class="comment-body">
                <div class="comment-meta">
                    <span class="comment-author"><?php $comments->author(); ?></span>
                    <span class="comment-date"><?php $comments->date('Y-m-d H:i'); ?></span>
                </div>
                <div class="comment-text"><?php $comments->content(); ?></div>
                <div class="comment-reply"><?php $comments->reply(_t('Reply')); ?></div>
            </div>
        </li>
        <?php endwhile; ?>
    </ol>

    <?php if ($this->options->commentsPageDisplay == 'enabled'): ?>
    <nav class="sketch-pagination" style="margin-top: 24px;">
        <?php $comments->pageNav('&laquo;', '&raquo;'); ?>
    </nav>
    <?php endif; ?>

    <?php endif; ?>

    <div class="respond" id="<?php $this->respondId(); ?>">
        <h3 class="respond-title"><?php _e('Leave a comment'); ?></h3>

        <form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">

            <?php if ($this->user->hasLogin()): ?>
            <p class="comment-form-logged-in" style="font-family: var(--font-hand); font-size: 15px; color: var(--text-light); margin-bottom: 16px;">
                <?php _e('Logged in as'); ?> <a href="<?php $this->options->profileUrl(); ?>" style="color: var(--primary);"><?php $this->user->screenName(); ?></a>.
                <a href="<?php $this->options->logoutUrl(); ?>" style="color: var(--text-light);"><?php _e('Logout'); ?> &raquo;</a>
            </p>
            <?php else: ?>
            <div class="comment-form-fields">
                <div class="comment-form-field">
                    <label for="author"><?php _e('Name'); ?> *</label>
                    <input type="text" name="author" id="author" class="hand-drawn-border" value="<?php $this->remember('author'); ?>" required />
                </div>
                <div class="comment-form-field">
                    <label for="mail"><?php _e('Email'); ?> *</label>
                    <input type="email" name="mail" id="mail" class="hand-drawn-border" value="<?php $this->remember('mail'); ?>" required />
                </div>
                <div class="comment-form-field">
                    <label for="url"><?php _e('Website'); ?></label>
                    <input type="url" name="url" id="url" class="hand-drawn-border" value="<?php $this->remember('url'); ?>" />
                </div>
            </div>
            <?php endif; ?>

            <div class="comment-form-field full-width">
                <label for="textarea"><?php _e('Comment'); ?></label>
                <textarea rows="5" cols="50" name="text" id="textarea" class="hand-drawn-border" required><?php $this->remember('text'); ?></textarea>
            </div>

            <div class="comment-submit">
                <button type="submit" class="btn btn-primary hand-drawn-border"><?php _e('Submit'); ?></button>
            </div>
        </form>
    </div>

    <?php if ($this->is('single')): ?>
    <a id="cancel-comment-reply-link" href="<?php echo $this->permalink; ?>#respond" style="display:none; font-family: var(--font-hand); font-size: 14px; color: var(--text-light); margin-top: 8px; display: inline-block;"><?php _e('Cancel reply'); ?></a>
    <?php endif; ?>
</div>
