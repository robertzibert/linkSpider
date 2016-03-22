<?php

namespace robertzibert\linkSpider\Parser;

use Sunra\PhpSimple\HtmlDomParser;

class LinkScanner{
	//TODO: remove else
	public static function getAllLinks($elements){

		foreach ($elements as $element) {
			$link = $element->href;

			if(self::isExternal($link)){
				$result['external'][] = $link;
			}else{
				if(self::isLink($link)) $result['internal'][] = $link;
			}
		}
		return $result;

	}

	public static function isExternal($link){
		if (substr( $link, 0, 7 ) === "http://" ||
				substr($link, 0, 8) == "https://") {
			return true;
		}
	}

	public static function isLink($link){
		if (strpos($link, "/") === 0) return true;
	}

}
