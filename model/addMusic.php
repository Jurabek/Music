<?php
$artist_n = clearData($_POST['artistName']);
$music_n = clearData($_POST['musicName']);
$y = clearData($_POST['year']);
$t = clearData($_POST['typemusic']);
$j = clearData($_POST['janrmusic']);
$c = clearData($_POST['comment']);
$add_date = date('Y-m-d');
try
{
    if($_FILES['musicfile']['error']==0 ) {
        if ($_FILES['musicfile']['type'] == "audio/mpeg") {
            $tmp_name = $_FILES['musicfile']['tmp_name'];
            $name = $_FILES['musicfile']['name'];
            move_uploaded_file($tmp_name, "music/" . $name);

            ///////////////////////////////////
            $file = $_FILES['musicfile']['size'];

            $fsize = round(((double)$file / 1000000), 2);

            if ($fsize <= 10) {
                $fname = $_FILES['musicfile']['name'];
                $format = strrchr($fname, ".");
                // Add to DataBase
               /* $a->file_name = $fname;
                $a->artist_name = $artist_n;
                $a->music_name = $music_n;
                $a->year = $y;
                $a->type = $t;
                $a->janr_id = $j;
                $a->add_date = $add_date;
                $a->size = $fsize;
                $a->format = $format;
                $a->comment = $c;
                $a->save();*/
                header("Location:success");
            } else
                header("Location:error?id=3");

        } else {
            header("Location:error?id=1");
        }

    }
}
catch (Exception $e){

}