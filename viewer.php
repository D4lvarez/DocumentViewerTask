<?php
$pathFile = $_POST['path'];

// Files must be inside project directory

// Verify if file exists
if (!is_readable($pathFile)) {
	http_response_code(404);
	echo "Cannot find that file";
	die();
}

// Verify if extensions file to show
$fileExtension = strtolower(pathInfo($pathFile, PATHINFO_EXTENSION));

switch($fileExtension) {
	case "pdf":
		// Header Config for PDF Files
		//header("Content-type: application/pdf");
		//header("Content-Disposition: inline; filename=$pathFile");
		//header("Content-Length: ".filesize($pathFile));

		// Send File to Browser
		//readfile($pathFile);
		echo "<embed src='$pathFile' type='application/pdf' width='80%' height='600px' />";
		break;
	case "png":
		header("Content-type: image/png");
		header("Content-Disposition: inline; filename=$pathFile");
		header("Content-Length: ".filesize($pathFile));

		// Send Image to Browser
		echo file_get_contents($pathFile);
		// echo "<embed src='$pathFile' type='image/png' width='80%' height='600px' />";
		break;

	case "jpeg":
	case "jpg":
		header("Content-type: image/jpeg");
		header("Content-Disposition: inline; filename=$pathFile");
		header("Content-Length: ".filesize($pathFile));

		// Send Image to Browser
		echo file_get_contents($pathFile);
}




?>
