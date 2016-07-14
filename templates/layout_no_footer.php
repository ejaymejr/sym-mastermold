<?php use_helper('Javascript'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns:fb="http://app.microncleansingapore.com">
<head>
<div class="loader"></div>
<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>
<?php print_r(include_metas()); ?>
<script>
$('body').on({
    'mousewheel': function(e) {
        if (e.target.id == 'el') return;
        e.preventDefault();
        e.stopPropagation();
    }
})
</script>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body class="metro" >
	<div class="container"><br>
			<?php echo $sf_data->getRaw('sf_content') ?>
	</div>
</div>
</body>
</html>