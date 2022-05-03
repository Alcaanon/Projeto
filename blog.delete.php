<?php 
    require_once('config/config.php');

    $service = new BlogService();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if($service->deletar($id))
    {
        header('location: ./blogs?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao cadastrar';
        header('location: ./blogs?error=true');
        exit;
    }