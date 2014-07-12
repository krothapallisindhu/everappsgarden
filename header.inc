
<script src="javascripts/home_page_actions.js"></script>

<div class="row">
    <div class="eight columns" align="left">
        <p align="center"><h2>everappsgarden</h2></p>
    </div>
    <div class="two columns" align="right">

        <br/><br/>

        <!--PHP starts-->
        <?PHP
        require_once("./dbaccess/membersite_config.php");
        require_once("./website-model/fg_membersite.php");

        if ($fgmembersite->CheckLogin()) {
            ?><!--PHP ends-->


            <!--HTML starts-->
            <p>
                Logged in as: <?= $fgmembersite->UserFullName() ?>
                <a href='logout.php'>Logout</a>
            </p>
            <p>
            </p>        
            <!--HTML Ends-->

            <!--PHP starts-->
            <?PHP
        } else {
            ?><!--PHP ends-->

            <!--HTML starts-->
            <input type="button" value="Login" onclick="window.location.href = 'login.php';"> 
            <!--HTML Ends-->


            <!--PHP starts-->
    <?PHP
}
?><!--PHP ends-->
    </div>
</div>


<div class="row">
    <div class="twelve columns">
        <ul class="nav-bar">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="consulting.php">Consulting</a></li>
            <li><a href="training.php">Training</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="investors.php">Investors</a></li>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="careers.php">Careers</a></li>
            <li><a href="contatus.php">Contact Us</a></li>
        </ul>

    </div>
</div>