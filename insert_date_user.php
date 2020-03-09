<?php
 include 'mysqli.php';
 session_start();

 $name = $_FILES['imge']['name'];
  $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["imge"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $extensions_arr = array("jpg","jpeg","png","gif");

        if( in_array($imageFileType,$extensions_arr) ){
            
            $image_base64 = base64_encode(file_get_contents($_FILES['imge']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            }


     $query='
         SELECT * FROM Data_user 
         WHERE user = "'.$_SESSION['user_id'].'"';
 
         $stm=$connect->prepare($query);
         $stm->execute();
         $etchimg=$stm->fetchAll();
         $coutuser=$stm->rowCount();
         if ($coutuser > 0) 
         {
     $queryu="
        UPDATE data_user SET imge_user='".$image."' WHERE user = '".$_SESSION['user_id']."'
         ";
         $stmu=$connect->prepare($queryu);
         if ($stmu->execute()) 
          {
           echo "The image was successfully updated";
          }
 
         }else{
          $queryi="
           INSERT INTO Data_user(user,imge_user) VALUES ('".$_SESSION['user_id']."','".$image."')
             ";
          $stmi=$connect->prepare($queryi);
          if ($stmi->execute()) 
          {
           echo "The image was successfully updated";
          }
         } 

?>