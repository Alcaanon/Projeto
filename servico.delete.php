<?php 
    require_once('config/config.php');

    $service = new ServicoService();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if($service->deletar($id))
    {
        header('location: ./servicos?success=true');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao cadastrar';
        header('location: ./servicos?error=true');
        exit;
    }