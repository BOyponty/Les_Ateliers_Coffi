import './bootstrap';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.start();

// Animation au scroll pour les cartes Masonry
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.masonry-card');

    const observer = new IntersectionObserver((entries, observer) => {
        let delay = 0;
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Ajoute la classe avec un délai pour l'effet cascade
                setTimeout(() => {
                    entry.target.classList.add('is-visible');
                }, delay);
                delay += 100; // 100ms d'écart entre chaque carte

                // On arrête d'observer une fois que l'animation est lancée
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1, // Déclenche quand 10% de la carte est visible
        rootMargin: "0px 0px -50px 0px"
    });

    cards.forEach(card => {
        observer.observe(card);
    });
});
