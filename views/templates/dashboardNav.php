<div class="sectionNavigation <?php if($admin == 1): echo 'drawerO'; endif; ?>">
  <ul>
    <a href="index.php"><li <?php if($isOverview) { echo 'class="currentPage"'; } ?>>Overview</li></a>
    <a href="classes.php"><li <?php if(pageURLContains($x = 'classes')) { echo 'class="currentPage"'; } ?>>Classes</li></a>
    <a href="achievements.php"><li <?php if(pageURLContains($x = 'achievements')) { echo 'class="currentPage"'; } ?>>Achievements</li></a>
    <a href="quests.php"><li <?php if(pageURLContains($x = 'quests')) { echo 'class="currentPage"'; } ?>>Quests</li></a>
    <a href="students.php"><li <?php if(pageURLContains($x = 'students')) { echo 'class="currentPage"'; } ?>>Students</li></a>
  </ul>
</div>