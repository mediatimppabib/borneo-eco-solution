// public/assets/js/main.js
document.addEventListener('DOMContentLoaded', function () {
  /* =========================
     NAVBAR: add .solid when scrolled past threshold
     ========================= */
  const header = document.querySelector('.site-header');
  function checkHeader() {
    if (!header) return;
    if (window.scrollY > 80) header.classList.add('solid');
    else header.classList.remove('solid');
  }
  checkHeader();
  window.addEventListener('scroll', checkHeader);

  /* =========================
     Mobile nav toggle
     ========================= */
  const toggle = document.getElementById('mobile-toggle');
  const nav = document.getElementById('site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      nav.style.display = (nav.style.display === 'flex') ? 'none' : 'flex';
      nav.style.flexDirection = 'column';
    });
  }

  /* =========================
     Partnership: stagger reveal + counter
     ========================= */
  (function partnershipSection() {
    const revealEls = document.querySelectorAll('#partnership .reveal');
    const options = { threshold: 0.18 };

    const obs = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;

        // stagger children reveal
        const children = entry.target.querySelectorAll(':scope > *') || [entry.target];
        children.forEach((el, i) => {
          setTimeout(() => el.classList.add('visible'), i * 140);
        });

        // animate metric numbers if present
        const metrics = entry.target.parentElement?.querySelectorAll('.metric-value') || [];
        metrics.forEach(el => {
          if (!el.dataset.animated) {
            animateCount(el, parseInt(el.getAttribute('data-count') || '0'), 1200);
            el.dataset.animated = '1';
          }
        });

        observer.unobserve(entry.target);
      });
    }, options);

    const parent = document.querySelector('#partnership .partnership-inner');
    if (parent) obs.observe(parent.querySelector('.part-left') || parent);

    // counter util
    function animateCount(el, to, duration = 1000) {
      const start = 0;
      const startTime = performance.now();
      function step(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const value = Math.floor(progress * (to - start) + start);
        el.textContent = value.toLocaleString('id');
        if (progress < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    }
  })();

  /* =========================
     Contact form: AJAX submit (no reload)
     ========================= */
  (function contactFormAjax() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const submitBtn = document.getElementById('cf-submit');
    const statusEl = document.getElementById('cf-status');

    form.addEventListener('submit', async function (e) {
      e.preventDefault();
      if (statusEl) statusEl.textContent = '';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengirim...';
      }

      const formData = new FormData(form);

      try {
        const resp = await fetch(form.action, {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || (form.querySelector('input[name="_token"]')?.value || '')
          },
          body: formData
        });

        const data = await resp.json();

        if (resp.ok && data.success) {
          if (statusEl) statusEl.innerHTML = '<span class="cf-success">Pesan terkirim! Kami akan menghubungi Anda segera.</span>';
          form.reset();
        } else {
          const message = data.message || 'Gagal mengirim. Silakan coba lagi atau hubungi via WhatsApp.';
          if (statusEl) statusEl.innerHTML = `<span class="cf-error">${message}</span>`;
        }
      } catch (err) {
        if (statusEl) statusEl.innerHTML = '<span class="cf-error">Terjadi kesalahan jaringan. Coba lagi nanti.</span>';
        console.error(err);
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Kirim Pesan';
        }
        if (statusEl) setTimeout(() => (statusEl.innerHTML = ''), 8000);
      }
    });
  })();

  /* =========================
     Initial reveal for service cards (fallback)
     ========================= */
  document.querySelectorAll('.service-card.reveal').forEach(el => {
    setTimeout(() => {
      el.classList.add('visible');
      el.style.opacity = 1;
      el.style.transform = 'translateY(0)';
    }, 120);
  });

  /* =========================
     Keyboard accessibility for service cards
     ========================= */
  document.querySelectorAll('.service-card').forEach(card => {
    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        card.click();
      }
    });
  });

  /* =========================
     IntersectionObserver: reveal many elements
     ========================= */
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('visible');
      entry.target.style.opacity = 1;
      entry.target.style.transform = 'translateY(0)';
      obs.unobserve(entry.target);
    });
  }, { threshold: 0.18 });

  // observe common targets (guards added)
  document.querySelectorAll('.reveal, .card, .about-media img, .hero-media img, .partner').forEach(el => {
    observer.observe(el);
  });

  /* =========================
     Parallax: gentle background motion
     ========================= */
  const parallax = document.querySelector('.hero-bg');
  if (parallax) {
    const img = parallax.querySelector('.hero-bg-img');
    const speed = 0.22; // lower = more subtle

    function parallaxScroll() {
      const offset = window.scrollY * speed;
      if (img) {
        img.style.transform = `translate3d(-50%, calc(-50% - ${offset}px), 0) scale(1.06)`;
        const blur = Math.min(Math.abs(window.scrollY) / 1400, 0.9);
        img.style.filter = `saturate(.95) contrast(.92) blur(${blur}px)`;
      }
    }

    let ticking = false;
    window.addEventListener('scroll', () => {
      if (!ticking) {
        window.requestAnimationFrame(() => { parallaxScroll(); ticking = false; });
        ticking = true;
      }
    });
    parallaxScroll();
  }

  /* =========================
     Active nav link highlighting by section in view
     ========================= */
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');
  const opts = { root: null, threshold: 0.35 };

  const secObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      navLinks.forEach(l => l.classList.remove('active'));
      const a = document.querySelector('.nav-link[href="#' + entry.target.id + '"]');
      if (a) a.classList.add('active');
    });
  }, opts);

  sections.forEach(s => secObserver.observe(s));

  /* =========================
     Accordion: accessible, exclusive-open behavior
     ========================= */
  document.querySelectorAll('.acc-toggle').forEach(btn => {
    btn.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      const parent = this.closest('.about-accordion');

      // collapse siblings (exclusive)
      if (parent) {
        parent.querySelectorAll('.acc-toggle').forEach(b => {
          b.setAttribute('aria-expanded', 'false');
          const panel = b.nextElementSibling;
          if (panel) panel.style.display = 'none';
        });
      }

      // toggle current
      this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      const panel = this.nextElementSibling;
      if (panel) panel.style.display = expanded ? 'none' : 'block';
    });
  });

});
