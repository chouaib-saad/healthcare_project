// Fonction pour ajouter un produit au panier avec confirmation
function addToCart(id, name, price) {
    fetch('carte.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `add_to_cart=1&id=${encodeURIComponent(id)}&name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}&quantity=1`
    })
    .then(response => {
        if (response.ok) {
            alert('Produit ajouté au panier avec succès!');
        } else {
            alert('Erreur lors de l\'ajout au panier.');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
}


// Fonction pour obtenir la valeur d'un cookie
function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Fonction pour définir un cookie
function setCookie(name, value, days) {
    let d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

// Fonction pour obtenir la valeur d'un cookie par son nom
function getCookie(name) {
    let cookieArr = document.cookie.split(';');
    for (let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split('=');
        if (name === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

// Fonction pour définir un cookie
function setCookie(name, value, days) {
    let expires = '';
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + encodeURIComponent(value) + expires + '; path=/';
}

// Fonction pour afficher les produits du panier et calculer le total
function updateCart() {
    let cart = JSON.parse(getCookie('cart') || '[]');
    let cartItemsContainer = document.getElementById('cart-items');
    let totalPrice = 0;

    if (!cartItemsContainer) {
        console.warn('L\'élément avec l\'ID "cart-items" est introuvable.');
        return;
    }

    cartItemsContainer.innerHTML = '';

    cart.forEach(product => {
        let row = document.createElement('tr');
        row.innerHTML = `
            <td>${product.name}</td>
            <td>${product.price} TND</td>
            <td>${product.quantity}</td>
            <td>${product.price * product.quantity} TND</td>
            <td><button onclick="removeFromCart(${product.id})">Supprimer</button></td>
        `;
        cartItemsContainer.appendChild(row);
        totalPrice += product.price * product.quantity;
    });

    // Mettre à jour le total
    let totalPriceElement = document.getElementById('total-price');
    if (totalPriceElement) {
        totalPriceElement.textContent = totalPrice + ' TND';
    }
}


// Fonction pour supprimer un produit du panier
function removeFromCart(id) {
    let cart = JSON.parse(getCookie('cart') || '[]');
    cart = cart.filter(item => item.id !== id); // Supprimer le produit
    setCookie('cart', JSON.stringify(cart), 7); // Mettre à jour le cookie
    updateCart(); // Recalculer et afficher le panier mis à jour
}

// Mettre à jour le panier dès que la page est chargée
updateCart();