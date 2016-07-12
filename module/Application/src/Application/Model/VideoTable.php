<?php
namespace Application\Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class VideoTable
{
    protected $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    public function fetchAll($paginated=false)
    {
      if ($paginated) {
           // create a new Select object for the table album
           $select = new Select('video');
           // create a new result set based on the Album entity
           $resultSetPrototype = new ResultSet();
           $resultSetPrototype->setArrayObjectPrototype(new Video());
           // create a new pagination adapter object
           $paginatorAdapter = new DbSelect(
               // our configured select object
               $select,
               // the adapter to run it against
               $this->tableGateway->getAdapter(),
               // the result set to hydrate
               $resultSetPrototype
           );
           $paginator = new Paginator($paginatorAdapter);
           return $paginator;
       }
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

    public function fetchByCategory($category)
    {
      //$where = new Where();
      //$where->equalTo('name', $id);
      $resultSet = $this->tableGateway->select(array('category' => $category));
      return $resultSet;
    }
    public function fetchRandomVideos()
    {
      //$where = new Where();
      //$where->equalTo('name', $id);

      $sql = "SELECT * FROM video ORDER BY RAND() LIMIT 3";
      $resultSet = $this->tableGateway->getAdapter()->driver->getConnection()->execute($sql);
      return $resultSet;
    }
}
