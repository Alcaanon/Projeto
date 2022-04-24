<?php
    require_once('config/config.php');
    
    $CategoriaService = new CategoriaService();
    $ServicoService = new ServicoService();
    $BlogService = new BlogService();
    $UsuarioService = new UsuarioService();

    $pathUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $urlSegments = explode('/', substr($pathUri, 1));

    if($urlSegments[count($urlSegments) - 1] == 'load-categorias') {
        $_SESSION['categorias'] = serialize($CategoriaService->listar(10));
        header('Location: ./home');
        exit;
    }

    if($urlSegments[count($urlSegments) - 1] == 'load-servico') {
        $_SESSION['servicos'] = serialize($ServicoServices->listar(3));

        header('Location: ./index');
        exit;
    }

    if($urlSegments[count($urlSegments) - 1] == 'load-blog') {
        $_SESSION['blogs'] = serialize($BlogService->listar(10));
        header('Location: ./index');
        exit;
    }

    if($urlSegments[count($urlSegments) - 1] == 'load-usuarios') {
        $_SESSION['usuarios'] = serialize($UsuarioService->listar(10));

        header('location: ./usuarios');
        exit;
    }

    if($urlSegments[count($urlSegments) - 2] == 'load-categoria') {
        $id = $urlSegments[count($urlSegments) - 1];
        $_SESSION['categoria'] = serialize($CategoriaService->LocalizarPorId($id));

        header('location: ./categoria.details');
        exit;
    }

    if($urlSegments[count($urlSegments) - 2] == 'load-usuario') {
        $id = $urlSegments[count($urlSegments) - 1];
        $_SESSION['usuario'] = serialize($UsuarioService->LocalizarPorId($id));

        header('location: ./usuario.details');
        exit;
    }

    if($urlSegments[count($urlSegments) - 1] == 'load-index') {
        $_SESSION['servicos'] = serialize($ServicoService->listar(3));
        $_SESSION['blogs'] = serialize($BlogService->listar(10));
        $_SESSION['categorias'] = serialize($CategoriaService->listarComQuantidade(3));
        
        header('location: ./index');
        exit;
    }