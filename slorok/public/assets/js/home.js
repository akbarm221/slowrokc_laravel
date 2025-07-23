// File: public/assets/js/home.js

document.addEventListener("DOMContentLoaded", () => {
    const loadingElement = document.getElementById("loading");
    if (loadingElement) {
        // Memberi sedikit jeda agar transisi CSS terlihat lebih halus
        setTimeout(() => {
            loadingElement.style.opacity = '0';
            setTimeout(() => {
                loadingElement.style.display = "none";
            }, 500); // Waktu 500ms ini harus cocok dengan durasi transisi di CSS Anda
        }, 200);
    }
});