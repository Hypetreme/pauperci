<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url();?>assets/css/skeleton.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
<title>Error</title>

<div class="error-container">
<h1><?php echo $heading;?></h1>
<?php echo $message;?>
	</div>