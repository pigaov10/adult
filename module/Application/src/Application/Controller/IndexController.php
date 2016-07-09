<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Video;
use Application\Model\VideoTable;

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
  				'videos' => $this->getVideoTable()->fetchAll(),
  		));
  	}

    public function detailAction()
    {
        return new ViewModel();
    }


}
