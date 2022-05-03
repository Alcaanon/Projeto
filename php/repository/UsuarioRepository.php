<?php
class UsuarioRepository
{
    private $conn;

    public function __construct() {

        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }
    
    function fnAddUsuario(Usuario $usuario): bool
    {
        try {

            $query = "insert into usuario (nome, email, senha) values (:pnome, :pemail, :psenha) on conflict do nothing";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pnome", $usuario->getNome());
            $stmt->bindValue(":pemail", $usuario->getEmail());
            $stmt->bindValue(":psenha", md5($usuario->getSenha()));

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir o usuário no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    function fnUpdateUsuario($usuario): bool
    {
        try {

            $query = "UPDATE usuario set nome = :pnome, email = :pemail, senha = :psenha WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pid", $usuario->getId());
            $stmt->bindValue(":pnome", $usuario->getNome());
            $stmt->bindValue(":pemail", $usuario->getEmail());
            $stmt->bindValue(":psenha", md5($usuario->getSenha()));

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir o usuário no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
    
    function fnLoginUsuario(Usuario $usuario)
    {
        try {

            $query = "select id, nome, email from usuario where email = :pemail and senha = :psenha";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pemail", $usuario->getEmail());
            $stmt->bindValue(":psenha", md5($usuario->getSenha()));

            if ($stmt->execute())
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
                if($usuario = $stmt->fetch())
                    return $usuario;

            return null;
        } catch (PDOException $error) {
            echo "Erro ao efetuar o login do usuário. Erro: {$error->getMessage()}";
            return null;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnLisUsuarios($limit = 9999) {
        try {

            $query = "select id, nome, email from usuario limit :plimit";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':plimit', $limit);

            if($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
                return  $stmt->fetchAll();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar os usuários do banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnLocalizarUsuario($id) {
        try {

            $query = "SELECT id, nome, email, senha  FROM usuario WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar os usuarios no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
    
    public function fnDeletarUsuario($id) {
        try {

            $query = "DELETE FROM usuario WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao deletar o usuario no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
}
