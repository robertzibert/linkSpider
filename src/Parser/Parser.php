<?php

namespace robertzibert\linkSpider\Parser;

use Sunra\PhpSimple\HtmlDomParser;

class Parser{

	public $url;
	public $endpoint;

	public function __construct($url, $endpoint = null){

		$this->url = $url;
		$this->endpoint = $endpoint;
		$this->setDom($this->url . $this->endpoint);

	}

	function getATags(){
			return $this->dom->find('a');
	}

	function getButtonTags(){
			return $this->dom->find('button');
	}

	function getImgTags(){
			return $this->dom->find('img');
	}

	function getAll(){

		$elements = [
			'hrefs'   => $this->getATags(),
			'imgs'    => $this->getButtonTags(),
			'buttons' => $this->getImgTags(),

		];

		return $elements;
	}

	function setDom($url){
		$this->dom = HtmlDomParser::file_get_html($url);
	}

}
