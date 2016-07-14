<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>
	$(function(){
       $("#carousel1").carousel({
          height: 530,
          period: 5000,
          duration: 500,
          effect: "fade",
          markers: {
        	  type: "cycle",
        	  show: true,
        	  position: "bottom-center"
        	  }
       });
	})
</script>
      <div class=" no-tablet-portrait" style="height: 0px;">
      <nav>
          <ul class="side-menu" data-effect='fade'>
          <li><?php echo link_to('Standard Form', 'home/standardFormSearch', array('data-hints'=>"Standard HTML Forms") ) ?></li>
          <li><?php echo link_to('Ajax', 'home/ajax', array('data-hints'=>"Ajax Update Areas of the Screen") ) ?></li>
          <li><?php echo link_to('Chart', 'home/chart', array('data-hints'=>"Show Data Trends")) ?></li>
          <li><?php echo link_to('Report', 'home/report', array('data-hints'=>"Printing of Reports in Various Forms")) ?></li>
          <li><a href="#_photography">Apple Store Apps</a></li>
          <li><a href="#_photography">Photography</a></li>
          <li><a href="#_funrun">Fun Run</a></li>
          <li class="divider"></li>
          <li  class="menu-title">&nbsp;&nbsp;<div class="fb-like" data-href="https://www.facebook.com/eman.jayme" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
          </li>
          </ul>
       </nav>
    </div>
<?php 
$lorem = new LoremIpsumGenerator();
?>
<div class="carousel bg-gray " id="carousel1">
    <div class="slide" >
    	<div class="alignCenter span14 image-container.full-size">
    	<?php echo image_tag('index/1.jpg','class="shadow"'); ?>
    	</div>
    	<div class="markers ">
			<ul class="active">
				<li><?php //echo $lorem->getContent(50); ?></li>
			</ul>
		</div>
			
    </div>
     
    <div class="slide ">
    	<div class="alignCenter">
    	<?php echo image_tag('index/2.jpg','class="shadow"'); ?>
    	</div>
    </div>
    
    <div class="slide">
    	<div class="alignCenter">
    	<?php echo image_tag('index/3.jpg','class="shadow"'); ?>
    	</div>
    </div>
    
    <div class="slide">
    	<div class="alignCenter">
    	<?php echo image_tag('index/4.jpg','class="shadow"'); ?>
    	</div>
    </div>
    
    <div class="slide">
    	<div class="alignCenter">
    	<?php echo image_tag('index/5.jpg','class="shadow"'); ?>
    	</div>
    </div>
    
     
    <a class="controls left"><i class="icon-arrow-left-3"></i></a>
    <a class="controls right"><i class="icon-arrow-right-3"></i></a>
</div>
<div class="drawBox">
	<div class="grid fluid">
    <div class="row">
	    <div class="span4">
	    	<div class="panel ">
			<div class="panel-header bg-lightBlue fg-white">
			Application Programmer
			</div>
			<div class="panel-content">
			<?php echo $lorem->getContent(50); ?>
			</div>
			</div>
	    </div>
	    
		<div class="span4">
			<div class="panel ">
			<div class="panel-header bg-lightOlive fg-white">
			System Administrator
			</div>
			<div class="panel-content">
			<?php echo $lorem->getContent(50); ?> 
			</div>
			</div>
		</div>
		
		<div class="span4">
			<div class="panel ">
			<div class="panel-header bg-lightGreen fg-white">
			Data Recovery Engineer
			</div>
			<div class="panel-content">
			<?php echo $lorem->getContent(50); ?>  
			</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="">
			<a href="https://www.facebook.com/eman.jayme" target="_BLANK" data-hint="my facebook Account" data-hint-position="right">
			<div class="tile half bg-darkBlue" data-click="transform"  >
			<div class="tile-content icon" >
			<i class="icon-facebook"></i>
			</div>
			<div class="tile-status">
				<span class="name"></span>
			</div>
			</div>
			</a>
		</div>
		<div class="">
			<a href="https://twitter.com/ejaymejr" target="_BLANK" data-hint="follow me on Twitter" data-hint-position="right">
			<div class="tile half bg-blue" data-click="transform">
			<div class="tile-content icon">
			<i class="icon-twitter"></i>
			</div>
			<div class="tile-status">
				<span class="name"></span>
			</div>
			</div>
			</a>
		</div>
		<div class="">
			<a href="https://mail.google.com/mail/?view=cm&ui=2&tf=0&fs=1&to=ejaymejr%40gmail.com&su=SUBJECTHERE&body=LINE1%0aLINE2" target="_BLANK" data-hint="gmail sendTo" data-hint-position="right">
			<div class="tile half bg-red" data-click="transform">
			<div class="tile-content icon">
			<i class="icon-mail "></i>
			</div>
			<div class="tile-status">
				<span class="name"></span>
			</div>
			</div>
			</a>
		</div>
		<div class="">
			<a href="https://www.flickr.com/photos/ejayme/sets/72157631716539433/" target="_BLANK" data-hint="Flickr" data-hint-position="right">
			<div class="tile half bg-darkIndigo" data-click="transform">
			<div class="tile-content icon">
			<i class="icon-flickr"></i>
			</div>
			<div class="tile-status">
				<span class="name"></span>
			</div>
			</div>
			</a>
		</div>
		
		
	</div>
</div>
</div>