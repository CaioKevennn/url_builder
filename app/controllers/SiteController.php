<?php

namespace app\controllers;
#use app\models\TaskModel;
#arquivo base para pesquisar informações


class SiteController {
    public function home(){
        require_once __DIR__ . '/../views/UrlBuilderView.php';
        

    }
    /*
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            $task = new TaskModel($title, $description);
            $task->saveTask();

            echo "Task cadastrada com sucesso!";
        }

        require_once __DIR__ . '/../views/cadastro.php';
    }

    public function consult(){
        $consulta=TaskModel::loadAllTasks();
        require_once __DIR__ . '/../views/consulta.php';
        
    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['new_description'])){
            $title = $_POST['new_title'];
            $description = $_POST['new_description'];
            $id=$_POST['id'];
            $task = new TaskModel($title, $description,$id);
            $task->saveTask();
        }elseif($_SERVER['REQUEST_METHOD']==='GET'){
            $id=$_GET["id"];
            $task=TaskModel::loadTask($id);
            print_r($task);
        }
        
        require_once __DIR__ . '/../views/editar.php';

    }

    public function delete(){
        $id=$_GET["id"];
        TaskModel::deleteTask($id);
        
        echo "apagou";
    }
    
*/  
}
    