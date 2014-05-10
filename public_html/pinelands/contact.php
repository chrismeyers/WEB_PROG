<!DOCTYPE html>
<html>
    <head>
        <title>Pineland Tours: Contact</title>
        <meta charset="UTF-8">
        <meta name="Author" content="Chris Meyers" />
        
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
        
        <link rel="stylesheet" href="css_elements.css">
        <link rel="stylesheet" href="css_elements_839-.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    </head>

    <body>

        <div id="bannercontainer">
            <p id="banner">
                <a href="index.html" class="fancytxt">about</a>   &nbsp; &bull; &nbsp;
                <a href="tours.php" class="fancytxt">tours</a>   &nbsp; &bull; &nbsp;
                <a href="contact.php" class="fancytxt">contact</a>
            </p>
        </div>


        <div id="main">
            <form action="email_form.php" method="post" target="_top">
                <h2 class="header">Contact Us!</h2>
                <p class="message">
                    Have any comments or questions about our Pineland tours?
                    Feel free to contact us using the form below!
                </p>

                <?php
                if (!empty($_GET['m'])) {
                    $message = $_GET['m'];
                    if ($message == "000") {
                        echo '<p class="errors">' . "First Name required. Please try again." . '</p>';
                    } elseif ($message == "001") {
                        echo '<p class="errors">' . "Last Name required. Please try again." . '</p>';
                    } elseif($message == "002") {
                        echo '<p class="errors">' . "Email Address format is incorrect. Please try again." . '</p>';
                    } elseif($message == "003") {
                        echo '<p class="errors">' . "Email Addresses do not match. Please try again." . '</p>';
                    }
                }
                ?>

                <p></p>
                <table class="names">
                    <tr>
                        <td class="force-row">
                            <input class="inputbox-mod" type="text" placeholder="First Name" name="fname"<?php
                            // Repopulates 'first name' field if there was text present prior to an error.
                            if (!empty($_GET['fn'])) {
                                $fname = $_GET['fn'];
                                echo 'value="' . $fname . '">';
                            } else {
                                echo '>';
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td class="force-row">
                            <input class="inputbox-mod" type="text" placeholder="Last Name" name="lname"<?php
                            // Repopulates 'last name' field if there was text present prior to an error.
                            if (!empty($_GET['ln'])) {
                                $lname = $_GET['ln'];
                                echo 'value="' . $lname . '">';
                            } 
                            else {
                                echo '>';
                            }
                            ?></td>
                    </tr>
                </table>
                
                <table class="emails">
                    <tr>
                        <td class="force-row">
                            <input class="inputbox-mod" type="email" placeholder="Primary Email" name="fromemail"<?php
                            // Repopulates 'email' field if there was text present prior to an error.
                            if (!empty($_GET['e'])) {
                                $fromemail = $_GET['e'];
                                echo 'value="' . $fromemail . '">';
                            } 
                            else {
                                echo '>';
                            }
                            ?></td>
                        
                        <td class="force-row">
                            <input class="inputbox-mod" type="email" placeholder="Confirm Email" name="confirmemail">
                        </td>
                    </tr>
                </table>

                <p></p>
                <table class="comments">
                    <tr>
                        <td>
                            <textarea class="textarea-mod" name="usercomments" placeholder="Message"><?php
                            // Repopulates 'message' field if there was text present prior to an error.
                            if (!empty($_GET['c'])) {
                                $usercomments = $_GET['c'];
                                echo $usercomments . '</textarea>' . "\n";
                            } 
                            else {
                                echo '</textarea>' . "\n";
                            }
                            ?>
                        </td>
                    </tr>
                </table>

                <label>
                    <input type="checkbox" name="mlist" class="cboxes" style="margin-left:25px;">
                    Check to sign up for our mailing list! 
                </label> 

                <p></p>
                <table class="comments">
                    <tr>
                        <td>
                            <button class="submit-button" type="submit">Send</button>
                        </td>
                    </tr>                                        
                </table>
            </form>
        </div>



        <div id="footer">
            Designed and Developed by 
            <a href="http://elvis.rowan.edu/~meyers42/web/hw1/hw1.html" class="fancytxt" target="_blank">
                Chris Meyers</a>
            <p></p>
            Valid:
            <a href="http://validator.w3.org/check/referer" class="fancytxt">HTML5</a>
            &bull;
            <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" class="fancytxt">
                CSS3</a>
        </div>

    </body>
</html>
