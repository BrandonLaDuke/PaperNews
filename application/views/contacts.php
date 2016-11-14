<?php
    echo "<br>";
    if (isset($contacts)) {
        foreach ($contacts as $contact) {
            echo anchor(site_url("index.php/site")
                    ."/selectContact/".$contact->ID
                    ,$contact->lastName.", ".$contact->firstName);
            echo "<br>";
        }
    } else {
        echo "No articles in table<br>";
    }
    echo "<br>";
    
    
    echo form_open(site_url("index.php/site")
            ."/contactInfo");
    echo form_label("Last Name: ");
    echo form_input("lastName",$_SESSION["lastName"])."<br><br>";
    echo form_label("First Name: ");
    echo form_input("firstName",$_SESSION["firstName"])."<br><br>";
    
    if ($_SESSION["lastName"] != "") {
        echo form_submit('update', "Update");
        echo form_submit('delete', "Delete");
    } else {
        echo form_submit('save', "Save");

    }
        echo form_close();
    
?>