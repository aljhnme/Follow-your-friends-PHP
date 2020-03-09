
<?php
session_start();
include 'mysqli.php';
if ($_POST['action'] == 'reister') 
{
  $password=$_POST['password'];
  $passwordc= $_POST['passwordc'];
  $email=$_POST['email'];
  $namel=$_POST['namel'];
  $namef=$_POST['namef'];
if (!empty($email)) 
{
$queryf='
SELECT * FROM 
 storn WHERE email = "'.$email.'"
';
$stmu=$connect->prepare($queryf);
$stmu->execute();
$rowcus=$stmu->rowcount();
if ($rowcus > 0) 
{
	echo "<h3 style='text-align: center;color: red;'>Registered Email</h3>";
}else{
if ($namel == "" && $namef== "") 
     {
        $namel='NO NAME';
        $namel='NO NAME';
     }
if (is_numeric($password)&is_numeric($passwordc)) 
{
	
if ($password != $passwordc) 
{
  echo "<h3 style='text-align: center;color: red;'>password does not match</h3>";
}else{

$query='
INSERT INTO storn
(password,email,name_last,frist_name,Gender)
 VALUES ("'.$password.'","'.$email.'","'.$namel.'","'.$namef.'","'.$_POST['gender'].'")
';
$stm=$connect->prepare($query);
if ($stm->execute()) 
{
  echo "<h3 style='text-align: center;color: green;'>Successfully registered<a href='login.php'><h3 style='text-align: center;'>Login</h3></a></h3>";
}
}
}else{
	echo "<h3 style='text-align: center;color: red;'>choose password numbers only</h3>";
}	
}
}else{
	echo "<h3 style='text-align: center;color: red;'>please fill in the email filed</h3>";
}
}

if ($_POST['action'] == "update") 
{
if ($_POST['facebook'] != "") 
{
   $urlfacebook=$_POST['facebook'];
   $str=substr($urlfacebook,0,25);
   if ($str == "https://www.facebook.com/")
   {
     $facebook=$_POST['facebook'];
   }else{
      echo "<h3 style='color:red;'>Please add a valid Facebook account link</h3>";
    $facebook="";
 }
}else{
  $facebook="";
 }

 
if ($_POST['twitter'] != "")
{
 $urltwitter=$_POST['twitter'];
 $str=substr($urltwitter,0,20);
 if ($str == "https://twitter.com/")
 {
  $twitter=$_POST['twitter'];
 }else{
    echo "<h3 style='color:red;'>Please add a valid twitter account link</h3>";  
    $twitter='';
 }
}else{
   $twitter='';
}
 $queryf='
}
}
SELECT * FROM 
 storn WHERE email ="'.$_POST['email'].'"
 And user_id !="'.$_SESSION['user_id'].'"
';
$stmu=$connect->prepare($queryf);
$stmu->execute();
$rowcus=$stmu->rowcount();
if ($rowcus > 0) 
{
  echo "<h3 style='color:red;'>The email you entered is already registered</h3>";
}else{
     
     if (is_null($_POST['password'])) 
     {
       echo "Fill out the password field";
     }else{
    
     if ($_POST['first_name'] == "" && $_POST['last_name']== "") 
     {
      echo "<h3 style='color:red;'>Please add at least one name</h3>";
        $_POST['last_name']='NO NAME';
        $_POST['first_name']='NO NAME';
     }
      
    if (!is_numeric($_POST['password'])) 
    {
       echo "<h3 style='color: red;'>Please add the password numbers</h3>";
    }else{
      
     $query='
        UPDATE `storn` SET`email`="'.$_POST['email'].'",`password`="'.$_POST['password'].'",`Gender`="'.$_POST['gender'].'",`name_last`="'.$_POST['last_name'].'",`frist_name`="'.$_POST['first_name'].'",horoscope="'.$_POST['horoscope'].'" 
        ,profession="'.$_POST['profession'].'"
        ,hobbies="'.$_POST['hobbies'].'"
        ,facebook="'.$facebook.'",
        twitter="'.$twitter.'",
        bio="'.$_POST['bio'].'"
        WHERE user_id ="'.$_SESSION['user_id'].'"
        ';

       $stm=$connect->prepare($query);
       if ($stm->execute())
        {
         echo "<h3 style='color:#52BE80;'>The information was successfully updated</h3>";
        }
   }
  }
 }
}

if ($_POST['action'] == "insert_f_u") 
{

   if ($_POST['fu_user'] == 'follow') 
   {
      $queryi="
          INSERT INTO follow(user_id_r,user_id_m) 
          VALUES ('".$_POST['user']."','".$_SESSION['user_id']."')             
          ";
          $stmi=$connect->prepare($queryi);
          if ($stmi->execute()) 
          {
       $queryi="
           SELECT * from follow
           where user_id_r='".$_POST['user']."'
          ";
          $stm=$connect->prepare($queryi);
          $stm->execute();
          echo $stm->rowcount();

          }
      }
       if ($_POST['fu_user'] == 'unfollow') 
      {

      $queryi="
         DELETE FROM `follow`
         WHERE user_id_r ='".$_POST['user']."' AND user_id_m ='".$_SESSION['user_id']."'         
          ";
          $stmi=$connect->prepare($queryi);
          
          if ($stmi->execute()) 
          {
      $queryi="
           SELECT * from follow
           where user_id_r='".$_POST['user']."'
          ";
          $stm=$connect->prepare($queryi);
          $stm->execute();
          echo $stm->rowcount();

          }
      } 
}
?>