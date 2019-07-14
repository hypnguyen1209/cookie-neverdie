<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $URL = $_POST['url'];
    $Cookie = $_POST['text'];
    $inputURL = mysqli_real_escape_sring($connection, $URL);
    $inputCookie = mysqli_real_escape_sring($connection, $Cookie);
    $SQL = "INSERT INTO form(url,cookie) VALUES ('$inputURL','$inputCookie')";
    $Query = mysqli_query($connection, $sql); 
    $row = mysql_fetch_array($Query);
    $count = count($row);
    $link =  $directory."/send.php?id=".$count;
    $param = "action=add&title=&url=$link&auth_user=".$email."&auth_pass=".$pass."&exec_mode=interval_minute&interval_minute_minute=5&day_time_hour=0&day_time_minute=0&month_time_day=1&month_time_hour=0&month_time_minute=0&notify_disable=on";
    function CURL($param) {
        $ch = curl_init('https://cron-job.org/en/members/jobs/');
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'https://cron-job.org/en/members/jobs/',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_POST => 1, 
            CURLOPT_POSTFIELDS => $param,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true
        ));
        $data = curl_exec($ch);
            curl_close($ch);
            echo '<script>$("form").remove();</script>';
            echo 'OK';
    }
echo CURL($param);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookie NeverDie</title>
</head>
<body>
<form method="POST">
   <p> <input type="url" name="url" required placeholder="URL"></p>
    <label for=""><textarea name="text" id="txt" cols="30" rows="10" style="margin: 0px; width: 748px; height: 208px;" placeholder="Cookie Paste Here" required></textarea></label>
<p><input type="submit" value="OK"></p>
</form>
</form>
</body>
</html>