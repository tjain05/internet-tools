<?php 
    require_once './includes/header.php';
    require_once './db/conn.php';  
    session_start();

    $id=$_POST['delete_box'];
    $sql = "DELETE FROM `string_info` WHERE `string_info`.`string_id` = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['succ-message']="Account Deleted Succesfully!";
        header('Location: showAll.php');
    }
    else{   
        $_SESSION['error-message']="Some Internal Error";
        header('Location: showAll.php');                        
    } 


?>
<?php 
    require_once './includes/footer.php';
 ?>
