<?php
if(empty($_POST['filename']) || empty($_POST['content'])){
    exit;
}

// Sanitizing the filename:
$filename = preg_replace('/[^a-z0-9\-\_\.]/i','',$_POST['filename']);

// Outputting headers:
header("Cache-Control: ");
header("Content-type: text/plain");
header('Content-Disposition: attachment; filename="'.$filename.'"');

$myfile = fopen("files/newfile.svg", "w") or die("Unable to open file!");
$txt = $_POST['content'];
fwrite($myfile, $txt);
fclose($myfile);

echo $_POST['content'];

?>