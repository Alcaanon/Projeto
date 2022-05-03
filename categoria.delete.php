<?php 
    require_once('config/config.php');

    $service = new CategoriaService();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if($service->deletar($id))
    {
        header('location: ./categorias?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao cadastrar';
        header('location: ./categorias?error=true');
        exit;
    }