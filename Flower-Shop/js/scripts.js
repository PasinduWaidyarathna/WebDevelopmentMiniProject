/*document.addEventListener("DOMContentLoaded", function() {
    const changeImageBtn = document.getElementById('changeImageBtn');
    const backgroundImage = document.getElementById('backgroundImage');
    const images = ['images/bg.png', 'images/bg2.jpg', 'images/bg3.jpg', 'images/bg4.jpg']; // List of images
    let currentIndex = 0;

    changeImageBtn.addEventListener('click', function() {
        // Increase the index, wrap around if needed
        currentIndex = (currentIndex + 1) % images.length;

        // Start the fade out
        backgroundImage.style.opacity = 0;

        // Wait for the fade out to complete, then change the image and fade in
        setTimeout(() => {
            backgroundImage.src = images[currentIndex];
            backgroundImage.style.opacity = 1;
        }, 1000); // Match the timeout with the CSS transition duration
    });
});*/
// js/scripts.js

document.addEventListener("DOMContentLoaded", function() {
    const prevImageBtn = document.getElementById('prevImageBtn');
    const nextImageBtn = document.getElementById('nextImageBtn');
    const backgroundImage = document.getElementById('backgroundImage');
    const images = ["images/bg.jpg", "images/bg2.jpg", "images/bg3.jpg", "images/bg4.jpg"]; // List of images
    let currentIndex = 0;
    let autoTransitionInterval;

    function updateImage(index) {

        backgroundImage.style.opacity = 50;

        setTimeout(() => {
            backgroundImage.src = images[index];
            backgroundImage.style.opacity = 1;
        }, 100);
    }

    function showNextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage(currentIndex);
    }

    function showPrevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage(currentIndex);
    }

    prevImageBtn.addEventListener('click', showPrevImage);
    nextImageBtn.addEventListener('click', showNextImage);

    function startAutoTransition() {
        autoTransitionInterval = setInterval(showNextImage, 5000);
    }

    function stopAutoTransition() {
        clearInterval(autoTransitionInterval);
    }

    startAutoTransition();

    prevImageBtn.addEventListener('click', stopAutoTransition);
    nextImageBtn.addEventListener('click', stopAutoTransition);

    backgroundImage.addEventListener('transitionend', startAutoTransition);
});
