//Univ.js

//Selections de elements necessaires
const menuBurger = document.querySelector('.menu-burger');
const menuOptions = document.querySelector('.menu-options');

// Ajout d'un événement au clic sur le bouton "☰"
menuBurger.addEventListener('click',() => {
    // Basculer la classe "hidden" pour afficher ou cacher les options du menu
    menuOptions.classList.toggle('hidden');
});
