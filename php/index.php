<html>
 <head>
  <title>Main Page</title>
 </head>
 <body>
	<?php
		$menuarray = ['Hypotenuse','Volume','Water','Dot Product','Doubles','Duplicates',
		'Remove Duplicates','Translation','Sum Product','Articles','Color List','Positive List',
		'Max','Nest Level','Square Numbers','Youngest Person'];
		$counter = 1;
	?>
		<ol>
			<?php foreach ($menuarray as $item) { ?>
			<li><a href="/problemset/problem<?php echo $counter;?>.php"><?php echo $item; ?></a></li>
			<?php $counter+=1;?>
			<?php } ?>
		</ol>
 </body>
</html>
