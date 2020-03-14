<?php 
    session_start();
    
	if(isset($_SESSION['user'])){
 ?>
 <?php	
 require_once "login/php/conexion.php";
 require_once "head.php";
 require_once "queryDash.php";

 ?>
<body>
    <div class="container">
        <?php
            //Navigation -->
            require_once "nav2.php";
            require_once "buttons.php";
        ?>
        <!--Content-->


        <!--Content-->
        <?php
            //Footer
            require_once "footer.php";
        ?>
    </div>
</body>
</html>   
<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
