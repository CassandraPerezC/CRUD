<?php

namespace Crud\Model;

/**
 * 
 */
class Crud
{
	
	protected $id;
	protected $nombre;
	protected $apPat;
	protected $apMat;

	public function exchangeArray($data){
		$this->id = $data['id'];
		$this->nombre = $data['nombre'];
		$this->apPat = $data['apPat'];
		$this->apMat = $data['apMat'];

	}

	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApPat(){
		return $this->apPat;
	}

	public function getApMat(){
		return $this->apMat;
	}

	public function getArrayCopy(){
		return[
			'id' => $this->id,
			'nombre' => $this->nombre,
			'apPat' => $this->apPat,
			'apMat' => $this->apMat, 
		];
	}
}

?>