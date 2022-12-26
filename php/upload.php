
<?php
if(isset($_POST['ajouter_annonce'])){
$file1=$_FILES['file1'];
$fileName1=$_FILES['file1']['name'];
$fileTmp1=$_FILES['file1']['tmp_name'];
$fileError1=$_FILES['file1']['error'];
$fileType1=$_FILES['file1']['type'];
$fileSize1=$_FILES['file1']['size'];
$fileExt1=explode('.',$fileName1);
$fileActualExt1=strtolower(end($fileExt1));
$allowed=array('jpg','jpeg','png','pdf');
if(in_array($fileActualExt1,$allowed)){
	if($fileError1==0){
		if($fileSize1<500000){
			$fileNameNew1=uniqid('',true).".".$fileActualExt1;
			$fileDestination1='uploads/'.$fileNameNew1;
			move_uploaded_file($fileTmp1,$fileDestination1);
			# inserting imge name into database
                
			$sql  = "INSERT INTO images (image_nom,id_annonce)
			VALUES (:image1,:id)";
			$stmt = $bdd->prepare($sql);
			$stmt->execute(array(':image1'=>$fileDestination1,':id'=>$last_id));
		}else " this file iis biggg";

	}else echo "this was an error uploading this file";
}else{
	echo "you cannot upload with this ext";
}
$file2=$_FILES['file2'];
$fileName2=$_FILES['file2']['name'];
$fileTmp2=$_FILES['file2']['tmp_name'];
$fileError2=$_FILES['file2']['error'];
$fileType2=$_FILES['file2']['type'];
$fileSize2=$_FILES['file2']['size'];
$fileExt2=explode('.',$fileName2);
$fileActualExt2=strtolower(end($fileExt2));
if(in_array($fileActualExt2,$allowed)){
	if($fileError2==0){
		if($fileSize2<500000){
			$fileNameNew2=uniqid('',true).".".$fileActualExt2;
			$fileDestination2='uploads/'.$fileNameNew2;
			move_uploaded_file($fileTmp2,$fileDestination2);
			# inserting imge name into database
                       
			$sql  = "INSERT INTO images (image_nom,id_annonce)
			VALUES (:image2,:id)";
			$stmt = $bdd->prepare($sql);
			$stmt->execute(array(':image2'=>$fileDestination2,':id'=>$last_id));
		}else " this file iis biggg";

	}else echo "this was an error uploading this file";
}else{
	echo "you cannot upload with this ext";
}
$file3=$_FILES['file3'];
$fileName3=$_FILES['file3']['name'];
$fileTmp3=$_FILES['file3']['tmp_name'];
$fileError3=$_FILES['file3']['error'];
$fileType3=$_FILES['file3']['type'];
$fileSize3=$_FILES['file3']['size'];
$fileExt3=explode('.',$fileName3);
$fileActualExt3=strtolower(end($fileExt3));
if(in_array($fileActualExt3,$allowed)){
	if($fileError3==0){
		if($fileSize3<500000){
			$fileNameNew3=uniqid('',true).".".$fileActualExt3;
			$fileDestination3='uploads/'.$fileNameNew3;
			move_uploaded_file($fileTmp3,$fileDestination3);
			# inserting imge name into database
                
			$sql  = "INSERT INTO images (image_nom,id_annonce)
			VALUES (:image3,:id)";
			$stmt = $bdd->prepare($sql);
			$stmt->execute(array(':image3'=>$fileDestination3,':id'=>$last_id));
		}else " this file iis biggg";

	}else echo "this was an error uploading this file";
}else{
	echo "you cannot upload with this ext";
}
$file4=$_FILES['file4'];
$fileName4=$_FILES['file4']['name'];
$fileTmp4=$_FILES['file4']['tmp_name'];
$fileError4=$_FILES['file4']['error'];
$fileType4=$_FILES['file4']['type'];
$fileSize4=$_FILES['file4']['size'];
$fileExt4=explode('.',$fileName4);
$fileActualExt4=strtolower(end($fileExt4));
if(in_array($fileActualExt4,$allowed)){
	if($fileError4==0){
		if($fileSize2<500000){
			$fileNameNew4=uniqid('',true).".".$fileActualExt4;
			$fileDestination4='uploads/'.$fileNameNew4;
			move_uploaded_file($fileTmp4,$fileDestination4);
			# inserting imge name into database  

			$sql  = "INSERT INTO images (image_nom,id_annonce)
			VALUES (:image4,:id)";
			$stmt = $bdd->prepare($sql);
			$stmt->execute(array(':image4'=>$fileDestination4,':id'=>$last_id));
		}else " this file iis biggg";

	}else echo "this was an error uploading this file";
}else{
	echo "you cannot upload with this ext";
}
}
?>
