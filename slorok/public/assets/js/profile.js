document.addEventListener("DOMContentLoaded", () => {
    // Sembunyikan loading screen
    const loadingElement = document.getElementById("loading");
    if (loadingElement) {
        setTimeout(() => {
            loadingElement.style.opacity = "0";
            setTimeout(() => {
                loadingElement.style.display = "none";
            }, 500);
        }, 200);
    }

    // Fungsi untuk membuka modal
    window.openModal = (modalId) => {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        }
    };

    // Fungsi untuk menutup modal
    window.closeModal = (modalId) => {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }
    };

    // Fungsi umum untuk inisialisasi slider
    const initSlider = (
        sliderId,
        dotsContainerId,
        autoSlideInterval = 5000
    ) => {
        const slider = document.getElementById(sliderId);
        const dotsContainer = document.getElementById(dotsContainerId);

        if (!slider) return;

        const slides = slider.children;
        const totalSlides = slides.length;
        if (totalSlides <= 1) return; // Jangan jalankan slider jika hanya ada 1 atau 0 slide

        let currentIndex = 0;
        let intervalId = null;

        const goToSlide = (index) => {
            currentIndex = index;
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;

            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll(".authority-dot");
                dots.forEach((dot, i) => {
                    dot.classList.toggle("bg-primary-600", i === currentIndex);
                    dot.classList.toggle(
                        "dark:bg-primary-400",
                        i === currentIndex
                    );
                    dot.classList.toggle("bg-gray-300", i !== currentIndex);
                    dot.classList.toggle(
                        "dark:bg-gray-600",
                        i !== currentIndex
                    );
                });
            }
        };

        const nextSlide = () => {
            const newIndex = (currentIndex + 1) % totalSlides;
            goToSlide(newIndex);
        };

        const startAutoSlide = () => {
            stopAutoSlide(); // Hentikan dulu interval sebelumnya
            if (autoSlideInterval > 0) {
                intervalId = setInterval(nextSlide, autoSlideInterval);
            }
        };

        const stopAutoSlide = () => {
            clearInterval(intervalId);
        };

        // Event listener untuk dots (jika ada)
        if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll(".authority-dot");
            dots.forEach((dot) => {
                dot.addEventListener("click", () => {
                    goToSlide(parseInt(dot.dataset.slideTo));
                    // Reset timer setelah klik manual
                    startAutoSlide();
                });
            });
        }

        // Jeda auto-slide saat mouse hover
        const wrapper = slider.parentElement;
        wrapper.addEventListener("mouseenter", stopAutoSlide);
        wrapper.addEventListener("mouseleave", startAutoSlide);

        // Mulai slider
        startAutoSlide();
    };

    // Inisialisasi Slider Sejarah Kepala Desa
    initSlider("authoritySlider", "authority-dots", 5000); // 5 detik interval

    // Inisialisasi Slider Galeri Desa
    initSlider("gallerySlider", null, 3000); // 3 detik interval, tidak pakai dots
});
