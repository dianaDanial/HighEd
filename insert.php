<?php

if(isset($_POST["username"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=highEd", "root", "");
 for($count = 0; $count < count($_POST["username"]); $count++)
 {
  $query = "INSERT INTO uniAdmin
  (username, password, name, email,university)
  VALUES (:username, :password, :name, :email, :university)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':username'  => $_POST["username"][$count],
    ':password' => $_POST["password"][$count],
    ':name'  => $_POST["name"][$count],
    ':email'  => $_POST["email"][$count],
    ':university'  => $_POST["university"][$count],
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>
