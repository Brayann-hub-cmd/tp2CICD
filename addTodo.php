<?php
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

    if(isset($_POST['btn'])){
        $conn = connect();
        $title = $_POST['title'];
        $req = "INSERT INTO todo VALUES('','".$title."',0,CURRENT_TIMESTAMP)";
        $res = mysqli_query($conn,$req);
        if($res){
            echo '<script>alert("insertion réalisé avec succès!!");window.location.href="index.php"</script>';
        }else {
            echo '<script>alert("insertion ratés!!");window.location.href="index.php"</script>';
        }
    }
?>