
	<?php if($admin = 1) { echo '</div> '; } ?> 
</div> <!-- End Content Container -->
</div><!-- End Wrapper -->
    <script src="<?php echo SITE_URL; ?>/js/scripts.js"></script>
    <?php if($admin == 1): ?> <script src="<?php echo SITE_URL; ?>/js/admin.js"></script> <?php endif; ?>
    <?php if(pageURLContains($x = 'dashboard') or pageURLContains($x = 'profile')): ?> <script src="<?php echo SITE_URL; ?>/js/dashboard.js"></script> <?php endif; ?>
    <?php if(isset($login)): ?> <script src="<?php echo SITE_URL; ?>/js/login.js"></script> <?php endif; ?>
    <?php if(pageURLContains($x = 'account') or isset($profileSetup)): ?> <script src="<?php echo SITE_URL; ?>/js/account.js"></script> <?php endif; ?>
    <?php if(isset($e404)): ?> <script src="<?php echo SITE_URL; ?>/js/e404.js"></script> <?php endif; ?>
    <?php if(pageURLContains($x = 'achievements') OR pageURLContains($x = 'quests')) {
		echo '<script> highlightUnlockableLoad() </script>';
	} ?>
</body>
</HTML>