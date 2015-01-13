function loadLeaderboard() {
  $.get( "../views/ajax/leaderboard.php" );
}
function loadActivity() {
  $( ".mainBlock" ).load( "../views/ajax/activity.php" );
}
