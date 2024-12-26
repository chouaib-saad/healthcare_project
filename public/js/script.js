function register(event) {
    event.preventDefault();

    const username = document.getElementById("newUsername").value;
    const email = document.getElementById("newEmail").value;
    const password = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas.");
        return;
    }

    // Save user info to localStorage
    const user = { username, email, password };
    localStorage.setItem("user_" + username, JSON.stringify(user));
    alert("Inscription réussie!");
    window.location.href = '/app/views/users/login.php';
}

function login(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const storedUser = localStorage.getItem("user_" + username);

    if (storedUser) {
        const user = JSON.parse(storedUser);

        if (user.password === password) {
            localStorage.setItem('userLoggedIn', 'true');
            alert("Connexion réussie !");
            window.location.href = '/public/index.php';
        } else {
            alert("Mot de passe incorrect");
        }
    } else {
        alert("Nom d'utilisateur incorrect");
    }
}

function showNotification(message) {
    const notificationMessage = document.getElementById("notificationMessage");
    notificationMessage.innerText = message;
    $('#notificationModal').modal('show');
}



function logout() {
    window.location.href = '../app/views/users/logout.php';
}





//converter code 
async function fetchExchangeRate(currency) {
    try {
        const response = await fetch(`https://api.exchangerate-api.com/v4/latest/TND`);
        const data = await response.json();
        return data.rates[currency] || 1;
    } catch (error) {
        console.error('Erreur API :', error);
        alert('Impossible de récupérer les taux de change. Vérifiez votre connexion Internet.');
        return 1;
    }
}


// Currency converter code
async function fetchExchangeRate(currency) {
    try {
        const response = await fetch(`https://api.exchangerate-api.com/v4/latest/TND`);
        const data = await response.json();
        return data.rates[currency] || 1;
    } catch (error) {
        console.error('Erreur API :', error);
        alert('Impossible de récupérer les taux de change. Vérifiez votre connexion Internet.');
        return 1;
    }
}

async function convertCurrency() {
    let amount;
    const serviceAmount = parseFloat(document.getElementById('service').value);
    const customAmount = parseFloat(document.getElementById('customAmount').value);
    const currency = document.getElementById('currency').value;

    if (!isNaN(customAmount) && customAmount > 0) {
        amount = customAmount;
    } else {
        amount = serviceAmount;
    }

    if (!amount || amount <= 0) {
        alert('Veuillez entrer un montant valide ou choisir un service.');
        return;
    }

    const rate = await fetchExchangeRate(currency);
    const convertedAmount = (amount * rate).toFixed(2);
    document.getElementById('result').textContent = `Montant en ${currency}: ${convertedAmount} ${currency}`;
}


