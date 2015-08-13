<?php

require 'vendor/autoload.php';

use DigitalOceanV2\Adapter\BuzzAdapter;
use DigitalOceanV2\DigitalOceanV2;

$token = getenv('TOKEN');

$adapter = new BuzzAdapter($token);
$digitalocean = new DigitalOceanV2($adapter);

$droplet = $digitalocean->droplet();

$droplets = $droplet->getAll();

foreach ($droplets as $dl) {
	echo "deleted $dl->name($dl->id)." . PHP_EOL;
	$droplet->delete($dl->id);
}
