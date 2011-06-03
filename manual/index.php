<?php
$lang = $_GET['lang'];
if( ! $lang ) {
	$lang = 'en';
}

$type = $_GET['type'];
switch( $type ) {
case 'start':
    $filename = 'Getting_Started.pdf';
    break;
case 'manual':
default:
    $filename = 'Manual.pdf';
    break;
}

$file = "$lang/$filename";
if(! file_exists( $file ) ) {
	$file = "en/$filename";
}
if( file_exists( $file ) ) {
	header('Content-Type: ' . mime_content_type($file));
	header("Content-Disposition: inline; filename=\"$filename\"");
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	header('Content-Transfer-Encoding: binary');
	ob_clean();
	flush();
	@readfile($file);
} else {
	print "No document available";
}
exit;
