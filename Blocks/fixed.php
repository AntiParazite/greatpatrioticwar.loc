<div>
	
	<?php
		if(checkUser($_SESSION["Login"],$_SESSION["Password"]))
			require_once "Blocks/user_panel.php";
		else
			require_once "Blocks/auth_form.php";
		$a = rand(1,29);
		echo "<audio id=player loop controls preload>";
  			echo "<source src=Audio\Песня_$a.mp3 type=audio/mpeg>";
		echo "</audio>";
	?>
	
</div>