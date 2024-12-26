<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajouter un produit au panier
if (isset($_POST['add_to_cart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = (int)$_POST['quantity'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
}

// Supprimer un produit du panier
if (isset($_POST['remove_from_cart']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    unset($_SESSION['cart'][$id]);
}

// Mettre à jour le panier
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$id]['quantity'] = (int)$quantity;
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
}

// Vider le panier
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="../../../public/css/styles.css" />
    <link rel="stylesheet" href="../../../public/css/panier.css" />
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">Clinique<span>Info</span></div>
            <ul class="nav-links">
                <li><a href="services.php">Services</a></li>
                <li><a href="panier.php">Panier</a></li>
            </ul>
        </nav>
    </header>

    <main class="cart-container">
        <h2>Votre Panier</h2>
        <form method="post">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Prix Unitaire</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    if (!empty($_SESSION['cart'])):
                        foreach ($_SESSION['cart'] as $id => $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo number_format($item['price'], 2); ?> TND</td>
                            <td>
                                <input type="number" name="quantities[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="quantity-input">
                            </td>
                            <td><?php echo number_format($subtotal, 2); ?> TND</td>
                            <td>
                                <!-- Updated form for removing a product from the cart -->
                                <form method="post">
                                    <!-- Hidden input field to pass the product ID -->
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="remove_from_cart" class="remove-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; else: ?>
                        <tr>
                            <td colspan="5">Votre panier est vide.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <p><strong>Total : </strong><?php echo number_format($total, 2); ?> TND</p>
                <div class="cart-actions">
                    <button type="submit" name="update_cart" class="action-btn">Mettre à jour</button>
                    <button type="submit" name="clear_cart" class="action-btn clear-btn">Vider le panier</button>
                </div>
            </div>
        </form>
        <a href="services.php">
            <button class="back-btn">Retour aux services</button>
        </a>
    </main>

    <footer>
        <div class="footer-content">
            <p>CliniqueInfo © 2024 | Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>
