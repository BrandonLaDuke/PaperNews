<?php
$_SESSION['test'] = 1234;

?>
<div id="wrapper">
    
    <?php
    echo "<br>";
    if (isset($articles)) {
        foreach ($articles as $article) {
            echo '<br><div class="card">';
            echo '<h1>'.anchor(site_url("index.php/site")
                    ."/selectArticle/".$article->ID
                    ,$article->title).'</h1>';
                    $tmp= str_replace("\n", "<br>", $article->article);
                    echo "<p>By ".$article->author."</p>";
                    echo "<p>".$tmp."</p>";
                    echo "</div>";
                    
            echo "<br>";
        }
    } else {
        echo "No article in table<br>";
    }
    echo "<br>";
    ?>
    </div>

