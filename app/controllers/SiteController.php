<?php

namespace app\controllers;
use app\models\UrlBuilderModel;
#arquivo base para pesquisar informações


class SiteController {
    public function home(){
        session_start();
        require_once __DIR__ . '/../views/UrlBuilderView.php';
        

    }
    public function home2(){
       
        echo "entrou aq";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
            $utms = [];
            $genered_url = " ";
            $utms['utm_campaign'] = filter_var($_POST['utm_campaign'], FILTER_SANITIZE_STRING);
            $utms['utm_source'] = filter_var($_POST['utm_source'], FILTER_SANITIZE_STRING);
            $utms['utm_medium'] = filter_var($_POST['utm_medium'], FILTER_SANITIZE_STRING);
            $utms['utm_content'] = filter_var($_POST['utm_content'], FILTER_SANITIZE_STRING);
            $utms['utm_term'] = filter_var($_POST['utm_term'], FILTER_SANITIZE_STRING);
            foreach ($utms as $index => $utm) {
                if ($utm) {
                    if (!$genered_url) {
                        $genered_url = $url . "?" . $index . $utm;
                    } else {
                        if($utm!=="")
                        {
                            $genered_url = $genered_url . "&" . $index . $utm;
                        }

                    }

                }

            }

            echo $genered_url;

        }
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
    