

<!DOCTYPE html>
<html>
<head>

</head>
<?php include 'config.php'; ?>
<?php include 'database.php';?>
<?php 
$db = new Database();
if(isset($_POST['submit'])){
  $name =mysqli_real_escape_string($db->link, $_POST['name']);
  $email =mysqli_real_escape_string($db->link, $_POST['email']);
  $skill=mysqli_real_escape_string($db->link, $_POST['skill']);
  if($name == '' || $email == '' || $skill==''){

  $error ="must not be empity";

}else{

  $query="INSERT INTO tbl_user(name,email,skill) Values('$name', '$email', '$skill')";
  $creat =$db->insert($query);
}

}
?>
<?php
if(isset($error)){
 echo"<span style='color:red;'>".$error."</span>";
}
?>
<body>



<form action="creat.php" method="post">
<table style="width:100%">
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" placeholder="Input your name"/></td>
  </tr>

  <tr>
    <td>Email</td>
    <td><input type="email" name="email" placeholder="Input your email"/></td>
  </tr>

  <tr>
    <td>Skill</td>
    <td><input type="text" name="skill" placeholder="Input your skill"/></td>
  </tr>

  <tr>
    <td></td>
    <td>
      <input type="submit" name="submit" value ="Submit"/>
    <input type="reset" value ="Cancel"/></td>
  </tr>
  
  </table>
</form>
<a href="part1.php">Go Back</a>
  


</body>
</html>
