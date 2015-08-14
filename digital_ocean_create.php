<?php

require 'vendor/autoload.php';

use DigitalOceanV2\Adapter\BuzzAdapter;
use DigitalOceanV2\DigitalOceanV2;

$token = getenv('TOKEN');

$adapter = new BuzzAdapter($token);
$digitalocean = new DigitalOceanV2($adapter);
$droplet = $digitalocean->droplet();

// $names = ['murap'];
$names = ['yamaguchi', 'kazuma', 'minami', 'kojima', 'murayama', 'ken', 'mukoyama', 'hasegawa'];

foreach ($names as $name) {
	$created = $droplet->create($name, 'sgp1', '512mb', 'ubuntu-14-04-x64');
	echo "created $name." . PHP_EOL;
}
