<?php 

class UserListView  {
    private $model;
    
    public function __construct(UserModel $model) {
        $this->model = $model;
    } 
    
    public function render() {
          return '<h2>User List</h2>';
          //loop through users an generate a HTML table.   
    }
}

class UserListController extends Controller {
    private $model;
    
    public function __construct(UserListModel $model) {
        $this->model = $model;
    }
    
    public function sort($order){
        $this->model->setSort($order);
    }
}

class UserEditView extends View {
    private $model;
    
   public function __construct(UserModel $model) {
        $this->model = $model;
    } 
    
    public function render() {
        $user = $this->model->getUser();
          return '<h2>Editing user ' . $user->name . '</h2>';   
    }
}

class UserEditController extends Controller {
        
    public function main($id) { 
        $this->model->id = $id;    
    }
    
    public function save() {
        $this->model->save($_POST);        
    }
}
?>