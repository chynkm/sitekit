<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ping;

class PingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ping()
    {
        $title = 'PING';
        return view('ping.ping', compact('title'));
    }

    protected function removeBrowserPrefix($url) {
        $prefixes = array('http://', 'https://');

        foreach($prefixes as $prefix) {
            if(strpos($url, $prefix) === 0) {
                return str_replace($prefix, '', $url);
            }
        }

        $url = rtrim($url, '/');

        return $url;
    }

    public function pingHost(Request $request)
    {
        $host = $this->removeBrowserPrefix($request->host);
        $proc = popen(config('env.ping_path')." -c 4 {$host}", 'r');

        $output = '';
        while (!feof($proc)) {
            $x = fread($proc, 4096);
            if($x === false) {
                $output .= 'ping: cannot resolve {$host}: Unknown host';
            } else {
                $output .= $x;
            }

            @flush();
        }

        Ping::create([
            'host' => $host,
            'protocol' => 'ipv4',
            'output' => $output,
        ]);

        $output = $this->processPingOutput($output);

        return response()->json(['status' => true, 'output' => $output]);
    }

    protected function processPingOutput($output)
    {
        $lines = explode(PHP_EOL, $output);
        $processedOutput = [];
        foreach ($lines as $key => $line) {
            if(in_array($key, [0, 5, 6, 9])) {
                continue;
            }

            if($key == 7) {
                $elements = explode(', ', $line);
                $element1 = explode(' ',$elements[0]);
                $element2 = explode(' ',$elements[1]);
                $element3 = explode(' ',$elements[2]);
                $element4 = explode(' ',$elements[3]);
                $line = "<br/><strong>Ping statistics:</strong><br/>Packets transmitted: {$element1[0]}<br/>Packets received: {$element2[0]}<br/>Packet loss: {$element3[0]}<br/>Time: {$element4[1]}<br/>";
            }

            if($key == 8) {
                $elements = explode(' = ', $line);
                $elements = explode(' ', $elements[1]);
                $timeUnit = $elements[1];
                $elements = explode('/', $elements[0]);
                $line = "<strong>Round trip time</strong><br/>Min: {$elements[0]} {$timeUnit}<br/>Avg: {$elements[1]} {$timeUnit}<br/>Max: {$elements[2]} {$timeUnit}<br/>Mdev: {$elements[3]} {$timeUnit}<br/>";
            }

            $processedOutput[] = $line;
        }

        return implode(PHP_EOL, $processedOutput);
    }
}
