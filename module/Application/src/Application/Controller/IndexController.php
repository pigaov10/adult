<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $videoTable = null;
    protected $imagemTable = null;

    public function getVideoTable()
    {
        if(!$this->videoTable){
                  			$sm = $this->getServiceLocator();
                  			$this->videoTable = $sm->get('Application\Model\VideoTable');
                  		}
                  		return $this->videoTable;
    }

    public function getImagemTable()
    {
        if(!$this->imagemTable){
                  			$sm = $this->getServiceLocator();
                  			$this->imagemTable = $sm->get('Application\Model\ImagemTable');
                  		}
                  		return $this->imagemTable;
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

    public function videosAction()
    {
        return new ViewModel(array(
                          'data'=> $this->getVideoTable()->fetchById($this->params()->fromRoute('id')),
                          'titulo' => $this->params()->fromRoute('id'),
                          'relacionado' => $this->getVideoTable()->fetchRandomVideos()
                        ));
    }

    public function categoriaAction()
    {
        return new ViewModel(array(
                        'data'=> $this->getVideoTable()->fetchByCategory($this->params()->fromRoute('id')),
                        'titulo' => $this->params()->fromRoute('id')
                      ));
    }

    public function fotosAction()
    {

        $paginator = $this->getImagemTable()->fetchAll(true);
        // set the current page to what has been passed in query string, or to 1 if none set
        $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
        // set the number of items per page to 10
        $paginator->setItemCountPerPage(6);

        return new ViewModel(array(
            'paginator' => $paginator,
            'link' => $matches->getParam('action')
        ));
    }


}
