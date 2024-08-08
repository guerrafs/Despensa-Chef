<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paginas.css">
    <title>Incluir Ingrediente</title>
</head>

<body>
    <section>
        <h1>Incluir Ingrediente</h1>
        <form action="../forms/processaForms.php" method="post">
            <p>Selecione o ingrediente:</p>
            <?php
            include_once '../DAO/despensaDAO.php';
            $ingredientes = obterIngredientesNaoPossuidos(1);
            if (empty($ingredientes)) {
                echo "<script>alert('Usuário já possui todos os ingredientes do sistema.'); 
                      window.location.href = 'paginaUSER.php';</script>";
            } else {
                foreach ($ingredientes as $ingrediente) {
                    echo '<input type="radio" name="ingredientes[]" value="' . $ingrediente['IDingrediente'] . '">' . $ingrediente['Nome'] . '<br>';
                }
            }
            ?>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" required><br>

            <label for="unidadeMedida">Unidade de Medida:</label>
            <input type="text" name="unidadeMedida" required><br>

            <button name="botao" value="inserirIng">Inserir Ingrediente</button>
        </form>
    </section>
</body>
</html>