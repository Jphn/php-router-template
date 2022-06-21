<?php

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../configs/routes/index.php';

function de(mixed $value): void // FIXME - Debug only!
{
	var_dump($value);
	exit;
}