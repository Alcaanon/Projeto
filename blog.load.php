<?php
    require_once('config/config.php');
    
    session_start();
    $categoriaService = new CategoriaService();
    $BlogService = new BlogService();

    if(isset($_GET['load-categoria'])) {
        $_SESSION['categorias'] = serialize($categoriaService->listar());
        header('Location: home');
        exit;
    }

    if(isset($_GET['load-blog'])) {
        $_SESSION['blogs'] = $BlogService->listar(10);
        header('Location: index');
        exit;
    }