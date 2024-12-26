<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un article</title>
</head>
<body>
    <h1>Supprimer un article</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
    <form method="POST" action="/admin/items/delete/<?= $item['id'] ?>">
        <button type="submit">Oui</button>
        <a href="/admin/items">Non</a>
    </form>
</body>
</html>