<?php
session_start();
include("conexion.php");

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php if ($success): ?>
        <div class="message-success"><strong><?php echo htmlspecialchars($success, ENT_QUOTES, ); ?></strong></div>
    <?php endif; ?>

    <form action="validaciones.php" method="post" novalidate>
    <h1> Registrar Usuario</h1>

    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" placeholder="Ingrese Nombre de usuario" value="<?php echo htmlspecialchars($old['Nombre'] ?? '', ENT_QUOTES); ?>">
    <div class="message-error"><?php echo $errors['Nombre'] ?? ''; ?></div>

    <label for="Email">Email</label>
    <input type="email" name="Email" placeholder="Ingrese Email de usuario" value="<?php echo htmlspecialchars($old['Email'] ?? '', ENT_QUOTES); ?>">
    <div class="message-error"><?php echo $errors['Email'] ?? ''; ?></div>

    <label for="Contraseña1">Contraseña</label>
    <input type="password" name="Contraseña1" placeholder="Ingrese su Contraseña">
    <div class="message-error"><?php echo $errors['Contraseña1'] ?? ''; ?></div>

    <label for="Contraseña2">Confirmar Contraseña</label>
    <input type="password" name="Contraseña2" placeholder="Confirma su Contraseña">
    <div class="message-error"><?php echo $errors['Contraseña2'] ?? ''; ?></div>

    <button type="submit">Enviar</button>
    </form>

</body>
</html