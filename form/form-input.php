<?php
	require "..\assets\include\cipher.php";

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST["message"])){
        $input = $_POST['message'];
        $message = "Ecoded Message is: " . encode($input,2);
        echo "<div class='echo-message'>".$message."</div>";
  }
}
?>