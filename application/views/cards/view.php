<title><?php echo $card['details']['name']?></title>
<div class="container">
<?php if (isset($card['details']['name'])) { ?>

<div class="preview-single">
<div class="card-frame">

<?php echo '<img class="lazyload" src="'.base_url().'assets/images/back.jpg" data-src='.$card['details']['url'].'>';?>
	
</div><div class="info">
</div>
<div class="oracle"></div>
</div>
<?php } ?>

</div>
