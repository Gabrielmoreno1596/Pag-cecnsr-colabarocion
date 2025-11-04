class HeroSlider {
    constructor({ duration = 5000 } = {}) {
        this.root = document.querySelector('.hero');
        this.slides = [...document.querySelectorAll('.hero-slide')];
        this.indicators = [...document.querySelectorAll('.hero__indicator')];
        this.progress = document.getElementById('heroProgress');
        this.index = 0;
        this.duration = duration;
        this.timer = null;
        this.progressTimer = null;
        this.reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!this.root || !this.slides.length) return;
        this.bind();
        this.go(0);
        if (!this.reduceMotion) this.start();
    }
    bind() {
        this.indicators.forEach((dot, i) => dot.addEventListener('click', () => this.go(i, true)));
    }
    start() {
        this.clearTimers();
        this.timer = setInterval(() => this.next(), this.duration);
        this.startProgress();
    }
    pause() { this.clearTimers(); }
    clearTimers() {
        if (this.timer) clearInterval(this.timer);
        if (this.progressTimer) clearInterval(this.progressTimer);
        this.timer = this.progressTimer = null;
    }
    next() { this.go(this.index + 1); }
    go(n, manual = false) {
        const L = this.slides.length;
        this.index = (n + L) % L;
        this.slides.forEach((s, i) => s.classList.toggle('active', i === this.index));
        this.indicators.forEach((d, i) => d.classList.toggle('active', i === this.index));
        this.startProgress();
        if (manual && !this.reduceMotion) { this.pause(); this.start(); }
    }
    startProgress() {
        if (!this.progress) return;
        if (this.progressTimer) { clearInterval(this.progressTimer); this.progressTimer = null; }
        this.progress.style.width = '0%';
        if (this.reduceMotion) return;
        const step = 50; let w = 0;
        this.progressTimer = setInterval(() => {
            w += 100 / (this.duration / step);
            this.progress.style.width = w + '%';
            if (w >= 100) { clearInterval(this.progressTimer); this.progressTimer = null; }
        }, step);
    }
}

document.addEventListener('DOMContentLoaded', () => new HeroSlider({ duration: 5000 }));
