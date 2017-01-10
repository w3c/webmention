<?php
$body = trim(file_get_contents('php://input'));

if(!$body) {
  header('Content-type: text/plain');
  echo "This is the Pingback endpoint for the Webmention spec. Pingback endpoints only accept POST requests.\n";
  die();
}

$rpc = xmlrpc_decode($body);

if($rpc && is_array($rpc) && count($rpc) == 2) {
  $source = $rpc[0];
  $target = $rpc[1];

  // Forward to webmention.io
  $ch = curl_init('https://webmention.io/w3c/webmention');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'source' => $source,
    'target' => $target
  ]));
  curl_exec($ch);

  header('Content-type: text/xml');
  echo xmlrpc_encode('pingback_accepted');
} else {
  header('HTTP/1.1 400 Bad Request');  
}
