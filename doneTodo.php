<?php
    header('Content-Type:application/json');
    function connect(){
        $host = 'localhost';
        $user = 'root';
        $pwd = '';
        $dbname = 'todolist';

        $conn = mysqli_connect($host,$user,$pwd,$dbname);
        if(!$conn){
            die('Erreur lors de la connexion : '.mysqli_connect_error());
        }

        return $conn;
    }

    $id = $_POST['id'];

    $conn = connect();
    $req = "SELECT done FROM todo WHERE id=$id";
    $res = mysqli_query($conn,$req);
    if(mysqli_nums_rows($res)>0){
        $todo = mysqli_fetch_assoc($res);
        $todoDone = $todo['done'];

    }else {
        $todoDone = 0;
    }
    $data = [
        "done" =>$todoDone,
    ];

    echo json_encode($data);
?>