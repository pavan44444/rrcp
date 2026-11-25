/* R R College of Pharmacy — vanilla JS, no dependencies */
(function () {
    'use strict';

    var $ = function (s, c) { return (c || document).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
    var isMobile = function () { return window.matchMedia('(max-width: 1199px)').matches; };

    /* ---------- Header: sticky shadow ---------- */
    var header = $('#siteHeader');
    function onScroll() {
        if (header) header.classList.toggle('scrolled', window.scrollY > 10);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---------- Mobile nav ---------- */
    var toggle = $('#navToggle');
    var nav = $('#mainNav');

    function closeNav() {
        if (!nav) return;
        nav.classList.remove('open');
        toggle.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var open = nav.classList.toggle('open');
            toggle.classList.toggle('open', open);
            toggle.setAttribute('aria-expanded', open);
            document.body.style.overflow = open ? 'hidden' : '';
        });

        // accordion for dropdown parents on mobile
        $$('.menu li.dropdown > a', nav).forEach(function (a) {
            a.addEventListener('click', function (e) {
                if (!isMobile()) return;
                var li = a.parentNode;
                var href = a.getAttribute('href');
                if (href === '#' || !li.classList.contains('open')) {
                    e.preventDefault();
                    // close siblings
                    $$(':scope > li.open', li.parentNode).forEach(function (s) { if (s !== li) s.classList.remove('open'); });
                    li.classList.toggle('open');
                }
            });
        });

        // real links close the drawer
        $$('.menu a', nav).forEach(function (a) {
            a.addEventListener('click', function () {
                if (isMobile() && a.getAttribute('href') !== '#' && !a.parentNode.classList.contains('dropdown')) closeNav();
            });
        });

        window.addEventListener('resize', function () { if (!isMobile()) closeNav(); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeNav(); });
    }

    /* ---------- Hero slider ---------- */
    var hero = $('#hero');
    if (hero) {
        var slides = $$('.slide', hero);
        var dotsBox = $('.hero-dots', hero);
        var current = 0, timer = null, DELAY = 6000;

        var dots = slides.map(function (_, i) {
            var b = document.createElement('button');
            b.type = 'button';
            b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
            b.addEventListener('click', function () { go(i); restart(); });
            dotsBox.appendChild(b);
            return b;
        });

        function go(n) {
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = (n + slides.length) % slides.length;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
        }
        function start() { timer = setInterval(function () { go(current + 1); }, DELAY); }
        function stop() { clearInterval(timer); }
        function restart() { stop(); start(); }

        $('.hero-arrow.prev', hero).addEventListener('click', function () { go(current - 1); restart(); });
        $('.hero-arrow.next', hero).addEventListener('click', function () { go(current + 1); restart(); });
        hero.addEventListener('mouseenter', stop);
        hero.addEventListener('mouseleave', start);

        // swipe
        var sx = null;
        hero.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; }, { passive: true });
        hero.addEventListener('touchend', function (e) {
            if (sx === null) return;
            var dx = e.changedTouches[0].clientX - sx;
            if (Math.abs(dx) > 50) { go(current + (dx < 0 ? 1 : -1)); restart(); }
            sx = null;
        });

        go(0);
        start();
    }

    /* ---------- Video modal ---------- */
    var modal = $('#videoModal');
    if (modal) {
        var frame = $('.modal-frame', modal);
        var openVideo = function (url) {
            frame.innerHTML = '<iframe src="' + url + '" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>';
            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
        };
        var closeVideo = function () {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            frame.innerHTML = '';
        };
        $$('[data-video]').forEach(function (b) {
            b.addEventListener('click', function () { openVideo(b.getAttribute('data-video')); });
        });
        $('.modal-backdrop', modal).addEventListener('click', closeVideo);
        $('.modal-close', modal).addEventListener('click', closeVideo);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeVideo(); });
    }

    /* ---------- Carousels (scroll-snap + arrows + optional autoplay) ---------- */
    $$('.carousel').forEach(function (c) {
        var track = $('.carousel-track', c);
        var prev = $('.carousel-arrow.prev', c);
        var next = $('.carousel-arrow.next', c);
        var auto = parseInt(c.getAttribute('data-autoplay'), 10) || 0;
        var timer = null;

        function step() {
            var item = $('.carousel-item', track);
            return item ? item.getBoundingClientRect().width + 24 : track.clientWidth;
        }
        function atEnd() { return track.scrollLeft + track.clientWidth >= track.scrollWidth - 4; }
        function forward() {
            if (atEnd()) track.scrollTo({ left: 0, behavior: 'smooth' });
            else track.scrollBy({ left: step(), behavior: 'smooth' });
        }
        function back() {
            if (track.scrollLeft <= 4) track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
            else track.scrollBy({ left: -step(), behavior: 'smooth' });
        }

        if (prev) prev.addEventListener('click', back);
        if (next) next.addEventListener('click', forward);

        if (auto) {
            var start = function () { timer = setInterval(forward, auto); };
            var stop = function () { clearInterval(timer); };
            c.addEventListener('mouseenter', stop);
            c.addEventListener('mouseleave', start);
            c.addEventListener('touchstart', stop, { passive: true });
            start();
        }
    });

    /* ---------- Counters ---------- */
    var counters = $$('.count');
    function animate(el) {
        var stop = parseInt(el.getAttribute('data-stop'), 10) || 0;
        var dur = 2200, t0 = null;
        function tick(t) {
            if (!t0) t0 = t;
            var p = Math.min((t - t0) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(stop * eased).toLocaleString('en-IN');
            if (p < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { animate(en.target); io.unobserve(en.target); }
            });
        }, { threshold: .4 });
        counters.forEach(function (c) { io.observe(c); });
    } else {
        counters.forEach(animate);
    }
})();