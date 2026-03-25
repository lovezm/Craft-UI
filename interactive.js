export function initCodeCopy() {
  document.querySelectorAll('.code-copy-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const wrapper = btn.closest('.code-block-wrapper');
      const code = wrapper.querySelector('code');
      const text = code.textContent;
      navigator.clipboard.writeText(text).then(() => {
        btn.classList.add('copied');
        btn.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8.5l3 3 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
        showToast('Copied! 已复制', 'success');
        setTimeout(() => {
          btn.classList.remove('copied');
          btn.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="5" y="5" width="9" height="9" rx="1.5" stroke="currentColor" stroke-width="1.5"/><path d="M3 10V3a1 1 0 011-1h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>`;
        }, 2000);
      });
    });
  });
}

export function initModal() {
  const overlay = document.getElementById('sketch-modal-overlay');
  const openBtn = document.getElementById('modal-open-btn');
  const confirmBtn = document.getElementById('modal-confirm-btn');
  const closeBtn = document.getElementById('modal-close-btn');
  const cancelBtn = document.getElementById('modal-cancel-btn');
  const okBtn = document.getElementById('modal-ok-btn');
  const modal = document.getElementById('sketch-modal');
  const modalTitle = modal.querySelector('.sketch-modal-title');
  const modalBody = modal.querySelector('.sketch-modal-body');

  function open() {
    overlay.classList.add('active');
    requestAnimationFrame(() => modal.classList.add('active'));
  }

  function close() {
    modal.classList.remove('active');
    setTimeout(() => overlay.classList.remove('active'), 250);
  }

  openBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Modal Title 弹窗标题';
    modalBody.innerHTML = `<p>This is a hand-drawn style modal dialog. You can put any content here.</p><p>这是一个手绘风格的弹窗对话框，你可以在这里放置任何内容。</p>`;
    open();
  });

  confirmBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Are you sure? 确定吗？';
    modalBody.innerHTML = `<p>This action cannot be undone. Do you want to continue?</p><p>此操作不可撤销。你确定要继续吗？</p>`;
    open();
  });

  closeBtn.addEventListener('click', close);
  cancelBtn.addEventListener('click', close);
  okBtn.addEventListener('click', () => {
    close();
    showToast('Confirmed! 已确认', 'success');
  });
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) close();
  });
}

export function initToast() {
  document.querySelectorAll('.toast-trigger').forEach(btn => {
    btn.addEventListener('click', () => {
      const type = btn.dataset.type;
      const msgs = {
        info: 'This is an info message 这是一条信息提示',
        success: 'Operation succeeded! 操作成功！',
        warning: 'Please be careful 请注意谨慎操作',
        error: 'Something went wrong 出了点问题',
      };
      showToast(msgs[type], type);
    });
  });
}

export function showToast(message, type = 'info') {
  const container = document.getElementById('toast-container');
  const toast = document.createElement('div');
  toast.className = `sketch-toast sketch-toast-${type} hand-drawn-border`;

  const icons = {
    info: '\u2139',
    success: '\u2713',
    warning: '!',
    error: '\u2717',
  };

  toast.innerHTML = `
    <span class="toast-icon toast-icon-${type}">${icons[type] || ''}</span>
    <span class="toast-msg">${message}</span>
    <button class="toast-close">&times;</button>
  `;

  container.appendChild(toast);
  requestAnimationFrame(() => toast.classList.add('active'));

  const dismiss = () => {
    toast.classList.add('fading');
    setTimeout(() => {
      toast.classList.remove('active');
      setTimeout(() => toast.remove(), 350);
    }, 800);
  };

  toast.querySelector('.toast-close').addEventListener('click', () => {
    toast.classList.remove('active');
    setTimeout(() => toast.remove(), 350);
  });
  setTimeout(dismiss, 3000);
}

export function initCustomSelect() {
  document.querySelectorAll('.sketch-select-wrap').forEach(wrap => {
    const trigger = wrap.querySelector('.sketch-select-trigger');
    const valueEl = wrap.querySelector('.sketch-select-value');
    const options = wrap.querySelectorAll('.sketch-select-option');

    trigger.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = wrap.classList.contains('open');
      document.querySelectorAll('.sketch-select-wrap.open').forEach(w => w.classList.remove('open'));
      if (!isOpen) wrap.classList.add('open');
    });

    options.forEach(opt => {
      opt.addEventListener('click', () => {
        options.forEach(o => o.classList.remove('active'));
        opt.classList.add('active');
        valueEl.textContent = opt.dataset.value;
        wrap.classList.remove('open');
      });
    });
  });

  document.addEventListener('click', () => {
    document.querySelectorAll('.sketch-select-wrap.open').forEach(w => w.classList.remove('open'));
  });
}

export function initAccordion() {
  document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const item = header.parentElement;
      const isOpen = item.classList.contains('open');
      item.closest('.sketch-accordion').querySelectorAll('.accordion-item').forEach(i => i.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });
}
