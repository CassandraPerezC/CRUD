<?php

namespace Crud\Model;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;
/**
 * 
 */
class CrudTable extends TableGateway
{
    protected $tableGateway;

     private $dbAdapter;

      public function __construct()
    {
        $this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
        $this->table = 'user';
        $this->featureSet = new Feature\FeatureSet();
        $this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
        $this->initialize();
    }

     public function fetchAll()
    {
        //select from
        $select = $this->select();
        $userr = $select->toArray();
        //imprime un array
        return $userr;
    }

    public function saveData($data){
        //inserta el array desde el service
        $this->insert($data);
        return $data;
        
    }

    public function getUserById($id){
        $sql = new Sql($this->dbAdapter);
        $select = $this->dbAdapter->query("select * from user where id=$id",Adapter::QUERY_MODE_EXECUTE);
        $result = $select->toArray();

        return $result[0];
    }

    public function updatePost($data){
        $user = $this->update($data, array("id"=>$data['id']));
        return $user;
    }


    public function deletePost($id){
        $delete=$this->delete(array("id"=>$id));
             return $delete;
    }

 }


