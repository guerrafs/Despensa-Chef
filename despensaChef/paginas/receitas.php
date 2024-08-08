<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Receitas</title>
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

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
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
                <h1>Tabela de Receitas</h1>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Ingredientes</th>
                        <th>Tempo de Preparo(minutos)</th>
                        <th>Modo de Preparo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    include_once '../BO/despensaBO.php';
                    $resultados = BOconsulta(1, $_SESSION['tituloPesquisa']);
                    if ($resultados !== false) {
                        if (!empty($resultados)) {
                            foreach ($resultados as $receita) {
                                echo '<tr>';
                                echo '<td>' . $receita['titulo'] . '</td>';
                                echo '<td>' . $receita['descricao'] . '</td>';
                                echo '<td>' . $receita['tempoPrep'] . '</td>';
                                echo '<td>' . $receita['modoPrep'] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Nenhuma receita encontrada com base na busca.</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">Receita inexistente.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>