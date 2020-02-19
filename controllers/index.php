<?php
 require 'models/Todo.php';

class indexController
{
    //show index page
    public function index($database)
    {
        $tasks = $database->selectAll('todos');
        require 'views/index.view.php';
    }
    //insert into database
    public function add($database)
    {
        if(isset($_GET['add'])){
            $data =[$_GET['desc'],0];
            $todo = new Todo();
            $bind = ['value' => ':description,:completed'];
            $add = $database->add('todos',$todo->columns,$bind,$data);
            if(count($add) > 0) {
                return 'success';
            }else{
                return 'fail';
            }
        }
    }

    //update status
    public function status($database)
    {
        if(isset($_GET['update'])){
            $id = $_GET['id'];
            $bind = ['value' => 'completed=:completed']; 
            $task = $database->selectWhere('todos',$id)[0];
            $status = 0; 
            if($task->completed == 0){
                $status = 1;
            }
            if($task->completed == 1){
                $status = 0;
            }
            $data = ['status' => $status];
            $update = $database->update('todos',$bind,$data,$id);

        }
    }

    public function delete($database)
    {
        if(isset($_GET['delete'])){
            $id = $_GET['id'];
            $database->delete('todos',$id);
        }
    }

}
$indexController = new indexController();
$indexController->index($database);
$indexController->add($database);
$indexController->status($database);
$indexController->delete($database);

