<?php
//CRUD - Create, Read, Update, Delete

class TarefaService{

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar(); //link de conexão com o banco de dados
        $this->tarefa = $tarefa; 
    }

    //método para inserir uma tarefa no banco de dados
    public function inserir(){
        $query = 'INSERT INTO tb_tarefas (tarefa, data_modificado) VALUES (:tarefa, :data_modificado)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':data_modificado', $this->tarefa->__get('data_modificado'));
        $stmt->execute();
    }

    //método para listar todas as tarefas do banco de dados
    public function recuperar(){
        $query = 'SELECT 
                        t.id, s.status, t.tarefa
                  FROM
                        tb_tarefas as t
                  LEFT JOIN
                        tb_status as s on (t.id_status = s.id) ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    //metodo para atualizar uma tarefa no banco de dados
    public function atualizar(){

        $query = 'UPDATE tb_tarefas SET tarefa = :tarefa, data_modificado = :data_modificado WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':data_modificado', $this->tarefa->__get('data_modificado'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();

    }

    //metodo para excluir uma tarefa no banco de dados
    public function remover(){
        $query = 'DELETE FROM tb_tarefas WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();
        
    }
    
    public function marcarRealizada(){
        $query = "update tb_tarefas set id_status = ? where id = ?";
        //$query = "update tb_tarefas set tarefa = :tarefa where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
       // $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
       // $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    
    }
    public function recuperarTarefasRealizadas(){
        $query = "select 
        t.id, s.status, t.tarefa, t.data_cadastrado, t.data_modificado
        from 
            tb_tarefas as t
            left join tb_status as s on (t.id_status = s.id) 
        where
            t.id_status = :id_status
        order by 
            t.data_modificado asc";
    
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
