<?php
    require_once('config/config.php');
    
    session_start();
    $categoriaService = new CategoriaService();
    $ServicoService = new ServicoService();

    if(isset($_GET['load-categoria'])) {
        $_SESSION['categorias'] = serialize($categoriaService->listar());
        header('Location: home');
        exit;
    }

    if(isset($_GET['load-servico'])) {
        $_SESSION['servicos'] = $ServicoService->listar(3);
        header('Location: index');
        exit;
    }