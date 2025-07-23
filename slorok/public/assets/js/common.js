// Common JavaScript for all pages

// Initialize theme immediately to prevent flash
;(() => {
  const savedTheme = localStorage.getItem("theme") || "light";
  if (savedTheme === "dark") {
    document.documentElement.classList.add("dark");
  }
})();

document.addEventListener("DOMContentLoaded", () => {
  // Panggil semua fungsi inisialisasi di sini
  hideLoading(); // <-- TAMBAHAN KODE PENTING
  initializeDarkMode();
  initializeMobileMenu();
});

// --- FUNGSI BARU UNTUK SEMUA HALAMAN ---
function hideLoading() {
    const loadingElement = document.getElementById("loading");
    if (loadingElement) {
        setTimeout(() => {
            loadingElement.style.opacity = '0';
            setTimeout(() => {
                loadingElement.style.display = "none";
            }, 500);
        }, 200);
    }
}

// Dark Mode Functions
function initializeDarkMode() {
  const darkModeToggle = document.getElementById("darkModeToggle");
  if (!darkModeToggle) return;

  const savedTheme = localStorage.getItem("theme") || "light";
  setTheme(savedTheme);

  darkModeToggle.addEventListener("click", () => {
    const currentTheme = document.documentElement.classList.contains("dark") ? "dark" : "light";
    const newTheme = currentTheme === "dark" ? "light" : "dark";
    setTheme(newTheme);
  });
}

function setTheme(theme) {
  if (theme === "dark") {
    document.documentElement.classList.add("dark");
  } else {
    document.documentElement.classList.remove("dark");
  }
  localStorage.setItem("theme", theme);

  const darkModeToggle = document.getElementById("darkModeToggle");
  if (darkModeToggle) {
    const icon = darkModeToggle.querySelector("i");
    if (icon) {
      icon.className = theme === "dark" ? "fas fa-sun" : "fas fa-moon";
    }
  }

  window.dispatchEvent(new CustomEvent("themeChanged", { detail: { theme } }));
}

// Mobile Menu Functions
function initializeMobileMenu() {
  const mobileMenuToggle = document.getElementById("mobileMenuToggle");
  const mobileMenu = document.getElementById("mobileMenu");

  if (!mobileMenuToggle || !mobileMenu) return;

  mobileMenuToggle.addEventListener("click", function () {
    mobileMenu.classList.toggle("hidden");
    const spans = this.querySelectorAll("span");
    if (mobileMenu.classList.contains("hidden")) {
      spans[0].style.transform = "none";
      spans[1].style.opacity = "1";
      spans[2].style.transform = "none";
    } else {
      spans[0].style.transform = "rotate(-45deg) translate(-5px, 6px)";
      spans[1].style.opacity = "0";
      spans[2].style.transform = "rotate(45deg) translate(-5px, -6px)";
    }
  });

  document.addEventListener("click", (e) => {
    if (!mobileMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
      mobileMenu.classList.add("hidden");
      const spans = mobileMenuToggle.querySelectorAll("span");
      spans[0].style.transform = "none";
      spans[1].style.opacity = "1";
      spans[2].style.transform = "none";
    }
  });
}