<?php
require dirname(dirname(__FILE__)) . '/Guitar.php';

$gtr = new GD_Tab_Guitar();

assert($gtr->generate('G', array(3,2,0,0,0,3))->png() === $gtr->chord('G')->png());

assert($gtr->generate('G', '320003')->png() == $gtr->chord('G')->png());

assert($gtr->generate('G', array(3,2,0,0,0,3))->jpeg() === $gtr->chord('G')->jpeg());

assert($gtr->generate('G', '320003')->jpeg() == $gtr->chord('G')->jpeg());

assert($gtr->generate('G', array(3,2,0,0,0,3))->gif() === $gtr->chord('G')->gif());

assert($gtr->generate('G', '320003')->gif() == $gtr->chord('G')->gif());

assert(493 === count($gtr->allChords()));

$fileDir = dirname(__FILE__) . '/files/';

assert(file_get_contents($fileDir . 'FOO_x_10_12_12_11_10.png') === $gtr->generate('FOO', array('x',10,12,12,11,10))->png());

assert(file_get_contents($fileDir . 'BAR_206791.png') === $gtr->generate('BAR', '197602')->png());

assert(file_get_contents($fileDir . 'G_334553.png') === $gtr->generate('G', array(3,5,5,4,3,3))->png());

assert(file_get_contents($fileDir . 'C.png') === $gtr->chord('C')->png());

assert(file_get_contents($fileDir . 'D7.png') === $gtr->chord('D7')->png());

$gtr->generate('G', array(3,2,0,0,0,3))->png($fileDir . 'TEST.png');
assert(file_get_contents($fileDir . 'TEST.png') === $gtr->chord('G')->png());
unlink($fileDir . 'TEST.png');

$message;
try {
    $gtr->chord('aaa');
} catch (Exception $e) {
    $message = $e->getMessage();
}

assert($message == 'undefined chord aaa');
