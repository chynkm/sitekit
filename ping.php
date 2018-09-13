<?php

function removeBrowserPrefix($url) {
    $prefixes = array('http://', 'https://');

    foreach($prefixes as $prefix) {
        if(strpos($url, $prefix) === 0) {
            return str_replace($prefix, '', $url);
        }
    }

    return $url;
}

$host = removeBrowserPrefix($_POST['host']);

$proc = popen("/sbin/ping -c 5 {$host}", 'r');

echo '<pre>';
while (!feof($proc)) {
    $x = fread($proc, 4096);

    if($x === false) {
        echo 'ping: cannot resolve {$host}: Unknown host';
    } else {
        echo $x;
    }

    @flush();
}
echo '</pre>';
