<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<?php 
$lorem = new LoremIpsumGenerator();
?>

<div class="image-container">
<?php echo image_tag('photos/'.$imageName,'class="shadow"'); ?>
<div class="overlay-fluid">
<?php echo strip_tags($lorem->getContent(10)); ?>
</div>
</div>