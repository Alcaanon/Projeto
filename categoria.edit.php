<?php 
    require_once('config/config.php');

    $service = new CategoriaService();

    $id = filter_input(INPUT_POST, 'inputIdentificador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_SPECIAL_CHARS);

    $categoria = new Categoria();
    $categoria->setId($id);
    $categoria->setNome($nome);

    if($service->atualizar($categoria))
    {
        header('location: ./categorias?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao atualizar';
        header('location: ./categorias?error=true');
        exit;
    }