<?php
require 'vendor/autoload.php';
require 'database/database.php';
ini_set('display_errors', 1);

error_reporting(E_ALL);



use robertzibert\linkSpider\Parser\Parser;
use robertzibert\linkSpider\Parser\LinkScanner;

// Setting url

//init

$parentUrl = 'http://uai.cl';

$dom = new Parser($parentUrl);

$elements = $dom->getATags();

$domLinks = LinkScanner::getAllLinks($elements);

foreach($domLinks['internal'] as $domLink){
	$link = Link::firstOrNew([
		'url'     => $parentUrl . $domLink,
		'session' => $parentUrl
		]);

	$link->url     = 	$parentUrl . $domLink;
	$link->visited = false;
	$link->session = $parentUrl;
	$link->save();

}

while(Link::where('visited',0)->get()->count()>1){
		$links = Link::where('visited', 0)->get();

		foreach($links as $link){
			//update
			$link->visited = 1;
			$link->save();

			echo $link;
			$dom      = new Parser($link->url);
			$elements = $dom->getATags();
			$domLinks = LinkScanner::getAllLinks($elements);

			foreach($domLinks['internal'] as $domLink){
				$newLink = Link::firstOrNew([
					'url'     => $parentUrl . $domLink,
					'session' => $parentUrl
					]);
				$newLink->url     = $parentUrl . $domLink;
				$newLink->visited = false;
				$newLink->session = $parentUrl;
				$link->save();



			}


		}



}





/*
$climate = new League\CLImate\CLImate;
$climate->out('Hello my name is linkSpider,  lets spy some sites!.');

$input = $climate->input('Please give me an url');

$url = $input->prompt();
*/
