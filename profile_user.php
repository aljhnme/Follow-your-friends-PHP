<html lang="en"><head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    include 'mysqli.php';
    $query='
        SELECT * FROM storn 
         WHERE user_id = "'.$_POST['user_id'].'"';
 
         $stm=$connect->prepare($query);
         $stm->execute();
         $fetchuser=$stm->fetchAll();
         foreach ($fetchuser as $row) 
         {
    ?>
    <div class="container main-secction">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                <img src="bake.jpg">
            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
              <?php echo fetch_imge_user($connect,$_POST['user_id']); ?>
                        </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Curriculum Vitae</button>
                  <div>
                    
                  </div>
                   <?php
                       session_start();
                       $queryi="
                       SELECT * FROM follow
                       where user_id_r ='".$row['user_id']."' 
                       AND 
                       user_id_m='".$_SESSION['user_id']."'";
                       $stmi=$connect->prepare($queryi);
                       $stmi->execute();
                       $cousuf=$stmi->rowCount();
                       ?>
                         <br>
                        <div id="unfollow">
                       <?php
                       if ($cousuf > 0) 
                        {
                         ?>
                           <button  user="<?php echo $row['user_id']; ?>" user-id="unfollow" id="fu_user" style="background: red;" class="btn btn-warning btn-block u">
                              UnFollow
                            </button> 
                         <?php
                        }
                        ?>
                        </div>
                         <div id="follow">
                        <?php
                        if (!$cousuf > 0) 
                        {
                         ?> 
                         <br>
                           <button id="fu_user" user-id="follow" user="<?php echo $row['user_id']; ?>"  class="btn btn-warning btn-block f">
                              Follow
                            </button> 
                         <?php
                           }
                          ?> 
                         </div>
                        </div>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                <p>FOLLOWER</p>
                                <span class="count_follow"><?php 
                                echo count_follow($connect,$row['user_id']); ?></span>
                            </div>                           
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                      <div class="row">
                      <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                      <h1><?php
                         echo $row['frist_name']."&nbsp".$row['name_last'];
                            ?>
                       </h1>
                        <h5>
                        <?php
                        echo $row['profession'];
                        ?>
                      </h5>
                   </div>
               </div>
           </div>
                         <div class="col-md-4 img-main-rightPart">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row image-right-part">
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 image-right-detail-section2">

                                        </div>
                                    </div>
                                </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
 <ul class="nav nav-tabs" role="tablist">
     <li  class="nav-item">
        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i>Personal information </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i>Detailed information </a>
      </li>                                              
   </ul>
                                              
   <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade show active" id="profile">
      <div class="row">
        <div class="col-md-2">
           <label>name_first</label>
       </div>
  <div class="col-md-6">
    <p><?php if ($row['frist_name'] != "") 
    {
      echo '&nbsp'.'&nbsp'. $row['frist_name'];
    }else{
       echo '&nbsp'.'&nbsp'."NO NAME";
    }
     ?>
     </p>
   </div>
       </div>
     <div class="row">
          <div class="col-md-2">
               <label>last_name</label>
           </div>
   <div class="col-md-6">
    <p><?php echo '&nbsp'.'&nbsp'.$row['name_last']; ?></p>
   </div>
   </div>
    <div class="row">
     <div class="col-md-2">
        <label>Email</label>
     </div>
        <div class="col-md-6">
          <p><?php echo'&nbsp'.'&nbsp'. $row['email'];  ?></p>
       </div>
       </div>
     <div class="row">
        <div class="col-md-2">
           <label>horoscope</label>
      </div>
      <div class="col-md-6">
         <p><?php
        if ($row['horoscope'] != "") 
        {
          echo '&nbsp'.'&nbsp'.$row['horoscope'];
        }else{
          echo '&nbsp'.'&nbsp'."Not defined";
        }
      ?></p>
     </div>
   </div>
      <div class="row">
        <div class="col-md-2">
        <label>Profesion</label>
       </div>
    <div class="col-md-6">
      <p><?php
        if ($row['profession'] != "") 
        {
          echo '&nbsp'.'&nbsp'.$row['profession'];
        }else{
          echo '&nbsp'.'&nbsp'."Not defined";
        }
      ?></p>
   </div>
   </div>
      </div>
        <div role="tabpanel" class="tab-pane fade" id="buzz">
          <div class="row">
             <div class="col-md-6">
                 <label>Gender</label>
            </div>
          <div class="col-md-6">
         <p>
        <?php
        if ($row['Gender'] != "") 
        {
          echo $row['Gender'];
        }else{
          echo "Not defined";
        }
        ?>
        </p>
         </div>
          </div>
             <div class="row">
                <div class="col-md-6">
                  <label>hobbies</label>
               </div>
       <div class="col-md-6">
        <p>
       <?php
        if ($row['hobbies'] != "") 
        {
          echo $row['hobbies'];
        }else{
          echo "Not defined";
        }
        ?>
          
        </p>
             </div>
          </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>Facebook</label>
                     
                 </div>
                 <?php
                 if ($row['facebook'] != "") 
                 {
                 ?>
               <div class="col-md-6">
                    <a href="<?php echo $row['facebook']  ?>" title="Facebook" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-fw"></i> Facebook</a>
              </div>
                <?php
                  }
                ?>
               </div>
                   <div class="row">
                      <div class="col-md-6">
                          <label>Twitter</label>
                       </div>
                   <div class="col-md-6">
                   <?php
                     if ($row['twitter'] != "") 
                       {
                     ?>
                      <a style="background:#0AC8CA;" href="<?php echo $row['twitter']  ?>" title="Twitter"  class="btn btn-facebook btn-lg"><i style="text-align:center;" class="fa fa-facebook fa-fw"></i>Twitter</a>
                     <?php
                      }
                     ?>
                    </div>
                   </div>
                      <div class="row">
                          <div class="col-md-6">
                             <label>Availability</label>
                          </div>
                      <div class="col-md-6">
                         <p>6 months</p>
                      </div>
                       </div>
                           <div class="row">
                               <div class="col-md-12">
                                     <label>Your Bio</label>
                                      <br>
                                        <p>Your detail description</p>
                               </div>
                            </div>
                     </div>                         
                     </div>
             </div>
                </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Curriculum Vitae</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">
                         <?php
                           if ($row['bio'] != "") 
                           {
                             echo $row['bio'];
                           }else{
                              echo "NO Curriculum Vitae";
                           }                         
                           ?>
                        </p>
                    </div>
                </div>
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
            
            echo '<img   id="img_user" title="profile image" src="'.$row['imge_user'].'"class="rounded-circle"> ';
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
             echo '<img  id="img_user" 
                  title="profile image"  src="guser.png"class="rounded-circle"> ';  
          }
          if ($rowg['Gender'] == "Male") 
          {
            echo '<img  id="img_user" title="profile image"  src="muser.png"class="rounded-circle"> '; 
          }   
        }
       }
     }
  ?>
  <?php
function count_follow($connect,$user)
{
$queryi="
     SELECT * FROM follow where
     user_id_r = '".$user."'
     ";
    $stmi=$connect->prepare($queryi);
    $stmi->execute();
    $cousuf=$stmi->rowCount();
    return $cousuf;
}


  ?>

</body>
</html>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
       $(document).on('click','#fu_user',function(){

          var fu_user =$(this).attr('user-id');
          var user=$(this).attr('user');
          var action ="insert_f_u";
          if (fu_user == 'follow')
           {
              var html ='<button  user="<?php echo $row['user_id']; ?>" user-id="unfollow" id="fu_user" style="background: red;" class="btn btn-warning btn-block u">UnFollow</button>';
            $("#unfollow").html(html);
            $('#follow').html('');
           }
           if (fu_user == 'unfollow')
           {
              var html='<button id="fu_user" user-id="follow" user="<?php echo $row['user_id']; ?>"  class="btn btn-warning btn-block f">Follow</button>';
             $("#follow").html(html);
             $("#unfollow").html('');
           }
          $.ajax({
            url:"insert_val.php",
            type:"post",
            data:{fu_user:fu_user,action:action,
              user:user},
            success:function(data)
            {
              $('.count_follow').html(data);
            }
         });
       });
     });
      
  </script>