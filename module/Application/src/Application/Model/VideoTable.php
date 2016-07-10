<?php
namespace Application\Model;
use Zend\Db\TableGateway\TableGateway;

class VideoTable
{
    protected $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    public function fetchById($id)
    {
        //$where = new Where();
        //$where->equalTo('name', $id);
        $resultSet = $this->tableGateway->select(array('name' => $id));
        return $resultSet;
    }
}
