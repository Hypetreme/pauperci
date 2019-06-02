<title>All Commons</title>
<div class="container">
<div class="nav-up">

<!--Next Page Button-->
<?php if ($page_num != 1) {?>
<input type="submit" value="<Previous" class="page-button" 
onclick="window.location.href=<?php echo $page_num-1; ?>">
<?php } ?>

<!--Previous Page Button-->
<?php if ($next_exists == TRUE) {?>
<input type="submit" value="Next>" class="page-button" 
onclick="window.location.href=<?php echo $page_num+1; ?>">
<?php } ?>
</div>

<div class="all-cards">
<?php foreach ($card as $card): ?>

<div class="preview">

	<?php echo anchor('view/'.$card['link'].'', '<img class="lazyload card-image" src="'.base_url().'assets/images/back.jpg" data-src='.$card['url'].'>', '') ?>
</div>
<?php endforeach; ?>

</div></div></html>