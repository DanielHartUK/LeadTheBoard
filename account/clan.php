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

      <div class="clanContainer">
          <div class="warningBanner blue"><?php if(!isset($clanN)) { echo  "<span class='flaticon-error6'></span> You're not a member of any clans, join or create one."; } else { echo "You are a member of " . $clanN ;} //if(clan admin) { echo ' You are also an admin.'} ?> </div>
          <div class="clanList">
            <div class="clanSelect new">
              <div class="imageNew">Upload <br /> Emblem </div>  
              <h4> Create new clan </h4>
              <h4><input type="text" maxlength="16" name="newClan" id="newClanName" placeholder="Name"></h4> 
            </div><?php foreach($clans as $value){ ?><input type="radio" name="clanJoin" class="clanRadio" id="clan-<?php echo $value['ClanID'];?>"><div class="clanSelect existing clanID-<?php echo $value['ClanID']; // if($value['ClanID'] == $clanI) { echo ' selected'; } ?>" data-name="<?php echo $value['Name']; ?>">
                <img src="/assets/uploads/<?php echo $value['Emblem']; ?>">  
                <h4><?php echo $value['Name']; ?></h4> 
                <div class="clanMembers">
                  <!-- get 5 or so members of the clan --><a href="<?php echo SITE_URL . '/profile.php?user=' ;?>" ><img src="<!-- user image -->"></a>
                  </div>
              </div><?php } ?>
            <div class="boxButton">
              <?php if(isset($clanN)) { ?><input name='submit3' type='submit' value='Leave Clan' class="button red"><?php } ?>
              <?php if(!isset($clanN)) { ?><input name="" type="submit" class="button orange hidden" id="createNew" value="Create New"> 
              <input name="" type="submit" class="button blue hidden" id="joinClan" value="Join"><?php } ?>
            </div>
          </div>
      </div>
  </form>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
