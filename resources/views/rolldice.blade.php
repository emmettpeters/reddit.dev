<!DOCTYPE html>
<html>
<head>
	<title>Rolling Dice</title>
</head>
<body>
	<h1>Random Number 1-6 : <?= $rand ?></h1>
	<h1>Your Guess : <?= $guess ?></h1>
	<?php if($guess == $rand): ?>
		<h2>Your guess of <?= $guess ?> was correct!</h2> 
	<?php endif; ?>


</body>
</html>