import './bootstrap';

import.meta.glob('/resources/images/**/*.{png,jpg,jpeg,gif,svg}');

document.addEventListener('DOMContentLoaded', function () {
    const zoomContainers = document.querySelectorAll('.zoom-container');

    zoomContainers.forEach(container => {
        container.addEventListener('mousemove', function (e) {
            const img = container.querySelector('img');
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            img.style.transformOrigin = `${x}px ${y}px`;
            img.style.transform = 'scale(2)';
        });

        container.addEventListener('mouseleave', function () {
            const img = container.querySelector('img');
            img.style.transform = 'scale(1)';
            img.style.transformOrigin = 'center center';
        });
    });
});
