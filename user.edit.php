<?php 
    require_once('config/config.php');

    $service = new UsuarioService();

    $id = filter_input(INPUT_POST, 'inputIdentificador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'inputNome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, 'inputSenha', FILTER_SANITIZE_SPECIAL_CHARS);
    $senhaRepetida = filter_input(INPUT_POST, 'inputSenhaRepetida', FILTER_SANITIZE_SPECIAL_CHARS);

    if($senha !== $senhaRepetida) {
        echo "senha não confere";
        exit;
    }

    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);

    if($service->atualizar($usuario))
    {
        header('location: ./usuarios?success=true');
        exit;
    } else {
        header('location: ./usuarios?error=true');
        exit;
    }

    
