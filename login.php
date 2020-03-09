<?php include 'jqury.php';  ?>
<?php include 'mysqli.php'; ?>
<?php 
session_start(); 

   if (!empty($_SESSION['user_id'])) 
     {
     header("location:index.php");
     } 


?>
<html>
<head>
 <style type="text/css">
	.sl{
         
        background:#9E9896;
        width:350px;
        height:530px;
        margin: 0 auto;
        border-radius: 12px;
        border: 3px solid #4A4543;

     }
     .ts{
     	color: black;
     	text-align: center;
     }
     .imglo{

     	width: 200px;
     	margin-left: auto;
     	margin-right: auto;
     	display: block;
     }
     .email{
     	width: 93%;
     	height: 35px;
     	margin-left:2%;
     	border-radius: 18px;
     	border: 1px solid;
     	padding-left: 7px;

     }
     .buttonl{
     	width: 66px;
     	height: 33px;
     	border-radius: 20px;
     	margin-left:40%;
     	margin-top: 20px;

     }
     .buttonr{
        width: 66px;
        height: 33px;
        border-radius: 20px;
        margin-left:40%;
        margin-top: 8px;

     }
     .smalltext{
     	left: 66px;
     }
     .password{
        width: 80%;
        height: 35px;
        margin-left:9%;
        border-radius: 18px;
        border: 1px solid;
        padding-left: 7px;

     }
     .body {
       background-image: url('bd.png');
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: 100% 100%;
      }
 </style>
</head>
<body class="body">
   <div class="sl">
   	<h2 class="ts">LOGIN</h2>
   	<img class="imglo" src="login.png">
    <h2 class="tsl" style="color:red;text-align: center;"></h2>
    <form method="post">
   	<input type="email"  name="email" id="email"  placeholder="Email" class="email">
   	   <br>
       <br>
    <input type="password" placeholder="password" id="password" name="password" class="password">
    <div class="inlo">
    	 <button name="login" class="buttonl">login</button>
          <a href="register.php">
          <h2 style="text-align: center;">Create a new account</h2>
          </a>
  </form>
    </div>
   </div>
</body>
</html>
<?php

if (isset($_POST['login'])) 
{
    $query='
     SELECT * FROM storn
     where email = "'.$_POST['email'].'" 
    ';
    $stm=$connect->prepare($query);
    $stm->execute();
    $rowu=$stm->rowCount();
    if ($rowu > 0) 
    {
   $queryp='
     SELECT * FROM storn
     where password = "'.$_POST['password'].'" 
    ';
    $stmp=$connect->prepare($queryp);
    $stmp->execute();
    $rowp=$stmp->rowCount();
    $fetchu=$stmp->fetchAll();
         if ($rowp > 0) 
         {
           header('location:index.php');
           foreach ($fetchu as $row) 
           {
            $_SESSION['user_id']=$row['user_id'];
           }
    }else{
           echo 
        "<script>
            $('.tsl').html('wrong password');
        </script>
        ";
           }
         }else{
        echo 
        "<script>
            $('.tsl').html('wrong Email');
        </script>
        ";
        }
       }   

?>