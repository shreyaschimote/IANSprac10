<?php
function encode(string $plainMessage, int $rails): string{
	$chars = mb_str_split($plainMessage);
	$pattern = range(0, $rails-1);
	if ($rails-2 >= 1) {
		$pattern = array_merge($pattern, range($rails-2, 1));
	}
	$fence = [];
	for ($i = 0; $i < $rails; $i++) {
		$fence[$i] = [];
	}
	for ($i = 0; $i < count($chars); $i++) {
		$rail = $pattern[$i % count($pattern)];
		$fence[$rail][$i] = $chars[$i];
	}
	$result = "";
	foreach ($fence as $rail) {
		$result .= implode("", $rail);
	}
	return $result;
}
function decode(string $cipherMessage, int $rails): string{
	$fence = [];
	$chars = str_split($cipherMessage);
	for ($i = 0; $i < $rails; $i++) {
		$fence[$i] = array_fill(0, count($chars), null);
	}
	$pattern = range(0, $rails-1);
	if ($rails-2 >= 1) {
		$pattern = array_merge($pattern, range($rails-2, 1));
	}
	for ($i = 0; $i < count($chars); $i++) {
		$rail = $pattern[$i % count($pattern)];
		$fence[$rail][$i] = '*';
	}
	$index = 0;
	for ($y = 0; $y < $rails; $y++) {
		for ($x = 0; $x < count($chars); $x++) {
			if ($fence[$y][$x] && $index < count($chars)) {
				$fence[$y][$x] = $chars[$index++];
			}
		}
	}
	$result = "";
	for ($i = 0; $i < count($chars); $i++) {
		$rail = $pattern[$i % count($pattern)];
		$result .= $fence[$rail][$i];
	}
	return $result;
}
?>