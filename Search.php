<?php
	require_once "start.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Поиск</title>
<link href="CSS\Style.css" type="text/css" rel="stylesheet">
<link rel="shortcut icon" href="Images\orden.png" type="image/png">
</head>
<body>
	<?php
		require_once"Blocks/top.php";
	?>	
	<div class="main">
		<div class = text>	
			<?php
				require_once"Blocks/full_search.php";
			?>
		</div>
	</div>
	<div>	
		<?php
			require_once"Blocks/basement.php";
		?>
	</div>	
</body>
</html>