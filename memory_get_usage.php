<?php

function memory_usage() {
	$mem_usage = memory_get_usage(true);
	if ($mem_usage < 1024) {
		$mem_usage .= ' bytes';
	} elseif ($mem_usage < 1048576) {
		$mem_usage = round($mem_usage/1024,2) . ' kilobytes';
	} else {
		$mem_usage = round($mem_usage/1048576,2) . ' megabytes';
	}
	return $mem_usage;
}


echo 'Memory usage from <em>memory_get_usage()</em>: ' . memory_usage() . '<br>';
echo "\n";
$k=1;
$data = null;
while($k< 10000) {
	$data []= "data";
	$k++;
}


echo "\n";
echo 'Memory usage from <em>memory_get_usage()</em>: ' . memory_usage() . '<br>';
echo "\n";
echo 'Memory usage from <em>memory_get_usage()</em>: ' . memory_get_peak_usage() . '<br>';
