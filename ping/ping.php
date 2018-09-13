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

$host = removeBrowserPrefix($_GET['host']);

$proc = popen("/sbin/ping -c 5 {$host}", 'r');

$output = '<pre>';
while (!feof($proc)) {
    $x = fread($proc, 4096);

    if($x === false) {
        $output .= 'ping: cannot resolve {$host}: Unknown host';
    } else {
        $output .= $x;
    }

    @flush();
}
$output .= '</pre>';

echo json_encode(['status' => true, 'output' => $output]);
