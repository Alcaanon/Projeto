<?php
class ServicosRepository
{
    private $conn;

    public function __construct() {

        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }
    
    function fnAddServico($servico): bool
    {
        try {

            $query = "INSERT INTO servico (classe, titulo, descricao, categoria_id) ";
            $query .= "values (:pclasse, :ptitulo, :pdescricao, :pcategoriaId)";
            $query .= " on conflict do nothing";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pclasse", $servico->getClasse());
            $stmt->bindValue(":ptitulo", $servico->getTitulo());
            $stmt->bindValue(":pdescricao", $servico->getDescricao());
            $stmt->bindValue(":pcategoriaId", $servico->getCategoriaId());

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir o servico no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    function fnUpdateServico($servico): bool
    {
        try {

            $query = "UPDATE servico set classe = :pclasse, titulo = :ptitulo, descricao = :pdescricao, categoria_id = :pcategoriaId WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pid", $servico->getId());
            $stmt->bindValue(":pclasse", $servico->getClasse());
            $stmt->bindValue(":ptitulo", $servico->getTitulo());
            $stmt->bindValue(":pdescricao", $servico->getDescricao());
            $stmt->bindValue(":pcategoriaId", $servico->getCategoriaId());

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir o servico no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
    
    public function fnListServicos($limit = 9999) {
        try {

            $query = "select id, classe, titulo, descricao, categoria_id categoriaid, criado_em criadoEm from servico order by criado_em desc limit :plimit";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':plimit', $limit);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Servico');
                return  $stmt->fetchAll();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar os serviços no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnLocalizarServicos($id) {
        try {

            $query = "select id, classe, titulo, descricao, categoria_id categoriaid, criado_em criadoEm from servico where id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Servico');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar os serviços no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
    
    public function fnDeletarServico($id) {
        try {

            $query = "DELETE FROM servico WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Servico');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao deletar o serviço no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
}
