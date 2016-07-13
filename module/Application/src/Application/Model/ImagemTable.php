<?php
namespace Application\Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class ImagemTable
{
    protected $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    public function fetchAll($paginated=false)
    {
      $resultSet = $this->tableGateway->select(array('pessoa'=> 'Andressa Soares (Mulher Melancia) 1'));
      return $resultSet;
    }
}
