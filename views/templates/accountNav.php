<div class="sectionNavigation drawerO">
  <ul>
    <a href="index.php"><li <?php if($isAccountIndex == 1) { echo 'class="currentPage"';} ?> >Details</li></a>
    <a href="changepassword.php"><li <?php if(pageURLContains($x = 'changepassword')) { echo 'class="currentPage"'; } ?>>Change Password</li></a>
    <a href="clan.php"><li <?php if(pageURLContains($x = 'clan')) { echo 'class="currentPage"'; } ?>>Clan</li></a>
  </ul>
</div>