/**
 * Muhammad Usman Younas — Portfolio JS
 * Laravel 10 / PHP 8.2
 */

document.addEventListener('DOMContentLoaded', () => {

  // ── Init Feather Icons ─────────────────────
  if (typeof feather !== 'undefined') {
    feather.replace({ 'stroke-width': 1.8 });
  }

  // ── Navbar scroll effect ───────────────────
  const navbar = document.getElementById('navbar');
  const handleNavScroll = () => {
    navbar?.classList.toggle('scrolled', window.scrollY > 20);
  };
  window.addEventListener('scroll', handleNavScroll, { passive: true });
  handleNavScroll();

  // ── Mobile Menu Toggle ─────────────────────
  const menuToggle = document.getElementById('menuToggle');
  const navLinks   = document.getElementById('navLinks');
  menuToggle?.addEventListener('click', () => {
    navLinks?.classList.toggle('open');
    const isOpen = navLinks?.classList.contains('open');
    menuToggle.setAttribute('aria-expanded', isOpen);
  });

  // close menu on nav link click
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      navLinks?.classList.remove('open');
    });
  });

  // ── Active Nav Link on Scroll ──────────────
  const sections = document.querySelectorAll('section[id]');
  const navAnchorLinks = document.querySelectorAll('.nav-link[href^="#"]');

  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const id = entry.target.id;
        navAnchorLinks.forEach(link => {
          link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
        });
      }
    });
  }, { rootMargin: '-40% 0px -55% 0px' });

  sections.forEach(section => sectionObserver.observe(section));

  // ── Scroll Animations ──────────────────────
  const animateObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        // Stagger children if parent has data-animate
        const delay = entry.target.dataset.delay || 0;
        setTimeout(() => {
          entry.target.classList.add('animated');
        }, delay);
        animateObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  // Add stagger delays to grid children
  document.querySelectorAll('.skills__grid, .projects__grid').forEach(grid => {
    grid.querySelectorAll('[data-animate]').forEach((card, i) => {
      card.dataset.delay = i * 80;
    });
  });

  document.querySelectorAll('[data-animate]').forEach(el => {
    animateObserver.observe(el);
  });

  // ── Project Card Accent Colors ─────────────
  document.querySelectorAll('.project-card').forEach(card => {
    const accent = card.style.getPropertyValue('--accent');
    if (accent) {
      card.querySelector('.project-card__icon svg')?.style.setProperty('color', accent);
    }
  });

  // ── Contact Form ───────────────────────────
  const form       = document.getElementById('contactForm');
  const submitBtn  = document.getElementById('submitBtn');
  const btnText    = submitBtn?.querySelector('.btn-text');
  const btnLoading = submitBtn?.querySelector('.btn-loading');

  form?.addEventListener('submit', async (e) => {
    e.preventDefault();
    clearErrors();

    // Basic client validation
    const name    = form.name.value.trim();
    const email   = form.email.value.trim();
    const subject = form.subject.value.trim();
    const message = form.message.value.trim();

    let hasError = false;
    if (!name)    { showError('nameError', 'Please enter your name.'); hasError = true; }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError('emailError', 'Please enter a valid email address.'); hasError = true;
    }
    if (!subject) { showError('subjectError', 'Please enter a subject.'); hasError = true; }
    if (!message) { showError('messageError', 'Please enter a message.'); hasError = true; }
    if (hasError) return;

    // Show loading state
    setLoading(true);

    try {
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
      const res = await fetch('/contact', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken || '',
          'Accept': 'application/json',
        },
        body: JSON.stringify({ name, email, subject, message }),
      });

      const data = await res.json();

      if (data.success) {
        showToast(data.message, 'success');
        form.reset();
      } else if (data.errors) {
        Object.entries(data.errors).forEach(([field, msgs]) => {
          showError(`${field}Error`, msgs[0]);
        });
        showToast('Please correct the errors below.', 'error');
      } else {
        showToast(data.message || 'Something went wrong. Please try again.', 'error');
      }

    } catch (err) {
      showToast('Network error. Please check your connection and try again.', 'error');
    } finally {
      setLoading(false);
    }
  });

  function setLoading(state) {
    if (!submitBtn) return;
    submitBtn.disabled = state;
    btnText?.classList.toggle('hidden', state);
    btnLoading?.classList.toggle('hidden', !state);
  }

  function clearErrors() {
    document.querySelectorAll('.form-error').forEach(el => el.textContent = '');
  }

  function showError(id, msg) {
    const el = document.getElementById(id);
    if (el) el.textContent = msg;
  }

  // ── Toast Notification ─────────────────────
  function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    if (!toast) return;
    toast.textContent = message;
    toast.className = `toast toast--${type} show`;
    setTimeout(() => { toast.classList.remove('show'); }, 4500);
  }

  // ── Smooth scroll for all anchor links ─────
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = parseInt(getComputedStyle(document.documentElement)
          .getPropertyValue('--nav-h')) || 72;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  // ── Hamburger animation ────────────────────
  menuToggle?.addEventListener('click', () => {
    menuToggle.querySelectorAll('span').forEach((span, i) => {
      span.style.transform = navLinks?.classList.contains('open')
        ? i === 0 ? 'rotate(45deg) translate(5px, 5px)'
        : i === 1 ? 'scaleX(0)'
        : 'rotate(-45deg) translate(5px, -5px)'
        : '';
    });
  });

});
