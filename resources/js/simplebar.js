import SimpleBar from 'simplebar';

document.addEventListener('DOMContentLoaded', function () {
    const simpleBarElements = document.querySelectorAll('.simplebar');
    simpleBarElements.forEach(function(element) {
        new SimpleBar(element);
    });
});
