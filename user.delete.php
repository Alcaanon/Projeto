<?php 
    require_once('config/config.php');

    $service = new UsuarioService();

    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if($service->deletar($id))
    {
        header('location: ./usuarios?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao cadastrar';
        header('location: ./usuarios?error=true');
        exit;
    }