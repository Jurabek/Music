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

$month = [
    1  => 'Январ',
    2  => 'Феврал',
    3  => 'Март',
    4  => 'Апрел',
    5  => 'Май',
    6  => 'Июн',
    7  => 'Июл',
    8  => 'Август',
    9  => 'Сентябр',
    10 => 'Октябр',
    11 => 'Ноябр',
    12 => 'Декабр'
];

/**
 * @param $data
 * @return string
 */
function clearData($data)
{
    return trim(mysql_real_escape_string($data));
}

/**
 * @param $data
 * @return array
 */
function db2Array($data)
{
    $arr = array();
    while ($row = mysql_fetch_assoc($data)) {
        $arr[] = $row;
    }
    return $arr;
}

/**
 * @param int $id
 * @return array
 */
function getGenres($id = -1)
{
    if($id ==-1){
        $sql = "SELECT * FROM genres";
    }
    else{
        $sql = "SELECT * FROM genres where id = " . clearData($id);
    }
    return db2Array(mysql_query($sql));
}

/**
 * @param int $id
 * @return array
 */
function getTypes($id = -1){
    if($id ==-1){
        $sql = "SELECT * FROM type";
    }
    else{
        $sql = "SELECT * FROM type where id = " . clearData($id);
    }
    return db2Array(mysql_query($sql));
}

/**
 * @param $name
 */
function insertAlbum($name)
{
    $sql = "INSERT INTO albums(name) VALUES('" . $name . "')";
    mysql_query($sql);
}

/**
 * @param $name
 */
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
 * @param $birthday
 * @param $gender
 * @param $country_id
 */
function insertUser($name, $last_name, $login, $password, $birthday, $gender, $country_id)
{
    $sql = sprintf(
        "INSERT INTO user(name, last_name, login, password, birthday, gender, country_id)
         VALUES('%s', '%s', '%s', '%s', '%s', %d, %d)", $name, $last_name, $login, md5($password), $birthday, $gender, $country_id );
    mysql_query($sql);
}

/**
 * @param $login
 * @param $password
 * @return array|string
 */
function checkUserLoginAndPassword($login, $password){

    $sql = "SELECT * FROM user where login = '".$login."' AND  password = '".md5($password)."'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) > 0){
        $user = mysql_fetch_assoc($result);
        return $user;
    }
    else{
        return "Вы не правильно ввели пароль или логин";
    }
}

