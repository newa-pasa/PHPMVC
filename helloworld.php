<?php
class Model {
    public $text;
    
    public function __construct() {
        $this->text = 'Hello world!!!';
    }        
}


class View {
    private $model;
    private $controller;
    
    public function __construct(Controller $controller, Model $model) {
        $this->controller = $controller;
        $this->model = $model;
    }
    
    public function output() {
        return '<a href="index.php?action=textClicked">' . $this->model->text . '</a>';
		//echo $this->model->text;
    } 
}

class Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
	public function textClicked() {
        $this->model->text = 'Rohan ko request';
    } 
}

//rohan.com/controller=homecontroller/action or function=/args
//initiate the triad
$model = new Model();
//It is important that the controller and the view share the model
$controller = new Controller($model);
$view = new View($controller, $model);
if (isset($_GET['action'])) $controller->{$_GET['action']}();
echo $view->output();

?>