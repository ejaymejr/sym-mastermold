<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<div class="contentBox">
<table class="table bordered">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><?php echo link_to('<i class="icon-home"></i>','home/index') ?></li>
			<li class=" "><a id="save" href="<?php echo url_for('home/reportA4') ?>" class="" >PDF A4 Size</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('home/report3Perforation') ?>" class="" >PDF 3Horizontal Perforation</a></li>
			<li class=" "><a id="save" href="<?php echo url_for('home/reportProtected') ?>" class="" >PDF Protected (non-printable)</a></li>
			<li><a href="#">&nbsp;</a></li>
			</ul>
		</nav
	</td>
</tr>
</table>
<table class="table bordered">
<tr>
	<td class="span3 alignCenter bg-clearBlue"><h2>Printing for A4 Sizes</h2></td>
	<td class="span3 alignCenter bg-clearBlue"><h2>Printing for Payslip Size</h2></td>
	<td class="span6 alignCenter bg-clearBlue"><h2>Custom Printing</h2></td>
</tr>
<tr>
	<td><?php echo link_to(image_tag('a4size.jpg', 'height="100" width="200"'), 'home/reportA4') ?></td>
	<td><?php echo link_to(image_tag('PF17.jpg', 'height="100" width="200"'),'home/report3Perforation') ?></td>
	<td class="alignCenter">
<pre class="prettyprint linenums">
Printing can be customize during printing
or during the creation of the pdf document.
Continous Paper Printing is also supported.
PDF Document Can also be protected with Password.
</pre>
	<br>
	<a href="<?php echo url_for('home/reportProtected') ?>">
	<button class="command-button success">
	<i class="icon-printer on-left"></i>
	Print a Password protected PDF
	<small>Password is 'allowed'</small>
	</button>
	</a>
	</td>
</tr>
</table>
</div>