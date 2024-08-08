<?php
include '../DAO/despensaDAO.php';

function businessLaw($titulo, $descricao, $tempoPrep, $modoPrep, $ingredientes)
{
    $titulo = strtolower($titulo);
    $descricao = strtolower($descricao);
    $modoPrep = strtolower($modoPrep);

    if (inserir($titulo, $descricao, $tempoPrep, $modoPrep, $ingredientes)) {
        return true;
    } else {
        return false;
    }
}

function BOconsulta($idusuario, $titulo)
{
    $titulo = strtolower($titulo);

    try {
        $resultados = consultar(1, $titulo);
        if ($resultados !== false) {
            if (!empty($resultados)) {
                return $resultados;
            } else {
                echo 'Nenhuma receita encontrada com base na busca.';
                return false;
            }
        } else {
            echo 'Erro na consulta.';
            return false;
        }
    } catch (PDOException $e) {
        echo "Erro ao consultar receitas: " . $e->getMessage();
        return false;
    }
}

function BOatualiza($idUsuario, $idIngrediente, $quantidade, $unidadeMedida)
{
    $unidade = strtolower($unidadeMedida);

    if (atualizar($idUsuario, $idIngrediente, $quantidade, $unidade)) {
        return true;
    } else {
        return false;
    }
}

function BOinsere($IDingrediente, $qtd, $uniMed)
{
    $unidade = strtolower($uniMed);

    if (inserirDespensa(1, $IDingrediente, $qtd, $unidade)) {
        return true;
    } else {
        return false;
    }
}
