<?php

namespace Crud\Services;
//incluir model
use Crud\Model\CrudTable;

class CrudService
{
	private $userModel;

	public function  __construct(){
		$this->userModel = new CrudTable();
	}
	//manda la variable al modelo para que se realice la consulta
	public function fetchAll(){
		$userr=$this->userModel->fetchAll();
		return $userr;
	}
	//funcion que va a agregar los datos en el parametro se indica lo que se va a recibir
	public function saveData($formData){
		//se genera un array asosiativo
		$data = array(
		 //campos de la base 
    		'nombre'=> $formData['nombre'],
    		'apPat'=> $formData['apPat'],
    		'apMat'=> $formData['apMat']
    	);

    	$userr= $this->userModel->saveData($data);
    	return $userr;
     }

     public function getUserById($id){
     	$userr=$this->userModel->getUserById($id);
     	return $userr;
     }

     public function updatePost($formData){
		//echo "<pre>"; print_r ($formData); exit;
		$data = array(
			"id" => $formData['id'],
			'nombre'=> $formData['nombre'],
    		'apPat'=> $formData['apPat'],
    		'apMat'=> $formData['apMat']
			);
		$user = $this->userModel->updatePost($data);
		return $user;

	}

	public function deletePost($id){
		$user= $this->userModel->deletePost($id);
		return $user;

	}
	}

















