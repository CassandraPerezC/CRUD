<?php

	namespace Crud\Form;
  
	use Zend\Form\Form;

	class CrudForm extends Form
{
    public function __construct($name = null){
    	parent::__construct('crud');
    	$this->setAttribute('method','POST');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);

 		$this->add(array(
            // el  nombre del campo
            'name' =>'nombre',
            'options' => array(
                //nombre de la etiqueta en el formulario
                'label' => 'Nombre :'
                ),
            'attributes' => array(
                // seleccionar el tipo de dato del campo
                'type' =>  'text',
                //asigna un id al campo
                'id' => 'name',
                // para los estilos
                'class' => 'form-control',
                'required' => 'required',
                )
            ));
        $this->add(array(
            'name' =>'apPat',
            'options' => array(
                'label' => 'Apellido Paterno :'
                ),
            'attributes' => array(
                'type' =>  'text',
                'id' => 'lastname',
                'class' => 'form-control',
                'required' => 'required',
                )
            ));
          $this->add(array(
            'name' =>'apMat',
            'options' => array(
                'label' => 'Apellido Materno :'
                ),
            'attributes' => array(
                'type' =>  'text',
                'id' => 'lastname',
                'class' => 'form-control',
                'required' => 'required',
                )
            ));
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Aceptar',
                'id'    => 'submitbutton',        
                'class' => 'btn btn-primary',
            ],
        ]);
    }
}



