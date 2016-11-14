<div id="wrapper">
    <div class="card">
    <?php
echo form_open(site_url("index.php/site")
            ."/saveArticle");
    echo form_label("Title: ");
    echo form_input("title",$_SESSION["title"])."<br><br>";
    echo form_label("Author: ");
    echo form_input("author",$_SESSION["author"])."<br><br>";
    echo form_label("Article Body: ");
    echo form_textarea("article",$_SESSION["article"])."<br><br>";
    
    
        echo form_submit('save', "Save");
        
    
        echo form_close();
?>
    </div>
</div>