

<?php  session_start();  ?>
<?php
if ($_SESSION['user_id'] == "") 
{
header('location:register.php');
}
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css">
		.lan{
			width:90%;
			height:50px;
			background: red;
			margin: 0 auto;
			border: 4px solid black;
			border-radius: 50px;
		}
	</style>
</head>
<body>
    <div class="lan">
      <div class="btn-group">
      <button style="margin-left:1800%;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       </button>
      <div class="dropdown-menu">
         <a href="logout.php">logout</a>
         <br>
         <a href="editor.php">profile user</a>
      </div>
   </div>
    </div>

    <?php
       include 'mysqli.php';
      $query='
        SELECT * FROM storn 
        where user_id = "'.$_SESSION['user_id'].'"
      ';
      $stms=$connect->prepare($query);
      $stms->execute();
      $fetch=$stms->fetchall();
    ?>
</body>
</html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
<section class="container mt-4 mb-4">
<div class="container">
  <div class="row mb-3">
    <?php
        $query='SELECT * FROM 
        storn';
        $stm=$connect->prepare($query);
        $stm->execute();
        $fetchuser=$stm->FetchAll();
        foreach ($fetchuser as $row) 
        {
     ?>
    <div class="col-md-6">
      <div class="d-flex flex-row border rounded">
          <div class="p-0 w-25">
              <?php echo fetch_imge_user($connect,$row['user_id'])  ?>
          </div>
          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
              <h4 class="text-primary">
                <?php echo $row['name_last'].'&nbsp'.$row['frist_name']; ?>
              </h4>
              <h5 class="text-info">
                
              </h5>
              <ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0">
                <?php
                if ($row['facebook'] != "") 
                {
                  echo '
                <a href="'.$row['facebook'].'">
                ';
                }
                ?>
                <li><i class="fab fa-facebook-square"></i> Facebook</li>
                </a>
               <?php
                if ($row['twitter'] != "") 
                {
              echo '<a href="'.$row['twitter'].'">
              ';
               }
              ?>
                <li><i class="fab fa-twitter-square"></i> Twitter</li>
              </a>
               
              </ul>
  <p class="text-right m-0">
    <form method="post" action="profile_user.php">
       <input type="text" style="display: none;" name="user_id" value="<?php echo $row['user_id'];  ?>" >
       <input type="submit" style="background: 
       #808080;margin-left:100px;" value="view profile ">
    </form>
  </p>
   </div>
      </div>
    </div>
     <?php
       }
     ?>
    <?php 
    function fetch_imge_user($connect,$user)
    {
      $query='
         SELECT * FROM data_user 
         WHERE user = "'.$user.'"';
 
         $stm=$connect->prepare($query);
         $stm->execute();
         $etchimg=$stm->fetchAll();
         $couimg=$stm->rowCount();
         if ($couimg > 0) 
           {
            foreach ($etchimg as $row) 
             {
            
            echo '<img  id="img_user" title="profile image"
            style="border-radius:50%;" class="img-thumbnail border-0" src="'.$row['imge_user'].'">';
            }
           }else{
    
     $query='
         SELECT * FROM storn 
         WHERE user_id = "'.$user.'"';
 
         $stm=$connect->prepare($query);
         $stm->execute();
         $etchimg=$stm->fetchAll();
         $couimg=$stm->rowCount();
        foreach ($etchimg as $rowg)
        {
          if ($rowg['Gender'] == "Female") 
          {
             echo '<img  id="img_user" title="profile image"  style="border-radius:50%;" class="img-thumbnail border-0" src="guser.png">';  
          }
          if ($rowg['Gender'] == "Male") 
          {
            echo '<img  id="img_user" title="profile image"  style="border-radius:50%;" class="img-thumbnail border-0" src="muser.png">'; 
          }   
        }
       }
     }
  ?>
  </div>

</div>
</section>

