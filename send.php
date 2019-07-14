<?php
include 'connect.php';
$id = $_POST['id'];
$sql = "SELECT url, cookie FROM form WHERE id=".$id;
$query = mysql_query($sql);
$num = mysql_num_rows($query);
if ($num > 0) {
    $row = mysql_fetch_array($query);
       $url =  $row['url'];
       $cookie = $row['cookie'];
}

function CURL($url) {
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_COOKIEJAR => $cookie,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data = curl_exec($ch);
        curl_close($ch);
        return true;
}