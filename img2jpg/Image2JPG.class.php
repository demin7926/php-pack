<?php

class Image2JPG{

	public static function convert($srcFile, $dstFile, $width=0, $height=0){
		$quality = 80;
		$data = getimagesize($srcFile);
		
		switch ($data['2']) {
			case 1:
				$img = imagecreatefromgif($srcFile);
				break;
			case 2:
				$img = imagecreatefromjpeg($srcFile);
				break;
			case 3:
				$img = imagecreatefrompng($srcFile);
				break;
			default:
				//TO-BE-CONTINUE: the other format
				return false;
		}

		$srcW = imagesx($img);
		$srcH = imagesy($img);
		$dstW = empty($width) ? $srcW : $width;
		$dstH = empty($height) ? $srcH : $height;

		$ni = imagecreatetruecolor($dstW, $dstH);
		$bg = imagecolorallocate($ni, 255, 255, 255);  //setting the background as white
		imagefill($ni, 0, 0, $bg);
		imagecopyresampled($ni, $img, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);
		imagejpeg($ni, $dstFile, $quality);
		imagedestroy($img);
		imagedestroy($ni);

		return true;
	}

}
