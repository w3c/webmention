<?php
if(isset($_POST['source']) && isset($_POST['target'])) {
  // Forward to webmention.io
  $ch = curl_init('https://webmention.io/w3c/webmention');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'source' => $_POST['source'],
    'target' => $_POST['target']
  ]));
  curl_setopt($ch, CURLOPT_HEADER, true);
  $response = curl_exec($ch);
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  list($code, $status, $headers) = parse_headers(trim(substr($response, 0, $header_size)));
  $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $body = substr($response, $header_size);

  // Pass back the response
  header('HTTP/1.1 '.$code.' '.$status);
  foreach($headers as $key=>$val) {
    if(is_array($val))
      foreach($val as $v)
        header($key . ': ' . $v, false);
    else
      header($key . ': ' . $val, false);
  }
  echo $body;
} else {
  ?>
  <form action="/endpoint.php" method="post">
    <input type="url" name="source" placeholder="source"><br>
    <input type="url" name="target" placeholder="target"><br>
    <input type="submit" value="Send Webmention">
  </form>
  <?
}

function parse_headers($headers) {
  if(preg_match('/^HTTP\/1.[01] (\d+) (.+)/', $headers, $match)) {
    $code = $match[1];
    $status = $match[2];
  } else {
    $code = null;
    $status = null;
  }
  $retVal = array();
  $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $headers));
  foreach($fields as $field) {
    if(preg_match('/([^:]+): (.+)/m', $field, $match)) {
      $match[1] = preg_replace_callback('/(?<=^|[\x09\x20\x2D])./', function($m) {
        return strtoupper($m[0]);
      }, strtolower(trim($match[1])));
      // If there's already a value set for the header name being returned, turn it into an array and add the new value
      $match[1] = preg_replace_callback('/(?<=^|[\x09\x20\x2D])./', function($m) {
        return strtoupper($m[0]);
      }, strtolower(trim($match[1])));
      if(isset($retVal[$match[1]])) {
        if(!is_array($retVal[$match[1]]))
          $retVal[$match[1]] = array($retVal[$match[1]]);
        $retVal[$match[1]][] = $match[2];
      } else {
        $retVal[$match[1]] = trim($match[2]);
      }
    }
  }
  return [$code, $status, $retVal];
}
