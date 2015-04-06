<?php
session_start();
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "music_portal");
header("Content-Type: text/html; charset = utf-8");


/*******Оприделения Mysql Connection********/
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);
mysql_query("SET CHARSET utf8");

function clearData($data)
{
    return trim(mysql_real_escape_string($data));
}

function db2Array($data)
{
    $arr = array();
    while ($row = mysql_fetch_assoc($data)) {
        $arr[] = $row;
    }
    return $arr;
}

function getGenres($id)
{
    $sql = "SELECT * FROM genres where id = " . clearData($id);
    return db2Array(mysql_query($sql));
}

function insertAlbum($name)
{
    $sql = "INSERT INTO albums(name) VALUES('" . $name . "')";
    mysql_query($sql);
}

function insertArtist($name)
{
    $sql = "INSERT INTO artists(name) VALUES'" . $name . "')";
    mysql_query($sql);
}

/**
 * Insert new Music for Database
 */
function insertTrack($album_id, $artist_id, $genre_id, $user_id, $name, $file_name, $size, $duration)
{
    $sql =
        sprintf(
            "INSERT INTO tracks(album_id, artist_id, genre_id, user_id, name, file_name, size, duration)
             VALUES(%d, %d, %d ,%d, '%s', '%s', %d, %d)",
            $album_id, $artist_id, $genre_id, $user_id, $name, $file_name, $size, $duration);
    mysql_query($sql);
}

/**
 * @param $name
 * @param $last_name
 * @param $login
 * @param $password
 * @param $birtday
 * @param $gender
 * @param $country_id
 */
function insertUser($name, $last_name, $login, $password, $birtday, $gender, $country_id)
{
    $sql = sprintf(
        "INSERT INTO user(name, last_name, login, password, birthday, gender, country_id)
         VALUES('%s', '%s', '%s', '%s', '%s', %d, %d)", $name, $last_name, $login, md5($password), $birtday, $gender, $country_id );
    mysql_query($sql);
}