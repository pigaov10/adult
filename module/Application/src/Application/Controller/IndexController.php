<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $videoTable = null;

    public function getVideoTable()
    {
        if(!$this->videoTable){
          			$sm = $this->getServiceLocator();
          			$this->videoTable = $sm->get('Application\Model\VideoTable');
          		}
          		return $this->videoTable;
    }

    public function indexAction()
    {
      // grab the paginator from the AlbumTable
      $paginator = $this->getVideoTable()->fetchAll(true);
      // set the current page to what has been passed in query string, or to 1 if none set
      $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
      // set the number of items per page to 10
      $paginator->setItemCountPerPage(6);

      return new ViewModel(array(
          'paginator' => $paginator
      ));
    }

    public function detailAction()
    {
        return new ViewModel(array(
                  'data'=> $this->getVideoTable()->fetchById($this->params()->fromRoute('id'))
                ));
    }

    public function categoryAction()
    {
        return new ViewModel();
    }


}
