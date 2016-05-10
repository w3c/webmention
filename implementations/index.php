<!DOCTYPE html>
<html>
<head>
  <title>Webmention</title>
  <link rel="stylesheet" href="/styles.css">
  <style type="text/css">
    .page {
      max-width: 500px;
    }
  </style>
</head>
<body>

<div class="page">
<?php
require(dirname(__FILE__).'/../lib/markdown.php');

$source = file_get_contents('index.md');
$html = Markdown($source);
echo $html;
?>
</div>

</body>
</html>