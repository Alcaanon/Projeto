<?php
class SiteRepository
{
    private $conn;

    public function __construct() {

        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }
    
    function fnAddCategoria(Categoria $categoria): bool
    {
        try {

            $query = "INSERT INTO categoria (nome) VALUES (:pnome) ON conflict do nothing";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pnome", $categoria->getNome());

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir a categoria no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    function fnUpdateCategoria($categoria): bool
    {
        try {

            $query = "UPDATE categoria SET nome = :pnome WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pid", $categoria->getId());
            $stmt->bindValue(":pnome", $categoria->getNome());

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao editar a categoria no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnListCategorias($limit = 9999) {
        try {

            $query = "SELECT id, nome, criado_em criadoem FROM categoria limit :plimit";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':plimit', $limit);

            if($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Categoria');
                return  $stmt->fetchAll();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar as categorias no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnLocalizarCategoria($id) {
        try {

            $query = "SELECT id, nome, criado_em criadoem FROM categoria  WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Categoria');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar a categoria no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnListCategoriasIn($ids) {
        try {

            $inQuery = implode(',', array_fill(0, count($ids), '?'));
            $query = "select * from categoria where id in ({$inQuery})";

            $stmt = $this->conn->prepare($query);
            foreach ($ids as $k => $id)
                $stmt->bindValue(($k + 1), $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Categoria');
                return  $stmt->fetchAll();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar as categorias no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
    
    public function fnListCategoriasQuantidade($limit = 9999) {
        try {

            $query = "select categoria.nome categoria, count(categoria_id) quantidade from produto " .
            "join categoria on categoria.id = categoria_id group by (categoria.nome, categoria_id) " .
            "order by count(categoria_id) desc limit :plimit;";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':plimit', $limit);

            if ($stmt->execute())
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar as categorias com quantidade no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnDeletarCategoria($id) {
        try {

            $query = "DELETE FROM categoria WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Categoria');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao deletar a categoria no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
}
