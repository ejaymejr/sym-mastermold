<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<?php include_partial('chart_barline') ?>     
<?php include_partial('chart_line_smooth') ?>     
<?php include_partial('chart_pie') ?>     
<div class="contentBox">
<table class="table bordered">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><?php echo link_to('<i class="icon-home"></i>','home/index') ?></li>
			<li><a href="#">&nbsp;</a></li>
			</ul>
		</nav
	</td>
</tr>
</table>
	<h2>Chart: Bar + Line</h2>
	<div id="chartbarline" style="width:600px; height:400px;"></div>
	<br>
	<h2>Chart: Line Smooth</h2>
	<div id="chartlinesmooth" style="width:100%; height:400px;"></div>
	<br>
	<h2>Chart: Pie</h2>
	<div id="chartpie" style="width: 100%; height: 400px;"></div>
</div>