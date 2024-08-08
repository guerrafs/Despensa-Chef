<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paginas.css">
    <title>Incluir</title>
</head>

<body>
    <section>
        <h1>Cadastrar Nova Receita</h1>
        <form action="../forms/processaForms.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required><br>

            <label for="descricao">Ingredientes:</label>
            <textarea name="descricao" required></textarea><br>

            <label for="tempoPrep">Tempo de Preparo:</label>
            <input type="text" name="tempoPrep" required><br>

            <label for="modoPrep">Modo de Preparo:</label>
            <textarea name="modoPrep" required></textarea><br>

            <p>Selecione os ingredientes:</p>
            <?php
            include_once '../DAO/despensaDAO.php';
            $ingredientes = obterIngredientes();
            foreach ($ingredientes as $ingrediente) {
                echo '<input type="checkbox" name="ingredientes[]" value="' . $ingrediente['IDingrediente'] . '">' . $ingrediente['Nome'] . '<br>';
            }
            ?>
            <button name="botao" value="inserir">Inserir Receita</button>
        </form>
    </section>
</body>



</html>