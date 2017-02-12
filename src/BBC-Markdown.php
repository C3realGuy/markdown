<?php


function bbc_process_markdown(&$tag, &$data, $disabled, $params) {
  require_once __DIR__ . '/../lib/Parsedown.php';
  require_once __DIR__ . '/../lib/ParsedownExtra.php';

  log_error(var_export($tag, true).' '.$data);

  $Parsedown = new Parsedown();
  $ParsedownExtra = new ParsedownExtra();

  $data = str_replace('<br>', "\n", $data);

  //$data = $Parsedown->text($data);

  file_put_contents('/tmp/test', $data);
  $data = $ParsedownExtra->text($data);
}
