<?php
//Função para inserir uma nova receita no sistema
function inserir($titulo, $descricao, $tempoPrep, $modoPrep, $ingredientes)
{
    include_once '../util/conectarBD.php';

    try {
        $cad = $conn->prepare("INSERT INTO receitas (titulo, descricao, tempoPrep, modoPrep) VALUES (?, ?, ?, ?)");
        $cad->bindParam(1, $titulo);
        $cad->bindParam(2, $descricao);
        $cad->bindParam(3, $tempoPrep);
        $cad->bindParam(4, $modoPrep);
        $cad->execute();

        $idReceita = $conn->lastInsertId();

        foreach ($ingredientes as $idIngrediente) {
            $cad = $conn->prepare("INSERT INTO receita_ingrediente (IDreceita, IDingrediente) VALUES (?, ?)");
            $cad->bindParam(1, $idReceita);
            $cad->bindParam(2, $idIngrediente);
            $cad->execute();
        }
        echo "Receita cadastrada com sucesso!";
        return true;
    } catch (Exception $e) {
        echo "Erro agendaDAO: " . $e->getMessage();
        return false;
    }
}
//Função para consultar receita com base na busca e despensa
function consultar($usuarioId, $busca)

{
    include_once '../util/conectarBD.php';
    try {
        $consulta = $conn->prepare("SELECT r.titulo, r.descricao, r.tempoPrep, r.modoPrep,COUNT(*) AS totalIngredientes
                                   FROM receitas r
                                   JOIN receita_ingrediente ri ON r.IDreceita = ri.IDreceita
                                   JOIN ingredientes i ON ri.IDingrediente = i.IDingrediente
                                   JOIN despensa d ON i.IDingrediente = d.IDingrediente
                                   WHERE (r.titulo LIKE :busca OR r.descricao LIKE :busca)
                                   AND d.IDusuario = :usuarioId
                                   GROUP BY r.IDreceita
                                   ORDER BY totalIngredientes DESC");

        $buscaParam = "%{$busca}%";
        $consulta->bindParam(':busca', $buscaParam);
        $consulta->bindParam(':usuarioId', $usuarioId);
        $consulta->execute();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    } catch (PDOException $e) {
        echo "Erro ao consultar receitas: " . $e->getMessage();
        return false;
    }
}
//Função para atualizar a quantidade do ingrediente na despensa do usuário
function atualizar($idUsuario, $idIngrediente, $quantidade, $unidadeMedida)
{
    include_once '../util/conectarBD.php';

    try {
        $altera = $conn->prepare("UPDATE despensa SET Qtd = ?, UniMedida = ? WHERE IDusuario = ? AND IDingrediente = ?");
        $altera->bindParam(1, $quantidade);
        $altera->bindParam(2, $unidadeMedida);
        $altera->bindParam(3, $idUsuario);
        $altera->bindParam(4, $idIngrediente);
        $altera->execute();

        echo 'O número de registros alterados foi: ' . $altera->rowCount();
        echo "<script>alert('Registro ID " . $idIngrediente . " do usuário ID " . $idUsuario . " alterado com sucesso');</script>";

        return true;
    } catch (Exception $e) {
        echo "Erro despensaDAO: " . $e;
        return false;
    }
}

//Função para excluir um ingrediente da despensa de um usuário
function excluir($idUsuario, $idIngrediente)
{
    include_once '../util/conectarBD.php';

    try {
        $exclui = $conn->prepare("DELETE FROM despensa WHERE IDusuario = ? AND IDingrediente = ?");
        $exclui->bindParam(1, $idUsuario);
        $exclui->bindParam(2, $idIngrediente);
        $exclui->execute();

        echo 'O número de registros excluídos foi: ' . $exclui->rowCount();
        echo "<script>alert('Ingrediente ID: $idIngrediente removido com sucesso da despensa do usuário ID: $idUsuario');</script>";

        return true;
    } catch (Exception $e) {
        echo "Erro ao excluir ingrediente da despensa: " . $e;
        return false;
    }
}

//Função para listar ingredientes que o usuário possui
function listarIngredientesUsuario($IDusuario)
{

    include_once '../util/conectarBD.php';


    $query = "SELECT d.IDingrediente, ingredientes.Nome, d.Qtd, d.UniMedida
              FROM despensa d
              INNER JOIN ingredientes ON d.IDingrediente = ingredientes.IDingrediente
              WHERE d.IDusuario = :IDusuario";

    $cad = $conn->prepare($query);
    $cad->bindParam(':IDusuario', $IDusuario);
    $cad->execute();

    $ingredientes = $cad->fetchAll(PDO::FETCH_ASSOC);

    return $ingredientes;
}
//Função para listar todos os ingredientes do sistema
function obterIngredientes()
{
    include_once '../util/conectarBD.php';

    try {
        $query = "SELECT * FROM ingredientes";
        $ing = $conn->prepare($query);
        $ing->execute();
        $ingredientes = $ing->fetchAll(PDO::FETCH_ASSOC);

        return $ingredientes;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return array();
    }
}
//função para retornar ingredientes que o usuário não possui na despensa para ele poder adicionar
function obterIngredientesNaoPossuidos($IDusuario)
{
    include_once '../util/conectarBD.php';

    try {
        $query = "SELECT * FROM ingredientes WHERE IDingrediente NOT IN (SELECT IDingrediente FROM despensa WHERE IDusuario = ?)";
        $ing = $conn->prepare($query);
        $ing->bindParam(1, $IDusuario);
        $ing->execute();
        $ingredientes = $ing->fetchAll(PDO::FETCH_ASSOC);

        return $ingredientes;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return array();
    }
}
//inserir ingredientes na despensa do usuário
function inserirDespensa($IDusuario, $IDingrediente, $Qtd, $UniMedida)
{
    include_once '../util/conectarBD.php';

    try {
        $sql = "INSERT INTO despensa (IDusuario, IDingrediente, Qtd, UniMedida)
                VALUES (?, ?, ?, ?)";
        $cad = $conn->prepare($sql);
        $cad->bindParam(1, $IDusuario);
        $cad->bindParam(2, $IDingrediente);
        $cad->bindParam(3, $Qtd);
        $cad->bindParam(4, $UniMedida);
        $cad->execute();

        echo "Ingrediente inserido na despensa com sucesso!";
        return true;
    } catch (PDOException $e) {
        echo "Erro ao inserir ingrediente na despensa: " . $e->getMessage();
        return false;
    }
}
