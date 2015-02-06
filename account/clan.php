<?php 
require_once("../config.php");
include_once(TEMPLATES_PATH . "/header.php"); 
$isAccountIndex = 0;
require_once(INCLUDES_PATH . "/clan.php");
?>
<script type="text/javascript">
function readPicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#emblemPreview')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div class="content">
  <h1> Account </h1>
  <?php include_once(TEMPLATES_PATH . "/accountNav.php"); ?>
  <form name='clan' action='' method=post ENCTYPE="multipart/form-data">
    <?php if(!isset($clanN)) { ?>
      <div class="warningBanner blue"> You aren't a member of any clan.</div>
      <div class="clanContainer">
        <div class="clanBox">
          <div class="boxTitle"> Join clan </div>

        </div><div class="clanBox">
          <div class="boxTitle"> Create clan </div>

        </div>
      </div>
    <?php } else { ?>
      <div class="clanCont">
        <img src="/assets/uploads/<?php echo $emblem; ?>" class="clanEmblem">
        <h3> <?php echo $clanN; ?> </h3>
        <input name='submit3' type='submit' value='Leave Clan' class="button red">
      </div>
    <?php } ?>
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
