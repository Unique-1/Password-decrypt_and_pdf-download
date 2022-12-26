<?php 
	$pass = md5(1234);
	print ('md5 encryption'.' '.$pass);

	echo "<br>";

	$pass2 = sha1(1234);
	print('sha1 encryption'.' '.$pass2);


	$array = array("kola","abbey","ade","tosin");
	//var_dump($array);
	var_dump(array_rand($array, 1));

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>download files</title>
</head>
<body>
	<?php 
			if (isset($_GET['path'])) {
        // 
            
        $url = $_GET['path'];
        
        if (file_exists($url)) {
            // 
            //$url = "paypal.pdf";
            header("Content-Description: File Transfer");

            //this header file will not allow the pdf to download on firefox or google chrome
            //header("Content-Type:application/pdf");

            header('Content-Type: application/octet-stream');
            header("Content-Disposition: inline; filename=".basename($url));
            //header('Content-Disposition: attachment; filename='.basename($url));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: no-cache, must-revalidate');
            header("Cache-Control: public"); 
            header('Content-Length: ' .filesize($url));
            
            flush();
            readfile($url);
           die();
         }
         else{
             echo "file not exist";
         }
    }else {
        //echo "Filename is not define";
    }
	?>
		<a href="index.php?path=uploads/4-bio-data.pdf" target="_blank"><button>download</button></a>
</body>
</html>