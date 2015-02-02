    <div class="footer">
	    <ul class="footerLinks">
	    	<li><div class="flaticon-aries1 gallop"></div> </li>
	    	<a href="/views/about/support"><li>Support</li></a>
	    	<a href="/views/about/contact"><li>Contact</li></a>
	    	<li class="copyright">&#169; <script>document.write(new Date().getFullYear())</script> LeadTheBoard! </li>
	    </ul>
    </div>
</div> <!-- End Content Container -->
</div><!-- End Wrapper -->
    <script src="../js/scripts.js"></script>
    <?php if($admin == 1): ?> <script src="../js/admin.js"></script> <?php endif; ?>
    <?php if(pageURLContains($x = 'achievements') OR pageURLContains($x = 'quests')) {
		echo '<script> highlightUnlockableLoad() </script>';
	} ?>
</body>
</HTML>