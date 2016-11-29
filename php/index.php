<html>
 <head>
  <title>Main Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
  console.log("Welcome to the main page.");
  </script>
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
			<li><a href="/server/problem<?php echo $counter;?>.php" id="<?php echo $item;?>"><?php echo $item; ?></a></li>
			<?php $counter+=1;?>
			<?php } ?>
      <li><a href="/server/quiz.php">Quiz Problem</a></li>
		</ol>
 </body>
</html>
