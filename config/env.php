<?php

// Custom env variables can be listed in this document.
// It can be referenced as config('env.key'), so that Laravel variable caching can be utilised
return [
    'ping_path' => env('PING_CMD_PATH', '/bin/ping'),
    'ping6_path' => env('PING6_CMD_PATH', '/bin/ping6'),
];
