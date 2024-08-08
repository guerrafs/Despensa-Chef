<?php
session_start();
if (!isset($_SESSION["perfil"])) {
    header("Location: ../index.php");
    exit();
}
function fazerLogout()
{
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta>
    <title>Menu Principal</title>
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <section>
        <?php
        $cores = array('blueviolet', 'green', 'yellow');

        if (isset($_COOKIE['cor_pagina'])) {
            $tempo = $_COOKIE['tempo'];
            if ((time() - $tempo) > 90) {
                switch ($_COOKIE['cor_pagina']) {
                    case 'blueviolet':
                        $cor_pagina = 'yellow';
                        break;
                    case 'yellow':
                        $cor_pagina = 'green';
                        break;
                    case 'green':
                        $cor_pagina = 'blueviolet';
                        break;
                }
            } else {
                $cor_pagina = $_COOKIE['cor_pagina'];
            }
        } else {
            $cor_pagina = $cores[array_rand($cores)];
        }
        setcookie('cor_pagina', $cor_pagina);
        setcookie('tempo', time());
        echo "<style>body{background-color: $cor_pagina;}</style>";
        ?>
        <h1>Menu Principal</h1>
        <h3><a style="text-decoration: none;" href="inserir.php">Inserir Receita</a> </h3>
        <h3><a style="text-decoration: none;" href="consultar.php">Consultar Receita</a> </h3>
        <h3><a style="text-decoration: none;" href="despensa.php">Visualizar Despensa</a> </h3>
        <h3><a style="text-decoration: none;" href="inserirIngrediente.php">Inserir Ingrediente</a> </h3>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="submit" name="logout" value="Logout">
        </form>
    </section>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    fazerLogout();
}
?>