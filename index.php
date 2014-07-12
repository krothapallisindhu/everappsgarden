<?PHP
require_once("./dbaccess/membersite_config.php");
$fgmembersite->StartSession();

?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
   
    <!-- Header Section --> 
    <?php include "./common-head.inc" ?>   
    
    <body>
             
        <!-- Header Section --> 
        <?php include "header.inc" ?>   
             
        <div class="row" align="center">


            <div>
               
                <h1>Welcome to Taxi Booking</h1>
                
            </div>
        </div>



        <!--<div class="row">
            <div class="twelve columns">
                <div class="row">
                    <div class="eight columns">
                        <h3>30 Must-See HTML5 Tutorials to Help You Impress Your Audience</h3>
                        <p>
                            If you want to be a successful web developer or designer, you always have to be a step ahead. Sooner or later, HTML5 is going to strengthen its position even further and you want to be ready when that happens. Mastering the latest technology will allow you to experiment, push things further, and give you a considerable edge in the market.
                            <br /><br />
                            For this roundup we’ve prepared 30 fresh, brilliant and useful HTML5 tutorials from 2012 ranging from basic element explanation to advanced case studies.
                        </p>
                        <img src="images/30-html5-tutorials.jpeg" />
                        <hr />					
                    </div>

                    <div class="four columns">
                        <h4>1WD Books (click on image for video)</h4>

                        <!-- don't mind these, I just added them for fun! -->

               <!--         <a href="http://fast.wistia.com/embed/iframe/127055c478?version=v1&videoWidth=640&videoHeight=360&playButton=true&volumeControl=true&controlsVisibleOnLoad=true&autoPlay=true&popover=v1&plugin%5BpostRoll%5D%5Bversion%5D=v1&plugin%5BpostRoll%5D%5Btext%5D=Click%20To%20Get%20Free%20On%20Amazon&plugin%5BpostRoll%5D%5Blink%5D=http%3A%2F%2Fwww.amazon.com%2Fgp%2Fproduct%2FB0086I7XGM%2Fref%3Das_li_ss_tl%3Fie%3DUTF8%26tag%3D1stwebdesigne-20%26linkCode%3Das2%26camp%3D1789%26creative%3D390957%26creativeASIN%3DB0086I7XGM&plugin%5BpostRoll%5D%5Bstyle%5D%5BbackgroundColor%5D=%23616161&plugin%5BpostRoll%5D%5Bstyle%5D%5Bcolor%5D=%23ffffff&plugin%5BpostRoll%5D%5Bstyle%5D%5BfontSize%5D=36px&plugin%5BpostRoll%5D%5Bstyle%5D%5BfontFamily%5D=Gill%20Sans%2C%20Helvetica%2C%20Arial%2C%20sans-serif" class="coverimg wistia-popover[width=640,height=360,playerColor=#636155]"><img src="http://cdn1.1stwebdesigner.com/wp-content/themes/1stwd/pics/ebook_3_respnv.jpg" width="93" height="124" alt="Responsive Web Site Design, How To Get Your Site Ready For Every Device And Browser" /></a>
                        <a href="http://fast.wistia.com/embed/iframe/c1e5fe9388?version=v1&videoWidth=640&videoHeight=360&playButton=true&volumeControl=true&controlsVisibleOnLoad=true&autoPlay=true&popover=v1&plugin%5BpostRoll%5D%5Bversion%5D=v1&plugin%5BpostRoll%5D%5Btext%5D=Click%20To%20Get%20Free%20On%20Amazon&plugin%5BpostRoll%5D%5Blink%5D=http%3A%2F%2Fwww.amazon.com%2Fgp%2Fproduct%2FB0086MEWHQ%2Fref%3Das_li_ss_tl%3Fie%3DUTF8%26tag%3D1stwebdesigne-20%26linkCode%3Das2%26camp%3D1789%26creative%3D390957%26creativeASIN%3DB0086MEWHQ&plugin%5BpostRoll%5D%5Bstyle%5D%5BbackgroundColor%5D=%23616161&plugin%5BpostRoll%5D%5Bstyle%5D%5Bcolor%5D=%23ffffff&plugin%5BpostRoll%5D%5Bstyle%5D%5BfontSize%5D=36px&plugin%5BpostRoll%5D%5Bstyle%5D%5BfontFamily%5D=Gill%20Sans%2C%20Helvetica%2C%20Arial%2C%20sans-serif" class="coverimg wistia-popover[width=640,height=360,playerColor=#636155]"><img src="http://cdn1.1stwebdesigner.com/wp-content/themes/1stwd/pics/ebook_2_html5.jpg" width="93" height="124" alt="Learn HTML5 Website Basic Features And Elements In 1 Day" /></a>
                        <a href="http://fast.wistia.com/embed/iframe/813e11baca?version=v1&videoWidth=640&videoHeight=360&playButton=true&volumeControl=true&controlsVisibleOnLoad=true&autoPlay=true&popover=v1&plugin%5BpostRoll%5D%5Bversion%5D=v1&plugin%5BpostRoll%5D%5Btext%5D=Click%20To%20Get%20Free%20On%20Amazon&plugin%5BpostRoll%5D%5Blink%5D=http%3A%2F%2Fwww.amazon.com%2Fgp%2Fproduct%2FB0086MH6XS%2Fref%3Das_li_ss_tl%3Fie%3DUTF8%26tag%3D1stwebdesigne-20%26linkCode%3Das2%26camp%3D1789%26creative%3D390957%26creativeASIN%3DB0086MH6XS&plugin%5BpostRoll%5D%5Bstyle%5D%5BbackgroundColor%5D=%23616161&plugin%5BpostRoll%5D%5Bstyle%5D%5Bcolor%5D=%23ffffff&plugin%5BpostRoll%5D%5Bstyle%5D%5BfontSize%5D=36px&plugin%5BpostRoll%5D%5Bstyle%5D%5BfontFamily%5D=Gill%20Sans%2C%20Helvetica%2C%20Arial%2C%20sans-serif" class="coverimg wistia-popover[width=640,height=360,playerColor=#636155]"><img src="http://cdn1.1stwebdesigner.com/wp-content/themes/1stwd/pics/ebook_1_wdt.jpg" width="93" height="124" alt="Latest Web Design Trends, The Road To Good Website Design" /></a>
                        <br />
                        <hr />
                        <img src="images/ad-banner.png" />
                    </div>
                </div>
            </div>
        </div> -->

             
        <!--Footer Section --> 
        <?php include "footer.inc" ?>   
             
    
    </body>
