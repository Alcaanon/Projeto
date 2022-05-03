<?php 
    require_once('config/config.php');

    $service = new ServicoService();

    $id = filter_input(INPUT_POST, 'inputIdentificador', FILTER_SANITIZE_NUMBER_INT);
    $classe = filter_input(INPUT_POST, 'inputClasse', FILTER_SANITIZE_SPECIAL_CHARS);
    $titulo = filter_input(INPUT_POST, 'inputTitulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'inputDescricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoriaId = filter_input(INPUT_POST, 'inputCategoria', FILTER_SANITIZE_NUMBER_INT);
 
    $servico = new Servico();
    $servico->setId($id);
    $servico->setClasse($classe);
    $servico->setTitulo($titulo);
    $servico->setDescricao($descricao);
    $servico->setCategoriaId($categoriaId);

    if($service->atualizar($servico))
    {
        header('location: ./servicos?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao cadastrar';
        header('location: ./servicos?error=true');
        exit;
    }

