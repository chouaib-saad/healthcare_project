<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>
<body>
    <h1>Ajouter un article</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="/admin/items/add">
        <label for="name">Nom de l'article :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
