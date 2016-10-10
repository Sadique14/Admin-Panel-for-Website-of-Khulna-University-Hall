<?php
require_once '../resources/library/database.php';
//$db=new database();
//$studentId = "12345";
//$query = "select * from student,exchange_application_form WHERE studentId1=studentId";
  //$file = $db->select($query);
  //$row=mysqli_fetch_row($result)
  //echo mysqli_num_rows($file);
   //$file = mysqli_fetch_all($file,MYSQLI_ASSOC);
   //print_r($file);
   //echo mysqli_num_rows($file);
   //$div = explode('.', $file['photo']);
     //                   $file_ext = strtolower(end($div));
       //                 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         //               $name = "../resources/RecycleBin/".$unique_image;
           //            rename($file['photo'], $name);
 // echo $file;
  
$file = 'RecycleBin/12.jpg';
//$dest="../resources/vivaReport";
//$nullfile = "../resources/null.jpg";
        if($file){
			//fclose($file);
			//chown($file,465);
        	$ok = unlink($file);
			//rename($file,"../resources/vivaReport/null.jpg");
			//echo copy($nullfile,$dest);
			//rmdir($dest);
			//array_map('unlink', glob("$dest/*.*"));
			//delete($file);
			
			
			//$div = explode('.', $file);
            //$file_ext = strtolower(end($div));
			//echo $file_ext;
            //$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			//$name = "../resources/RecycleBin/".$unique_image;
			//rename($file, $name);
			echo 'ok';
        } 
		
		//$file = mysqli_fetch_assoc($result);
?>