<?php
namespace Application\Model;


class Video{
	public $id;
	public $name;
	public $description;
  public $tag;
  public $site;
  public $status;
	public $tempo;
	public $category;

	public function exchangeArray($data){
		$this->id = (isset($data['id'])) ? $data['id'] : null;
		$this->name = (isset($data['name'])) ? $data['name'] : null;
		$this->description = (isset($data['description'])) ? $data['description'] : null;
    $this->tag = (isset($data['tag'])) ? $data['tag'] : null;
		$this->site = (isset($data['site'])) ? $data['site'] : null;
		$this->status = (isset($data['status'])) ? $data['status'] : null;
		$this->img = (isset($data['img'])) ? $data['img'] : null;
		$this->tempo = (isset($data['img'])) ? $data['tempo'] : null;
		$this->embed = (isset($data['embed'])) ? $data['embed'] : null;
		$this->category = (isset($data['embed'])) ? $data['category'] : null;
	}
}
