<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    define('DBHOST', 'localhost');
    define('DBNAME', 'tutophp');
    define('DBPASS', '');
    define('DBUSER', 'root');
    

$dsn="mysql:host=".DBHOST."; dbname=".DBNAME;

try{
    $db=new PDO($dsn,DBUSER,DBPASS);
    $db->exec("SET NAMES utf8");
    echo "on est connecter";


}catch(PDOException $e){
die("erreur:".$e->getMessage());
}
//     $sql= "DROP TABLE IF EXISTS users";
//     $requete=$db->query($sql);
// $sql="SELECT * FROM `users`";
// $requete=$db->query($sql);
    

// $user=$requete->fetch(PDO::FETCH_ASSOC);
    

// $sql="INSERT INTO `users`(`email`, `password`, `roles`) VALUES('aubin@gmail.com', 'aubin','devfullstack' )";
// $requete=$db->query($sql);


// $sql="DELETE FROM `users` WHERE ` 'id'=1";
// $requete=$db->query($sql);
// echo $requete->rowCount();
 
    


    
    
    ?>
   
   
</body>
</html>