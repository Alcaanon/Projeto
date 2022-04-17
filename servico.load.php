<?php
    require_once('config/config.php');
    
    session_start();
    $categoriaService = new CategoriaService();
    $ServicoService = new ServicoService();

    if(isset($_GET['load-categoria'])) {
        $_SESSION['categorias'] = serialize($categoriaService->listar());

        header('location: servico');
        exit;
    }

    if(isset($_GET['load-servico'])) {
        $_SESSION['servico'] = $ServicoService->listar(3);
        header('location: home');
        exit;
    }