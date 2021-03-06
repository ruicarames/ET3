<?php
  class TemplateEngine {
    private $vars = array();

    public function renderMain(){
      return $this->render('main.php');
    }

    public function __get($name) { return $this->vars[$name]; }
    public function __set($name, $value) {
      if($name == 'view_template_file') {
        throw new Exception("Cannot bind variable named 'view_template_file'");
      }
      $this->vars[$name] = $value;
    }
    public function render($view_template_file) {
      if(array_key_exists('view_template_file', $this->vars)) {
        throw new Exception("Cannot bind variable called 'view_template_file'");
      }
      extract($this->vars);
      ob_start();
      include($view_template_file);
      return ob_get_clean();
    }
  } //Clase sacada de esta web: See more at: http://chadminick.com/articles/simple-php-template-engine.html#sthash.q0ibEQp9.dpuf
?>
