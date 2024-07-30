<?php
    include_once("./includes/header.php");
    session_start();
?>
<div class="container mt-4 bg-dark p-5">
    <?php
        
        if(isset($_SESSION['succ-message'])){
            echo "<p class='text-success text-center' style='background-color: lightgreen;'>".$_SESSION['succ-message']."</p>";
            unset($_SESSION['succ-message']);
        }
        if(isset($_SESSION['error-message'])){
            echo "<p class='text-danger'>".$_SESSION['error-message']."</p>";
            unset($_SESSION['error-message']);
        }
    ?>
    <form method="post" action="deleteMessage.php">
        <input placeholder="Enter Id to delete..." name="delete_box" required>
        <button type="submit" class="bg-warning">Delete</button>
    </form>


<?php
    include_once("../final/db/conn.php");

    $sql = "SELECT * FROM string_info WHERE 1";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<table border='1' class='mt-5 table table-bordered'>";
        echo "<tr class='text-white text-center'>
                <th>String ID</th>
                <th>Message</th>
            </tr>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["string_id"]."</td>";
                echo "<td>".$row["message"]."</td>";
                echo "</tr>";
            }
        }
        else{
            echo "<tr>
                    <td>No records found</td>
                    <td></td>
                </tr>";
        }
        echo "</table>";
    }
    else{                           
        echo "Error executing query: " . mysqli_error($conn);
    } 
?>
</div>
<?php
    include_once("./includes/footer.php");
?>