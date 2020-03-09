<?php session_start(); ?>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<hr>
<?php
     include 'mysqli.php';
      $query='
        SELECT * FROM storn 
        where user_id = "'.$_SESSION['user_id'].'"
      ';

      $stms=$connect->prepare($query);
      $stms->execute();
      $fetch=$stms->fetchall();

      foreach ($fetch as $row) 
      {
?>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-3">
      <div class="text-center">
           <?php echo fetch_imge_user($connect,$_SESSION['user_id']); ?>
  
         <div id="imge_share"></div>
        <h6 style="display: none;" id="ts">Click "Save image" if you want to save  the image</h6>
        <label for="imge">
            <h4 style="color: red;">Click to choose an image</h4>
        </label>
        <input style="display: none;" type="file" id="imge"  class="text-center center-block file-upload" onchange="showimgeshare(this)">
      </div></hr><br>
          <div class="panel panel-default">
            <div class="panel-heading"> <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"></div>
          </div>
          
          
          <ul class="list-group">
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
                <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
        <div class="col-sm-9"> 
          <h3 class="text_s"></h3>

          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                      <div class="form-group">
                          
   <div class="col-xs-6">
       <label for="first_name"><h4>First name</h4>
       </label>
      <input type="text" class="form-control" name="first_name" value="<?php 
         if($row['frist_name'] != "")
         {echo $row['frist_name'];}?>" 
         id="first_name" placeholder="first name" title="enter your first name if any.">
   </div>
    </div>
   <div class="form-group">
      <div class="col-xs-6">
        <label for="last_name"><h4>Last name</h4></label>
           <input value="<?php 
            if($row['name_last'] != "")
             {echo $row['name_last'];}?>" type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
      </div>
  </div>
   <div class="form-group">
      <div class="col-xs-6">
        <label for="mobile"><h4>What is your horoscope</h4></label>
        <br>
        <select id="horoscope" class="mdb-select md-form" searchable="Search here..">
          <?php
            if ($row['horoscope'] !="") 
            {
               echo ' <option value="" disabled selected>'.$row['horoscope'].'</option>';
            }
          ?>
       <option value="Capricorn">Capricorn</option>
       <option value="Aquarius">Aquarius</option>
       <option value="Whale">Whale</option>
       <option value="Aries">Aries</option>
       <option value="Taurus">Taurus</option>
       <option value="Gemini">Gemini</option>
       <option value="Cancer">Cancer</option>
       <option value="Lion Tower">Lion Tower</option>
       <option value="Virgo">Virgo</option>
       <option value="Libra">Libra</option>
       <option value="Scorpio">Scorpio</option>
       <option value="Sagittarius">Sagittarius</option>
       </select>
      </div>
    </div>
          
     <div class="form-group">
        <div class="col-xs-6">
           <label for="mobile"><h4>What's your gender?</h4></label>
           <br>
           <select  id="gender" class="browser-default custom-select">
            <?php
            if ($row['Gender'] != "") 
            {
               echo "<option selected>".$row['Gender']."</option>";
            }
             ?>
           <option value="Female">Female</option>
           <option value="Male">Male</option>
          </select>
       </div>
  </div>
 <div class="form-group">
     <div class="col-xs-6">
       <label for="email"><h4>Email</h4></label>
        <input type="email" class="form-control" name="email" value="
          <?php
            echo $row['email'];
          ?>
        " id="email" placeholder="you@email.com" title="enter your email.">
       </div>
        </div>
    <div class="form-group">
     <div class="col-xs-6">
       <label for="email"><h4>Facebook</h4></label>
        <input type="facebook" class="form-control" name="facebook" value="<?php
            if($row['facebook'] != "")
            {echo $row['facebook'];}?>" 
        id="facebook" placeholder="enter url profile facebook" title="enter url profile facebook">
       </div>
        </div>

         <div class="form-group">
     <div class="col-xs-6">
       <label for="email"><h4>Twitter</h4></label>
        <input type="twitter" class="form-control" name="twitter" value="<?php
        if($row['twitter'] != "")
            {echo $row['twitter'];}?>" id="twitter" placeholder="enter url profile twitter" title="enter url profile twitter">
       </div>
        </div>
       <div class="form-group">
       <div class="col-xs-6">
         <label for="mobile"><h4>What is your profession</h4></label>
        <br>
        <select id="profession" class="mdb-select md-form" searchable="Search here..">
          <?php
            if ($row['profession'] !="") 
            {
               echo ' <option value="" disabled selected>'.$row['profession'].'</option>';
            }
          ?>
       <option value="programmer">programmer</option>
       <option value="Carpenter">Carpenter</option>
       <option value="Cleaning agent">Cleaning agent</option>
       <option value="Web designer">Web designer</option>
       <option value="clerk">clerk</option>
       <option value="Photoshop Designer">Photoshop Designer</option>
       <option value="Data engineer">Data engineer</option>
       <option value="Lion Tower">Lion Tower</option>
       <option value="Developer">Developer</option>
       <option value="Other than that">Other than that</option>
       </select>
         </div>
       </div>
     <div class="form-group">          
       <div class="col-xs-6">
          <label for="password"><h4>Password</h4></label>
           <input value="<?php echo$row['password']?>" type="password" class="form-control" name="password" 
           id="password" placeholder="password" title="enter your password.">
        </div>
      </div>
     
      <div class="form-group">               
       <div class="col-xs-6">
           <div class="form-group">
           <label for="exampleFormControlTextarea1">Example textarea</label>
           <textarea id="bio" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php if ($row['bio']!=""){
                echo $row['bio'];
           }?></textarea>
          </div>
        </div>
      </div>

    <div class="form-group">
       <div class="col-xs-6">
            <label for="mobile"><h4>What are your hobbies</h4></label>
        <br>
        <select id="hobbies" class="mdb-select md-form" searchable="Search here..">
          <?php
            if ($row['hobbies'] !="") 
            {
               echo ' <option value="" disabled selected>'.$row['hobbies'].'</option>';
            }
          ?>
       <option value="horse riding">horse riding</option>
       <option value="Driving a motorcycle">Driving a motorcycle</option>
       <option value="Car racing">Car racing</option>
       <option value="Video games">Video games</option>
       <option value="Fishing">Fishing</option>
       <option value="Other than that">Other than that</option>

       </select>
    </div>
       </div>
         <div class="form-group">
            <div class="col-xs-12">
             <br>
          <button style="display: none;" id="Save_img" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save image</button>

           <button id="Save" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
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
            
            echo '<img  id="img_user" title="profile image" style="width:200px; height:200px;border-radius: 50%;" src="'.$row['imge_user'].'">';
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
             echo '<img  id="img_user" title="profile image" style="width:200px; height:200px;border-radius: 50%;" src="guser.png">';  
          }
          if ($rowg['Gender'] == "Male") 
          {
            echo '<img  id="img_user" title="profile image" style="width:200px; height:200px;border-radius: 50%;" src="muser.png">'; 
          }   
        }
       }
     }
  ?>
</html>
  <script type="text/javascript">
    $(document).ready(function(){
    $(document).on('click','#Save',function()
       {

         var password=$('#password').val();
         var email=$('#email').val();
         var last_name=$("#last_name").val();
         var first_name=$("#first_name").val();
         var gender=$('#gender').val();
         var horoscope=$("#horoscope").val();
         var profession=$("#profession").val();
         var hobbies=$("#hobbies").val();
         var facebook=$("#facebook").val();
         var twitter=$("#twitter").val();
         var bio=$("#bio").val();
         action="update";
         $.ajax({
           url:"insert_val.php",
           type:"post",
           data:{last_name:last_name,first_name:first_name,email:email,password:password,action:action,gender:gender,horoscope:horoscope,profession:profession,hobbies:hobbies,twitter:twitter,facebook:facebook,
             bio:bio},
           success:function(data)
           {
            $(".text_s").html(data);
           }
        });
      });
    });

    function showimgeshare(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
           $("#imge_share").html('<img src="'+e.target.result+'"class="upload-preview" style="width:200px; height:200px;border-radius: 50%;" />');   
         }
         $("#img_user").hide();
         $("#ts").show();
         $("#Save_img").show();
    fileReader.readAsDataURL(objFileInput.files[0]);
    }
}
 
 $(document).on('click','#Save_img',function()
 {
         var fd = new FormData();
         var files = $('#imge')[0].files[0];
         fd.append('imge',files);
         var action="imgeu";
         fd.append('imgeu',action);
         $.ajax({
           url:"insert_date_user.php",
           type:"post",
           data:fd,
           processData:false,
           contentType:false,
           success:function(data)
           {
            $(".text_s").html(data);
           }
       });
    });
  </script>