<?php 
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


<!--
			<p> Page not found. Try again or contact support </p>
			<p> Seite nicht gefunden. Versuchen Sie es erneut oder wenden Sie sich Unterstützung </p>
			<p> Page non trouvée . Essayez à nouveau ou contactez le support </p>
			<p> Página no encontrada . Inténtalo de nuevo o póngase en contacto con soporte </p>
			<p> Pagina non trovata . Riprovare o contattare il supporto </p>
			<p> Página não encontrada . Tente novamente ou entre em contato com o suporte </p>
			<p> ページが見つかりません。もう一度試すか、サポートにお問い合わせください </p>
			<p> 페이지를 찾을 수 없습니다 . 다시 시도하거나 지원 센터에 문의 </p>
			<p> 找不到网页。重试或与支持 </p>
			<h3> E404 </h3>
			<a href="<?php echo SITE_URL; ?>/about/support.php"><p> <?php echo SITE_URL; ?>/about/support.php </p></a>
-->