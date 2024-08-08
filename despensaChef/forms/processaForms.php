<!DOCTYPE html>
<html lang="en">

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

        .form1 {
            margin-top: 40px;
            width: 80%;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once '../BO/despensaBO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['botao'])) {
            if ($_POST['botao'] === 'inserir') {
                $titulo = $_POST['titulo'];
                $descricao = $_POST['descricao'];
                $tempoPrep = $_POST['tempoPrep'];
                $modoPrep = $_POST['modoPrep'];
                $ingredientes = $_POST['ingredientes'];

                if (businessLaw($titulo, $descricao, $tempoPrep, $modoPrep, $ingredientes)) {
                    echo "<script>alert('Receita cadastrada com sucesso');</script>";
                    echo "<a href=\"../paginas/paginaUSER.php\">Voltar para o menu</a>";
                } else {
                    echo '<br>erro na inserção<br>';
                }
            } elseif ($_POST['botao'] === 'consultar') {
                $tituloPesquisa = $_POST['titulo'];
                $_SESSION['tituloPesquisa'] = $tituloPesquisa;
                header("Location: ../paginas/receitas.php");
                exit;
            } elseif ($_POST['botao'] === 'Atualizar') {
                $idIngrediente = $_POST['id'];
                $quantidade = $_POST['qtd'];
                $unidadeMedida = $_POST['uniMed'];
                if (!$quantidade || !$unidadeMedida) {
                    echo 'Erro na quantidade.<br>';
                    echo "<a href=\"../paginas/paginaUSER.php\">Voltar para o menu</a>";
                } else {
                    if (BOatualiza(1, $idIngrediente, $quantidade, $unidadeMedida)) {
                        echo '<br>Registro alterado com sucesso<br>';
                        echo "<a href=\"../paginas/paginaUSER.php\">Voltar para o menu</a>";
                    } else {
                        echo 'erro';
                    }
                }
            } elseif ($_POST['botao'] === 'inserirIng') {
                if (isset($_POST['ingredientes']) && is_array($_POST['ingredientes'])) {
                    $ingredientesSelecionados = $_POST['ingredientes'];
                    $quantidade = $_POST['quantidade'];
                    $unidadeMedida = $_POST['unidadeMedida'];

                    foreach ($ingredientesSelecionados as $idIngrediente) {
                        if (BOinsere($idIngrediente, $quantidade, $unidadeMedida)) {
                            echo '<br>';
                            echo "<a href=\"../paginas/paginaUSER.php\">Voltar para o menu</a>";
                        }
                    }
                } else {
                    echo "Nenhum ingrediente foi selecionado.";
                }
            }
        } elseif (isset($_POST['botao2'])) {
            include_once '../DAO/despensaDAO.php';

            if (excluir(1, $_POST['botao2'])) {
                echo '<br>excluido<br>';
                echo "<a href=\"../paginas/paginaUSER.php\">Voltar para o menu</a>";
            } else {
                echo 'Erro na exclusão.';
            }
        }
    }
    ?>
</body>

</html>