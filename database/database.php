<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'links',
    'username'  => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

/*
Capsule::schema()->create('links', function($table)
{
    $table->increments('id');
    $table->string('url')->unique();
		$table->string('session');
		$table->boolean('visited');
    $table->timestamps();
});
*/
