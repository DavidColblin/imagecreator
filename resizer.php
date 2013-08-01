<?php

function resizer($filepath, $pathToSave){

/*
	Author: David M
	Modified from: http://www.php.net/manual/en/function.imagejpeg.php;
	Function: 
		function takes in file and save it reduced. 
	doesnt reduce if minimum width is below $minwidth.
	Then saves the image.
*/
	// Variables
	$filename = $filepath;
	$reduce_factor = 0.5;
	$min_width = 200;

	// Content type
	header('Content-type: image/jpeg');

	// Get new dimensions
	list($width, $height) = getimagesize($filename);

		if ($width >= $min_width)
		{
			$new_width = $width * $reduce_factor;
			$new_height = $height * $reduce_factor;
		}
		else
		{
			$new_width = $width;
			$new_height = $height;
		}


		// Resample
		$image_p = imagecreatetruecolor($new_width, $new_height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		// Output
		imagejpeg($image_p, null, 100);
		imagejpeg($image_p, $pathToSave . $filename);
	
}


?>