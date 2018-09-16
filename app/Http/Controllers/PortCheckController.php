<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortCheck;

class PortCheckController extends Controller
{
    public function check()
    {
        $title = 'PORT CHECK';
        return view('port.check', compact('title'));
    }

    public function checkPort(Request $request)
    {
        $host = $request->host;
        $port = $request->port;

        $connection = @fsockopen($host, $port);
        $portInfo = getservbyport($port, 'tcp');
        $output = "{$host}:{$port} port ";
        if($portInfo) {
            $output .= "({$portInfo}) ";
        }
        $output .= "is ";

        if (is_resource($connection)) {
            $dbOutput = 'open';
            $output .= '<strong class="text-success">open.</strong>';
            fclose($connection);
        } else {
            $dbOutput = 'closed';
            $output .= '<strong class="text-danger">closed.</strong>';
        }

        PortCheck::create([
            'ip_address' => $request->server('REMOTE_ADDR'),
            'host' => $host,
            'port' => $port,
            'output' => $dbOutput,
        ]);

        return response()->json(['status' => true, 'output' => $output]);
    }
}
