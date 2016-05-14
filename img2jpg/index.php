<html>
<head>
<title>Convert png image to jpg</title>
<meta charset="utf-8">
</head>
<body>
	<?php if(isset($_FILES['file'])){
		
		require_once 'Image2JPG.class.php';
		$src = $_FILES['file']['tmp_name']; 
		$filename = $_FILES['file']['name'];
		$pos = strrpos($filename, ".");
		$filename2 = substr($filename, 0, $pos) . ".jpg";
		$dst = "uploads/".$filename2;
		$res = Image2JPG::convert($src, $dst);
		if($res){
			$dst2 = "uploads/".$filename;
			move_uploaded_file($src, $dst2);
			echo "Success!";
		}else{
			echo "Something bad happened!";
		}

	}else{?>
		<form action="#" method="post" enctype="multipart/form-data">
			non-jpeg format image file:<input type="file" name="file" id="file" /><br />
			<input type="submit" name="submit" value="提交" />
		</form>
	<?php }?>
</body>
</html>
