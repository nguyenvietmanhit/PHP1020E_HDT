<?php
//backend/controllers/Controller.php
class Controller {
  public $error;
  public $content;

  public function render($file_path, $variables = []) {
    extract($variables);
    ob_start();
    require "$file_path";
    $content = ob_get_clean();
    return $content;
  }
}
