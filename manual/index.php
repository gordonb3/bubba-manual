<?php
$lang = $_GET['lang'];
if( ! $lang ) {
	$lang = 'en';
}

$file = "$lang/B2-manual.pdf"; 
if( file_exists( $file ) ) {
	header('Content-Type: ' . mime_content_type($file));
	header('Content-Disposition: inline; filename="Bubba manual.pdf"');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	header('Content-Transfer-Encoding: binary');
	ob_clean();
	flush();
	@readfile($file);
}
exit;
