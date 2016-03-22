<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Link extends Eloquent{


	protected $fillable = [
		'url',
		'session',
		'visited',
		];

	public $timestamps  = true;

}
