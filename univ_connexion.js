// --- Validation pour la page de connexion ---
const loginForm = document.getElementById("loginForm");
const loginBtn = document.getElementById("loginBtn");

// Activer ou désactiver le bouton de connexion
loginForm.addEventListener("input", () => {
    const isFormValid = loginForm.checkValidity();
    loginBtn.disabled = !isFormValid; // Active/Désactive le bouton
});

// Gérer la soumission du formulaire
loginForm.addEventListener("submit", async (event) => {
    event.preventDefault(); // Empêche le rechargement de la page

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    try {
        const response = await fetch("C:\xampp\htdocs\MON PROJET\connexion_process.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ username, password }),
        });

        const result = await response.text(); // Lire la réponse du serveur

        if (result.trim() === "success") {
            // Connexion réussie
            window.location.href = "user_space.php";
        } else {
            // Afficher l'erreur retournée
            alert(result.trim());
        }
    } catch (error) {
        alert("Erreur réseau : " + error.message);
    }
});
