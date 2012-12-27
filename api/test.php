<?php include('api.inc.php'); ?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php
			print_r(HaloStatus::getPlayers("46.249.47.12", "2332"));
		?>
	</body>
</html>