<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $videoTable;

  	public function getVideoTable(){
  		if(!$this->videoTable){
  			$sm = $this->getServiceLocator();
  			$this->videoTable = $sm->get('Application\Model\VideoTable');
  		}
  		return $this->videoTable;
  	}
  	public function indexAction(){
  		return new ViewModel(array(
  				'data' => $this->getVideoTable()->fetchAll(),
  		));
  	}

    public function detailAction()
    {
        echo "<pre>"; var_dump($this->params()->fromRoute('id'));
        return new ViewModel();
    }


}
