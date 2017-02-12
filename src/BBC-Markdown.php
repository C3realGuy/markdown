<?php


function bbc_process_markdown(&$tag, &$data, $disabled, $params) {
  require_once dirname(__FILE__) . '/Parsedown.php';
  require_once dirname(__FILE__) . '/ParsedownExtra.php';

  log_error(var_export($tag, true).' '.$data);

  $Parsedown = new Parsedown();
  $ParsedownExtra = new ParsedownExtra();

  $data = str_replace('<br>', "\n", $data);
  $data = html_entity_decode($data, ENT_QUOTES | ENT_XML1, 'UTF-8');
  file_put_contents('/tmp/test', $data);
  $data = $Parsedown->text($data);
  $data = $ParsedownExtra->text($data);
}
