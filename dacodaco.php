<?php
$query = htmlspecialchars($query); 
         
        $query = mysql_real_escape_string($query);
         
        $raw_results = mysql_query("SELECT * FROM articles
            WHERE (`title` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){
             
            while($results = mysql_fetch_array($raw_results)){
                echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
            }

            ?>