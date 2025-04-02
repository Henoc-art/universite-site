
// Validation du champ "Nom" pour MAJUSCULES uniquement
const nomInput = document.getElementById("nom");
nomInput.addEventListener("input", () => {
    if (nomInput.value !== nomInput.value.toUpperCase()) {
        nomInput.setCustomValidity("Veuillez utiliser uniquement des lettres MAJUSCULES.");
    } else {
        nomInput.setCustomValidity("");
    }
});

// Validation du champ "Contact" pour NUMÉRIQUE uniquement
const contactInput = document.getElementById("contact");
contactInput.addEventListener("input", () => {
    const isNumeric = /^\d+$/.test(contactInput.value); // Regex pour chiffres uniquement
    contactInput.setCustomValidity(isNumeric ? "" : "Veuillez entrer uniquement des numéros.");
});

// Validation du mot de passe
const passwordInput = document.getElementById("password");
passwordInput.addEventListener("input", () => {
    if (passwordInput.value.length < 8) {
        passwordInput.setCustomValidity("Votre mot de passe doit comporter au moins 8 caractères.");
    } else {
        passwordInput.setCustomValidity("");
    }
});

// Activation du bouton de soumission si tout est correct
const form = document.getElementById("registrationForm");
const submitBtn = document.getElementById("submitBtn");
form.addEventListener("input", () => {
    const isFormValid = form.checkValidity();
    submitBtn.disabled = !isFormValid; // Désactiver ou activer le bouton
    submitBtn.classList.toggle("disabled", !isFormValid); // Ajouter la classe "disabled"
});