<?php
foreach(getTypes() as $type){
    echo "<li><a href='index.php?type=".$type['id']."'>".$type['name']."</a></li>";
}