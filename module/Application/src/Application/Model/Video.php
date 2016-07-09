<?php
namespace Application\Model;


class Video{
	public $id;
	public $name;
	public $description;
  public $tag;
  public $site;
  public $status;

	public function exchangeArray($data){
		$this->id = (isset($data['id'])) ? $data['id'] : null;
		$this->name = (isset($data['name'])) ? $data['name'] : null;
		$this->description = (isset($data['description'])) ? $data['description'] : null;
    $this->tag = (isset($data['tag'])) ? $data['tag'] : null;
		$this->site = (isset($data['site'])) ? $data['site'] : null;
		$this->status = (isset($data['status'])) ? $data['status'] : null;
		$this->img = (isset($data['img'])) ? $data['img'] : null;
	}
}
