<?php
function login()
{
    require_once('bd.php');
    $sql = "SELECT id,usuario, nombre, email, password FROM usuarios WHERE usuario = :usuario";
    $consulta = $bd->prepare($sql);
    $consulta->execute(["usuario" => $_POST['usuario']]);
    $usuario = $consulta->fetch();

    if (!empty($usuario) and password_verify($_POST['password'], $usuario['password'])) {
        $_SESSION['idUsuario'] = $usuario['id'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['email'] = $usuario['email'];
        return true;
    } else {
        return $error = 'Usuario o clave incorrectos';
    }
}


function insertar()
{
    require_once('bd.php');
    $query = "SELECT COUNT(*) FROM usuarios WHERE usuario = :usuario";
    $stmt = $bd->prepare($query);
    $stmt->execute(["usuario" => $_POST['usuario']]);
    $numberRows = $stmt->fetchColumn();

    if ($numberRows == 0) {
        $sql = "INSERT INTO usuarios(usuario,nombre,apellidos, email, password) VALUES (:usuario,:nombre,:apellidos,:email,:password)";
        $consulta = $bd->prepare($sql);
        $consulta->execute(["usuario" => $_POST['usuario'], "nombre" => $_POST['nombre'], "apellidos" => $_POST['apellidos'], "email" => $_POST['email'], "password" => password_hash($_POST['contrasenya1'], PASSWORD_DEFAULT)]);
    } else { ?>
        <script>
            alert('El usuario ya existe.');
        </script>
<?php }
}
