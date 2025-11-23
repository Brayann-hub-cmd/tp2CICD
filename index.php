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

    function todolist(){
        $conn = connect();
        if($conn){
            $req = "SELECT * FROM todo ORDER BY created_at DESC;";
            $res = mysqli_query($conn,$req);
            while ($enr = mysqli_fetch_array($res)) {
                echo '<div class="todo" id="'.$enr['id'].'">
                        <label>'.$enr['title'].'</label>
                        <div class="btnTodo">
                            <form action="modtodo.php" method="post">
                                <input type="submit" value="Undo" class="undo" name="undo">
                                <input type="submit" value="X" class="reset" name="reset">
                            </form>
                        </div>
                    </div>';
            }
        }else {
           echo '<div class="todo">
           <label>Erreur de connexion à la base de données</label></div>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 todolist</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Todolist</h1>
    </header>
    <div class="grille">
        <div class="search">
            <form action="addTodo.php" method="post">
                <input type="text" id="recherche" placeholder="Task Title" name='title' required/>
                <input type="submit" value="Add" class="btn" name="btn"/>
            </form>
        </div>
        <div class="todos">
            <?php todolist();?>
        </div>
    </div>
</body>
</html>