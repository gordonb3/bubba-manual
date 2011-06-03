<?php
$lang = $_GET['lang'];
if( ! $lang ) {
	$lang = 'en';
}

$file = "$lang/Getting_Started.pdf"; 
if(! file_exists( $file ) ) {
	$file = "en/Getting_Started.pdf"; 
}
if( file_exists( $file ) ) {
	header('Content-Type: ' . mime_content_type($file));
	header('Content-Disposition: inline; filename="Getting Started.pdf"');
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
