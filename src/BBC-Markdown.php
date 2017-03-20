<?php

/**
 * Compatibility function for older wedge versions
 */
function bbc_validate_markdown(&$tag, &$data, &$disabled) {
	bbc_process_markdown($tag, $data, $disabled, null);
}

function bbc_process_markdown(&$tag, $content, $disabled, $params) {
  require_once __DIR__ . '/../lib/Parsedown.php';
  require_once __DIR__ . '/../lib/ParsedownExtra.php';
  require_once __DIR__ . '/../lib/Michelf/Markdown.inc.php';

  //log_error(var_export(['tag' => $tag, 'content' => $content, 'disabled' => $disabled, 'params' => $params], true));
  add_plugin_css_file('CerealGuy:Markdown', 'css/github-markdown', true);

  $Parsedown = new Parsedown();
  $ParsedownExtra = new ParsedownExtra();

  $content = str_replace('<br>', "\n", $content);
  $content = str_replace('[url]', '', $content);
  $content = str_replace('[/url]', '', $content);
  $content = html_entity_decode($content);

  file_put_contents('/tmp/test', $content);

  $content = Parsedown::instance()
   ->text($content);
  $content = nl2br($content);
  file_put_contents('/tmp/test2', $content);
  $tag['content'] = '<div class="bbc_markdown markdown-body">' . $content . '</div>';
}
