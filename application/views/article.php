<?php
echo '<br><div class="card" id="wrapper">';
echo '<h1>'.$_SESSION["title"].'</h1>';
                    $tmp= str_replace("\n", "<br>", $_SESSION["article"]);
                    echo "<p>By ".$_SESSION["author"]."</p>";
                    echo "<p>".$tmp."</p>";
                    echo "</div><br><br>";
                    ?>
<div class="card" id="wrapper">
    <div id="disqus_thread"></div>
    <script>
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//papernews-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    
</div>

<br><br>