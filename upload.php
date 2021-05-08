<?php

// File received by post or put methods
$path_upload = 'uploads/' . basename($_FILES['document']['name']);
$file_type = strtolower(pathinfo($path_upload, PATHINFO_EXTENSION));
$document_extensions = 'pdf';

// Move file from temp dir to path_upload
// open_basedir directive must be config on php.ini file
// Docx files aren't supported by ViewerJS, must be downloaded

if (move_uploaded_file($_FILES['document']['tmp_name'], $path_upload)) {
    echo "File uploaded on " . $path_upload;
    echo "<br>";
    if ($file_type == $document_extensions) {
        // ViewerJS only works with PDF
        echo "To see the document in other tab click here <a href=\"ViewerJS/#../" .
            $path_upload . "\" target=\"_blank\">" .
            $_FILES['document']['name'] .
            "</a>";
        echo "<br><br><br>";
        // Display an Iframe with the file
        echo "<iframe src =\"ViewerJS/#../" . $path_upload .
            "\" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>";
    } else {
        // Other files (no PDF) are display it with this format
        echo "To see the file in other tab click here <a href=\"" .
            $path_upload . "\" target=\"_blank\">" .
            $_FILES['document']['name'] .
            "</a>";
        echo "<iframe src =\"ViewerJS/#../" . $path_upload .
            "\" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe>";
    }
}
