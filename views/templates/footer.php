    <div class="footer <?php if($admin == 1): echo 'admin'; endif; ?>">
	    <ul class="footerLinks">
	    	<li><div class="flaticon-aries1 gallop"></div> </li>
	    	<a href="<?php echo SITE_URL; ?>/about/"><li>About</li></a>
	    	<a href="<?php echo SITE_URL; ?>/about/support.php"><li>Support</li></a>
	    	<li class="copyright">&#169; <script>document.write(new Date().getFullYear())</script> LeadTheBoard! </li>
	    </ul>
    </div>
</div> <!-- End Content Container -->
</div><!-- End Wrapper -->
    <script src="<?php echo SITE_URL; ?>/js/scripts.js"></script>
    <?php if($admin == 1): ?> <script src="<?php echo SITE_URL; ?>/js/admin.js"></script> <?php endif; ?>
    <?php if(pageURLContains($x = 'dashboard')): ?> <script src="<?php echo SITE_URL; ?>/js/dashboard.js"></script> <?php endif; ?>
    <?php if(pageURLContains($x = 'achievements') OR pageURLContains($x = 'quests')) {
		echo '<script> highlightUnlockableLoad() </script>';
	} ?>
</body>
</HTML>