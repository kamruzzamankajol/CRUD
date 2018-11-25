

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #f1f1c1;
}
</style>
</head>
<?php include 'config.php';?>
<?php include 'database.php';?>
<?php 
$db = new Database();
$query = "SELECT * FROM tbl_user";
$read =$db->select($query);
?>

<?php
if(isset($_GET['msg'])){
 echo"<span style='color:red;'>".$_GET['msg']."</span>";
}
?>

<body>



<table style="width:100%">
  <tr>
    <th>Serial</th>
    <th>Name</th> 
    <th>Email</th>
    <th>Skill</th>
    <th>Action</th>
  </tr>
  <?php if($read) { ?>
  	<?php while ($row = $read->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['skill'];?></td>
    <td> <a href="update.php?id=<?php echo urlencode($row['id']);?>">edit</a></td>
  </tr>
  <?php } ?>
  <?php } else { ?>
  	<p>Data is not available</p>
  	<?php } ?>
  </table>
  <a href="creat.php">creat</a>


</body>
</html>
