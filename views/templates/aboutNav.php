<div class="sectionNavigation <?php if($admin == 1): echo 'drawerO'; endif; ?>">
  <ul>
    <a href="index.php"><li <?php if($isAbout) { echo 'class="currentPage"'; } ?>>About</li></a>
    <a href="support.php"><li <?php if(pageURLContains($x = 'support')) { echo 'class="currentPage"'; } ?>>Support</li></a>
    <a href="bugs.php"><li <?php if(pageURLContains($x = 'bugs')) { echo 'class="currentPage"'; } ?>>Bugs</li></a>
  </ul>
</div>