<?php
include 'config.php';
$result = $conn->query( 'SELECT * FROM participants' );
$users=$result->fetch();

if (isset($_GET['id']))
{
   $id=$users['contact'];
   $code=$_GET['code'];
}
if ($code==0)
 {
    
    $result=$conn->prepare("DELETE  FROM participants WHERE contact=? ");
    $result->execute(array($id));

    header('location:admin.php');

}elseif ($code==1)
{
    
    header('location:update.php');


}
?>
