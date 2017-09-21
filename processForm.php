<?php
include 'contactFormValues.php';

$success = false;
$senderName = isset($_POST['senderName']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName']) : "";
$senderEmail = isset($_POST['senderEmail']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail']) : "";
$message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";

// If all values exist, send the email
if ($senderName && $senderEmail && $message) {
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
    $headers = "From: " . $senderName . " <" . $senderEmail . ">";
    $success = mail($recipient, EMAIL_SUBJECT, $message, $headers);
}

// Return an appropriate response to the browser
if (isset($_GET["ajax"])) {
    echo $success ? "success" : "error";
} else {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Breathe</title>
            <!--        META SECTION-->

            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false" />
            <meta name="apple-mobile-web-app-capable" content="yes" />



            <!--        STYLES SECTION -->

            <link rel="stylesheet" href="css/jquery.mobile-1.0.min.css" /> 
            <link rel="stylesheet" href="css/lightGreen.css" />

            <!--        FONTS SECTION -->

            <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>




            <!--        SCRIPT SECTION -->

            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/jquery.mobile-1.0.min.js"></script> 

        </head>
        <body>
            <!--    Page initialization      -->
            <div data-role="page">



                <!--            Header-->
                <header data-role="header">
                    <h1>Breathe</h1>
                    <nav class="ui-grid-c">
                        <div class="ui-block-a"><a href="index.html" data-transition="flip">Home</a></div>
                        <div class="ui-block-b"><a href="portfolio.html" data-transition="flip">Portfolio</a></div>
                        <div class="ui-block-c"><a href="blog.html" data-transition="flip">Blog</a></div>
                        <div class="ui-block-d"><a class="navSelected" href="contact.html" data-transition="flip">Contact</a></div>
                    </nav>
                    <hr class="divider" />
                </header>
                <!--         Heder     END  -->




                <!--            Main Content-->
                <section data-role="content" class="wrappedWidth">
                    <section id="contact">
                        <img class="mainIMG" src="images/refimages/message.jpg" alt="Sent Successfuly" />
                        <h2>Success</h2>
                        <div class="article-wrapper">
                            <p>Your e-mail was sent successfully, we will get in touch with you as soon as possible.</p>
                            <hr />
                            <a href="contact.html">« Back</a>
                        </div>
                    </section>
                </section>
                <!--  Main Content     END  -->





                <!--         Footer   -->
                <footer data-role="footer" data-theme="a" data-position="inline">
                    <hr class="divider" />
                    <h4>Follow me on</h4>
                    <div class="ui-grid-c wrappedWidth shareIcons">
                        <div class="ui-block-a"><a href="#"><img src="images/lightGreen/fb.png" alt="Facebook" /></a></div>
                        <div class="ui-block-b"><a href="#"><img src="images/lightGreen/digg.png" alt="Digg" /></a></div>
                        <div class="ui-block-c"><a href="#"><img src="images/lightGreen/twitter.png" alt="Twitter" /></a></div>
                        <div class="ui-block-d"><a href="#"><img src="images/lightGreen/rss.png" alt="RSS" /></a></div>
                    </div>

                    <h4>Text Widget</h4>
                    <p>Dit augue est, elementum id commodo sit amet, pellentesque vel mi.
                        Nulla eu ante id ligula posuere pellentesque. Vivamus rhoncus mattis tellus
                        vitae pretium. Vestibulum ullamcorper congue nisl eget suscipit. Aenean feugiat odio 
                        a velit scelerisque consequat. Fusce congue ipsum quis felis condimentum auctor tincidunt 
                        erat scelerisque. Vestibulum ante ipsum <a href="#">primis in faucibus</a> orci luctus et ultrices posuere 
                        cubilia Curae; Nullam purus eros, consequat in blandit non, adipiscing ut ipsum. In eu diam 
                        lorem. 
                    </p>

                    <nav class="ui-grid-c">
                        <div class="ui-block-a"><a href="index.html" data-transition="flip">Home</a></div>
                        <div class="ui-block-b"><a href="portfolio.html" data-transition="flip">Portfolio</a></div>
                        <div class="ui-block-c"><a href="blog.html" data-transition="flip">Blog</a></div>
                        <div class="ui-block-d"><a class="navSelected" href="contact.html" data-transition="flip">Contact</a></div>
                      </nav>
                </footer>   
                <!--  Footer     END  -->  

            </div>
            <!--     Page initialization    END  -->
        </body>
    </html>
    <?php
}
?>