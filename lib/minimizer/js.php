<?php

require_once 'mediawiki/JavaScriptMinifier.php';

class OC_Minimizer_JS extends OC_Minimizer
{
  protected $contentType = 'application/javascript';

  public function minimizeFiles($files) {
    $js_out = '';
    $webroot = (string) OC::$WEBROOT;
    foreach($files as $file_info) {
      $file = $file_info[0] . '/' . $file_info[2];
      $js_out .= '/* ' . $file . ' */' . "\n";
      $js_out .= file_get_contents($file);
    }
    $in_root = false;
    foreach(OC::$APPSROOTS as $app_root) {
      if(strpos($file, $app_root['path'].'/') === 0) {
        $in_root = rtrim($webroot.$app_root['url'], '/');
        break;
      }
    }
    if ($in_root !== false) {
      $css = str_replace('%appswebroot%', $in_root, $css);
      $css = str_replace('%webroot%', $webroot, $css);
    }
    $js_out = str_replace('%appswebroot%', $in_root, $js_out);
    if (!defined('DEBUG') || !DEBUG) {
      $js_out = JavaScriptMinifier::minify($js_out);
    }
    return $js_out;
  }
}
