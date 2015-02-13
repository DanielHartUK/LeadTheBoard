<div class="sectionNavigation">
  <ul>
    <a><li <?php if(!isset($_GET['step'])) { echo 'class="currentPage"';} ?>>Step 1</li></a>
    <a><li <?php if(isset($_GET['step'])) { if($_GET['step'] == 2) { echo 'class="currentPage"'; } } ?>>Step 2</li></a>
    <a><li <?php if(isset($_GET['step'])) { if($_GET['step'] == 3) { echo 'class="currentPage"'; } } ?>>Step 3</li></a>
    <a><li <?php if(isset($_GET['step'])) { if($_GET['step'] == 4) { echo 'class="currentPage"'; } } ?>>Step 4</li></a>
    <a><li <?php if(isset($_GET['step'])) { if($_GET['step'] == 5) { echo 'class="currentPage"'; } } ?>>Complete</li></a>
  </ul>
</div>

