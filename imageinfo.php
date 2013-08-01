<?php
	$size = getImageSize('simpletext.jpg');
	
	echo $size[3];
	echo "Mime: ". $size['mime'];
	
	?>