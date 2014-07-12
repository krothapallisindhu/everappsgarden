 <!DOCTYPE html>
<html lang="en">
  <head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>

$(document).ready(function() {  

    //select all the a tag with name equal to modal
    $('a[name=modal]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();

        //Get the A tag
        var id = $(this).attr('href');

        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

        //Set heigth and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});

        //transition effect     
        $('#mask').fadeIn(1000);    
        $('#mask').fadeTo("slow",0.9);  

        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        $(id).css('top',  winH/3-$(id).height()/3);
        $(id).css('left', winW/2-$(id).width()/2);

        //transition effect
        $(id).fadeIn(2000); 

    });

    //if close button is clicked
    $('.window .close').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();

        $('#mask').hide();
        $('.window').hide();
    });     

    //if mask is clicked
    $('#mask').click(function () {
        $(this).hide();
        $('.window').hide();
    });         

    $(window).resize(function () {

        var box = $('#boxes .window');

        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});

        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);

    });

});

</script>

 <script type="text/javascript"> 
function ConfirmDelete()
{
var confirm = document.getElementById('confirm').value;
var dataString = 'password='+ confirm;
if(confirm.length>0)

{

$.ajax({
type: "GET",
url: "delete.php",
data: dataString,
success: function(server_response)
{
 document.getElementById("results").style.display = "block";
$('#results').html(server_response).show();
$('#mask').hide();
$('.window').hide();

}
});

}
return false;
}

</script>
<style type="text/css">
#mask{position:absolute;left:0;top:0;z-index:9000;background-color:#222;display:none}
.window{position:fixed;left:0;top:0;width:450px;height:200px;display:none;z-index:9999;padding:20px}
#dialog1{padding:10px 10px 8px 25px;border:2px solid #a1a1a1;width:450px;height:200px; background-image:url('imgs/bg.jpg');

</style>
  </head>
  <body>
 <a href="#dialog1" name="modal">Delete this Entry</a> 
 <!-- Start of MODAL BOX -->  
<div id="dialog1" class="window" align="center">
<font color="#FFFFFF">If you are sure you wish to delete this please enter your admin password</font><br>
<font color="#FFFFFF"><b>test password ( Admin )</b></font>
<input type="password" id="confirm"/><br><br>
<input type="submit" name="confirm_delete" onclick="ConfirmDelete()"  value="Confirm Delete">
</div><!-- End of MODAL BOX --> 
<div id="mask"></div><!-- Mask to cover the whole screen -->



<div id="results" class="results" style="display:none;"> </div>

  </body>
</html>