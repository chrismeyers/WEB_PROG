<?php
/*
 * This script handles contact form input and database interactions.
 * 
 * author: Chris Meyers
 * date:  ‎ April ‎8, ‎2014
 */

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$fromemail = $_POST['fromemail'];
$confirmemail = $_POST['confirmemail'];
$usercomments = $_POST['usercomments'];
$mlist = $_POST['mlist'];
$message = "";


// Verifies there is a valid name in the 'First name' textbox
if (!preg_match("/\S+/", $fname)) {
    $message = "000"; //First Name required. Please try again.
    header("Location: contact.php?m=$message&fn=$fname&ln=$lname&e=$fromemail&c=$usercomments");
    die();
} 
// Verifies there is a valid name in the 'Last name' textbox
if (!preg_match("/\S+/", $lname)) {
    $message = "001"; //Last Name required. Please try again.
    header("Location: contact.php?m=$message&fn=$fname&ln=$lname&e=$fromemail&c=$usercomments");
    die();
} 
// Verifies there is a valid email address in the 'Email' textbox
if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/", $fromemail)) {
    $message = "002"; //Email Address format is incorrect. Please try again.
    header("Location: contact.php?m=$message&fn=$fname&ln=$lname&e=$fromemail&c=$usercomments");
    die();
}
//Verifies the user wrote the correct email address.
if(strcmp($fromemail,$confirmemail) != 0){
    $message = "003"; //Email and confirm email does not match.
    header("Location: contact.php?m=$message&fn=$fname&ln=$lname&e=$fromemail&c=$usercomments");
    die();
}

// Checks to see if user opted-in to the mailing list.
// If checked, 'fname', 'lname', and 'fromemail' will be added to
// the 'mailing_list' table in 'pinelands_mlist' db.
if (isset($mlist)) {
    $con=mysqli_connect('localhost','root',NULL,'pinelands_mlist');
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    mysqli_query($con,"INSERT INTO mailing_list VALUES (DEFAULT, '$fname', '$lname', '$fromemail')");
    
    mysqli_close($con);
}


// Construsts email message and send the mail to my address.
$myemail = "cm.02.93@gmail.com";
$emess = "First Name: " . $fname . "\n";
$emess.= "Last Name: " . $lname . "\n";
$emess.= "Email: " . $fromemail . "\n";
$emess.= "Comments: " . $usercomments;
$ehead = "From: " . $fromemail . "\r\n";
$subj = "An Email from " . $fname . " " . $lname . ", via pineland tours.";
mail("$myemail", "$subj", "$emess", "$ehead");

// Displayes a thank you confirmation
header("Location: thankyou.html");
?>