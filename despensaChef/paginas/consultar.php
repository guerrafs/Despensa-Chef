<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/paginas.css">
    <title>Consultar</title>
</head>

<body>
    <section>
        <h1>Digite o título da receita que deseja consultar:</h1>
        <form action="../forms/processaForms.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <button name="botao" value="consultar">Consultar</button>
        </form>
    </section>
</body>


</html>