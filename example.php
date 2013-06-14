<?php
// Require class file
require_once('libs/ReadableNumbers.class.php');

// Get the instance
$ReadableNumbers = ReadableNumbers::getInstance();

// English is default, let's configure a German notation
$ReadableNumbers::setFormattingOptions(1, '.', ',');
$ReadableNumbers::setAbbreviations(array(' Tsd.', ' Mio.', ' Mrd.', ' Bio.', ' Brd.'));

// Just some examples, feel free to try a number up to quadrillions :-)
echo $ReadableNumbers::outputReadableNumber(16234);
echo $ReadableNumbers::outputReadableNumber('34.564.443');
echo $ReadableNumbers::outputReadableNumber(15733256486.14)