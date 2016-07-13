<?php
namespace Application\Model;


class Imagem{
	public $id;
	public $pessoa;
	public $link;

	public function exchangeArray($data){
		$this->id = (isset($data['id'])) ? $data['id'] : null;
		$this->pessoa = (isset($data['pessoa'])) ? $data['pessoa'] : null;
		$this->link = (isset($data['link'])) ? $data['link'] : null;

	}
}
