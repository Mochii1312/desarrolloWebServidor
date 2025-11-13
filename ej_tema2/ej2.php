<?php
//Ej2 Validar email

// Funciones de validación
function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarNombre($nombre)
{
    return strlen($nombre) >= 2 && preg_match('/^[a-zA-Z\s]+$/', $nombre);
}

function validarTelefono($telefono)
{
    return preg_match('/^[0-9]{9}$/', $telefono);
}

function validarClave($clave)
{
    // Al menos 8 caracteres, una mayúscula, una minúscula y un número
    return strlen($clave) >= 8 &&
        preg_match('/[A-Z]/', $clave) &&
        preg_match('/[a-z]/', $clave) &&
        preg_match('/[0-9]/', $clave);
}

// Ejemplo de uso
$nombre = "Juan Perez";
$email = "juan@gmail.com";
$telefono = "987654321";
$clave = "(/)(())";

if (validarNombre($nombre) && validarEmail($email) && validarTelefono($telefono) && validarClave($clave)) {
    echo "Todos los campos son válidos.";
} else {
    echo "Hay errores en el formulario:\n";

    if (!validarNombre($nombre)) echo "- El nombre es inválido.\n";
    if (!validarEmail($email)) echo "- El email no es correcto.\n";
    if (!validarTelefono($telefono)) echo "- El teléfono no es válido.\n";
    if (!validarClave($clave)) echo "- La contraseña no cumple los requisitos.\n";
}

