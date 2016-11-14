<div id="wrapper">
    <br>
<?php
    echo form_open(site_url("index.php/site")
            ."/logonCheck");
    
    if ( !isset($_SESSION["message"])) {
            if ($_SESSION["message"] != "") {
                echo "<br>".$_SESSION["message"]."<br>";
            }
    }
    echo form_label("Username: ");
    echo form_input("userName",$_SESSION["userName"])."<br><br>";

    echo form_label("Password: ");
    echo form_input("password",$_SESSION["password"])."<br><br>";

    // Register
    echo form_label("Email: ");
    echo form_input("email",$_SESSION["email"])."<br><br>";
    
    echo form_label("Verify Password: ");
    echo form_input("password2",$_SESSION["password2"])."<br><br>";
    
    echo "<br><p>Password verification and email required for registration</p>";
    echo "<br>";
    echo form_submit('logon', "Logon");
    echo "<br>";
    echo form_submit('register', "Register");

    echo form_close();
?>

</div>





















