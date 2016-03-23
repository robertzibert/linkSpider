<?php
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('links', function($table)
{
    $table->increments('id');
    $table->string('url');
		$table->string('session');
		$table->boolean('visited');
		$table->string('type');
    $table->timestamps();
});
