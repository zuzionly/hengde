<?php

// loads wordpress
require_once('get_wp.php'); // loads wordpress stuff

// gets shortcode
$shortcode = base64_decode( trim( $_GET['sc'] ) );

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
<?php wp_head(); ?>
<style type="text/css">
html {
margin: 0 !important;
}
body {
padding: 20px 15px;
min-width:160px !important;
background:#FFF !important;
}
.tt-icon {
padding:5px 0 40px 55px !important;
}

.notification {
width:87% !important;	
}
</style>
</head>
<body>
<?php echo do_shortcode( $shortcode ); ?>
</body>
</html>