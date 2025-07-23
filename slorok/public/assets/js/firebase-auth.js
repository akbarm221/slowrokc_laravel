// Import fungsi yang diperlukan dari Firebase SDK
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import {
    getAuth,
    signInWithEmailAndPassword,
} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";

// !!! PENTING: Pastikan konfigurasi ini sudah benar-benar sesuai dengan proyek Anda di Firebase Console
const firebaseConfig = {
    apiKey: "AIzaSyBqazsCMdvvkRFoxVedYRUKXoqHBOe-Gw8",
    authDomain: "slorok-92e67.firebaseapp.com",
    projectId: "slorok-92e67",
    storageBucket: "slorok-92e67.firebasestorage.app",
    messagingSenderId: "638662002855",
    appId: "1:638662002855:web:72711a442c60d2c5897382",
};

// Inisialisasi Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

const loginForm = document.getElementById("login-form");
const errorMessage = document.getElementById("error-message");

loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    console.log("--- Memulai Proses Login ---");

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    errorMessage.textContent = "";

    try {
        console.log(`Mencoba login ke Firebase dengan email: ${email}`);

        // 1. Login ke Firebase
        const userCredential = await signInWithEmailAndPassword(
            auth,
            email,
            password
        );
        const user = userCredential.user;
        console.log("✅ Firebase Login Berhasil!", user);

        // 2. Dapatkan ID Token
        console.log("Mengambil ID Token...");
        const idToken = await user.getIdToken();
        console.log("✅ ID Token berhasil didapatkan.");

        // 3. Kirim Token ke Laravel untuk verifikasi
        console.log("Mengirim token ke server Laravel untuk verifikasi...");
        const response = await fetch("/firebase/verify-token", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({ idToken: idToken }),
        });

        if (!response.ok) {
            console.error("Respon dari server tidak OK.", response);
            throw new Error(
                "Verifikasi di server gagal. Status: " + response.status
            );
        }

        const result = await response.json();
        console.log("✅ Verifikasi di server berhasil!", result);

        // 4. Jika sukses, arahkan ke dashboard
        if (result.status === "success") {
            console.log("Mengarahkan ke dashboard...");
            window.location.href = "/admin/dashboard";
        }
    } catch (error) {
        console.error("❌ Login Gagal:", error);

        // Menampilkan pesan error yang lebih spesifik
        if (error.code) {
            switch (error.code) {
                case "auth/invalid-credential":
                case "auth/user-not-found":
                case "auth/wrong-password":
                    errorMessage.textContent =
                        "Email atau password yang Anda masukkan salah.";
                    break;
                default:
                    errorMessage.textContent = "Terjadi kesalahan saat login.";
            }
        } else {
            errorMessage.textContent = error.message;
        }
    }
});
