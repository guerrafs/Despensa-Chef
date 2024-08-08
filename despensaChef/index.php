<?php
session_start();

function fazerLogin($usuario, $senha)
{
    if ($usuario == "admin" && $senha == "s_admin") {
        $_SESSION["perfil"] = "admin";
        header("Location: paginas/paginaADM.php");
        exit();
    } elseif ($usuario == "user" && $senha == "s_user") {
        $_SESSION["perfil"] = "user";
        header("Location: paginas/paginaUSER.php");
        exit();
    } else {
        echo "Usuário ou senha inválidos.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    fazerLogin($usuario, $senha);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Autenticação no sistema</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <section>
        <h1>Autenticação no sistema</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required><br><br>

            <input type="submit" value="Entrar">
        </form>
    </section>
</body>

</html>