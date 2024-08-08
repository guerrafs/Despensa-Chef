<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Despensa</title>
    <style>
        .caixa {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tabela {
            width: 80%;
            height: 300px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 40px;
        }

        td {
            border: 1px solid black;
        }

        .botao-form {
            display: inline-block;
        }

        .btn-sucesso {
            background-color: #2ea749;
            border-color: #2ea749;
        }

        .btn-excluir {
            background-color: #da3348;
            border-color: #da3348;
        }

        .form1 {
            margin-top: 40px;
            width: 80%;
        }
    </style>
</head>

<body>
    <div class="caixa">
        <div class="tabela" style="height: 700px; overflow: auto;">
            <table class="table table-striped">
                <h1>Tabela de Ingredientes do Usuário</h1>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Ingrediente</td>
                        <td>Quantidade</td>
                        <td>Unidade de Medida</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once '../DAO/despensaDAO.php';
                    $ingredientes = listarIngredientesUsuario(1);
                    foreach ($ingredientes as $ingrediente) {
                        echo '<tr>';
                        echo '<td>' . $ingrediente['IDingrediente'] . '</td>';
                        echo '<td>' . $ingrediente['Nome'] . '</td>';
                        echo '<td>' . $ingrediente['Qtd'] . '</td>';
                        echo '<td>' . $ingrediente['UniMedida'] . '</td>';
                        echo '<td>
                        <form action="#" method="post" class="botao-form">
                            <button class="btn btn-success btn-sucesso" name="botao1" value="' . $ingrediente['IDingrediente'] . '">Atualizar</button>
                        </form>
                        <form action="../forms/processaForms.php" method="post" class="botao-form">
                            <button class="btn btn-danger btn-excluir" name="botao2" value="' . $ingrediente['IDingrediente'] . '">Excluir</button>
                        </form>
                            </td>';
                        echo '</tr>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form1">
            <?php
            if (isset($_POST['botao1'])) {

                echo '
                    <form action="../forms/processaForms.php" method="post">
                    <br>
                    <input type="number" name="qtd" placeholder="Quantidade">
                    <br>
                    <input type="text" name="uniMed" placeholder="Unidade de Medida">
                    <br>
                    <input type="hidden" name="id" value="' . $_POST['botao1'] . '">
                    <button class="btn btn-success btn-sucesso" type="submit" name="botao" value="Atualizar">Atualizar</button>
                    </form>
                    ';
            }
            ?>
        </div>
    </div>
</body>

</html>