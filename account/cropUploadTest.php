<style>
.container
{
    position: absolute;
    top: 10%; left: 10%; right: 0; bottom: 0;
}
.action
{
    width: 400px;
    height: 30px;
    margin: 10px 0;
}
.cropped>img
{
    margin-right: 10px;
}

.imageBox
{
    position: relative;
    height: 400px;
    width: 400px;
    border:1px solid #aaa;
    background: #fff;
    overflow: hidden;
    background-repeat: no-repeat;
    cursor:move;
}

.imageBox .thumbBox
{
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200px;
    height: 200px;
    margin-top: -100px;
    margin-left: -100px;
    border: 1px solid rgb(102, 102, 102);
    box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
    background: none repeat scroll 0% 0% transparent;
}

.imageBox .spinner
{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    text-align: center;
    line-height: 400px;
    background: rgba(0,0,0,0.7);
}
</style>
<script src="../include/jquery-2.1.1.min.js"></script>
<script src="../cropbox-min.js"></script>

<div class="container">
    <div class="imageBox">
        <div class="picBox"></div>
        <div class="spinner" style="display: none">Loading...</div>
    </div>
    <div class="action">
        <input type="file" id="file1" style="float:left; width: 250px">
        <input type="button" id="btnCrop" value="Crop" style="float: right">
    </div>
    <div class="cropped">
<div>

<script language="javascript">
$(window).load(function() {
    var options =
    {
        thumbBox: '.picBox',
        spinner: '.spinner',
        imgSrc: 'avatar.png'
    }
    var cropper;
    $('#file1').on('change', function(){
        var reader = new FileReader();
        reader.onload = function(e) {
	    alert(e.target.result);
            options.imgSrc = e.target.result;
            cropper = $('.imageBox').cropbox(options);
        }
        reader.readAsDataURL(this.files[0]);
        this.files = [];
    })
    $('#btnCrop').on('click', function(){
        var img = cropper.getDataURL()
        $('.cropped').append('<img src="'+img+'">');
    })
  });
</script>
