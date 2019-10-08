<?php
namespace Crud\Controller;

//librerias para que el controller use las vistas
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Crud\Services\CrudService;
//inclucion de formulario
use Crud\Form\CrudForm;

class IndexController extends AbstractActionController{
	protected $userService;

	public function __construct(){
    $this->userService = new CrudService();
  }
	
  //creacion de un metodo para visualizar la vista en el "index"
   public function indexAction(){
		$user = $this ->userService->fetchAll();

       return new ViewModel([ 'user' => $user ]);
    }

    public function addAction(){
    	$form = new CrudForm();
    
    if ($this->getRequest()->isPost()) {
      
      $formData = $this->getRequest()->getPost();
      
      $user = $this->userService->saveData($formData);
        if ($user) {
          # valida que la variable tenga algo para regresarlo.
          $this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/crud');
        }
    }
    return array('form'=>$form);

    }

      public function editAction(){

      	$form = new CrudForm();
        $id= $this->params()->fromRoute("id");
        $user = $this->userService->getUserById($id);
        //print_r ($user);
        $form-> setData($user);

        if ($this->getRequest()->isPost()) {
        $formData = $this->getRequest()->getPost();
        //print_r ($formData);
        $user = $this->userService->updatePost($formData);
        //echo "<pre>"; print_r ($user); exit;
          if ($user) {
            $this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/crud');
          }
      }
      return array('form'=>$form);

    }

      public function deleteAction(){
      $id = $this->params()->fromRoute('id', 0);
      if($id == 0){
        exit('Error');
      }
      try{
      $user= $this->userService->deletePost($id);
      } 
      catch(Exception $e){
        exit('Error');
      }
      $request =$this->getRequest();
      if(!$request->isPost()){
        return new ViewModel([
'user' => $user,
'id' => $id
        ]);
      }
 
  }
}