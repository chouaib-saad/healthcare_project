

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.header__form form');
    const inputs = form.querySelectorAll('input');
    const submitButton = form.querySelector('.form__btn'); // Le bouton spécifique

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Empêcher le rechargement de la page

        let isValid = true;

        inputs.forEach(input => {
            if (input.value.trim() === '') {
                isValid = false;
                input.style.border = '2px solid red'; // Mettre en évidence les champs vides
            } else {
                input.style.border = ''; // Réinitialiser la bordure si valide
            }
        });

        if (isValid) {
            alert('Rendez-vous enregistré avec succès !');
            form.reset(); // Réinitialiser le formulaire après validation
        } else {
            alert('Veuillez remplir tous les champs du formulaire.');
        }
    });

    // Réinitialiser la bordure lorsque l'utilisateur saisit quelque chose
    inputs.forEach(input => {
        input.addEventListener('input', function () {
            if (input.value.trim() !== '') {
                input.style.border = '';
            }
        });
    });
});

