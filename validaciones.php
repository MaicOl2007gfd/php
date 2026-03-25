<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nombre = trim($_POST['Nombre'] ?? '');
$email = trim($_POST['Email'] ?? '');
$contraseña = $_POST['Contraseña1'] ?? '';
$contraseña2 = $_POST['Contraseña2'] ?? '';

$errors = [];

// VALIDACIONES
if ($nombre === '') {
    $errors['Nombre'] = 'El nombre es obligatorio.';
} elseif (mb_strlen($nombre) < 3) {
    $errors['Nombre'] = 'El nombre debe tener al menos 3 caracteres.';
}

if ($email === '') {
    $errors['Email'] = 'El email es obligatorio.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['Email'] = 'El email no es válido.';
}

if ($contraseña === '') {
    $errors['Contraseña1'] = 'La contraseña es obligatoria.';
} elseif (strlen($contraseña) < 8) {
    $errors['Contraseña1'] = 'La contraseña debe tener al menos 8 caracteres.';
}

if ($contraseña2 === '') {
    $errors['Contraseña2'] = 'La confirmación de contraseña es obligatoria.';
} elseif ($contraseña !== $contraseña2) {
    $errors['Contraseña2'] = 'Las contraseñas no coinciden.';
}

//  GUARDAR SOLO SI NO HAY ERRORES
if (!empty($errors)) {
    print_r($errors);
    exit;
}


// INSERT
$sql = "INSERT INTO registro (Nombre, Email, Contraseña1) 
        VALUES ('$nombre', '$email', '$passwordHash')";

if (mysqli_query($conexion, $sql)) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error: " . mysqli_error($conexion);
}
?>
