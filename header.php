<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="A very, very simple version of Facebook, MySpace, Gmail, Blogger, Blogspot, all shoved into one." />
<meta name="keywords" content="fawong, fawong.com, blog, forums, Super Testing, SUPER TESTING, SUPER, super, TESTING, testing" />
<meta name="author" content="fawong.com, FAWONG.com, FAWONG, fawong" />
<meta name="rating" content="general" />
<meta name="revisit-after" content="5 Days" />
<meta name="robots" content="all" />
<!--
<meta name="copyright" content="Copyright &copy; <?php print ''.date("Y").'-'.(date("Y") + 1).'' ?> FAWONG. All Rights Reserved." />
<meta name="distribution" content="GLOBAL" />
<meta name="resource-type" content="document" />
-->
<title><?php
function title($pagetitle) {
  $GLOBALS["ptitle"] = $pagetitle;
}
//print var_dump($GLOBALS);
 print $cms_name;print $GLOBALS["ptitle"];?></title>
<?php
if ($settings['text_style'] == 1){
?>
<link rel="stylesheet" type="text/css" href="default.css" media="screen" />
<link rel="stylesheet" href="sIFR-screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="sIFR-print.css" type="text/css" media="print" />
<script src="sifr.js" type="text/javascript"></script>
<script src="sifr-addons.js" type="text/javascript"></script>
<?php
};
if ($act == 'login') {
?>
<link rel="stylesheet" type="text/css" href="themes/default/signin.css" media="screen" />
<?php
};
?>
<link href="themes/default/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="themes/default/navbar.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="icon" type="image/ico" href="/favicon.ico" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-ico" />
</head>
