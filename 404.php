<?php session_start();
require_once("config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
$e404 = 1;

?>

	<div class="content c404 <?php if($admin == 1): echo 'admin'; endif; ?>">
		<div class="e404">
			<div class="invaders">
				<div class="row1">
					<div class="invader space1dead"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1"></div>
					<div class="invader space1"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1dead"></div>
					<div class="invader space1"></div>
					<div class="invader space1dead"></div>
				</div>
				<div class="row2">
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
				</div>
				<div class="row3">
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
					<div class="invader space2"></div>
					<div class="invader space2dead"></div>
				</div>
				<div class="row4">
					<div class="invader space3"></div>
					<div class="invader space3"></div>
					<div class="invader space3"></div>
					<div class="invader space3"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3"></div>
					<div class="invader space3"></div>
					<div class="invader space3"></div>
					<div class="invader space3"></div>
				</div>
				<div class="row5">
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3" id="murderer"></div>
					<div class="invader space3"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3dead"></div>
					<div class="invader space3"></div>
					<div class="invader space3dead"></div>
				</div>
			</div>
			<div class="missiles">
				<div class="missile"></div>
			</div>
			<p class="message"> Page not found </p>
			<div class="bunkers">
				<div class="bunker"></div>
				<div class="bunker"></div>
				<div class="bunker"></div>
				<div class="bunker"></div>
			</div>
			<div class="players">
				<div class="player">
			</div>
		</div>
	</div>

<?php 
include_once(TEMPLATES_PATH . "/footer.php"); 
?>
