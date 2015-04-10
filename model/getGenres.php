<?php
foreach(getGenres() as $genre){
    echo "<li><a href='index.php?genre=".$genre['id']."'>".$genre['name']."</a></li>";
}