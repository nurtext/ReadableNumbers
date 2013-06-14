# ReadableNumbers

Generates human readable text out of large numbers.

## Examples

	123332      -> 123.3K  
	34564443    -> 34.5M  
	56568826284 -> 56.5B


## Usage instructions

### 1. Initialization

	<?php
	// Require class file
	require_once('libs/ReadableNumbers.class.php');
	
	// Get the instance
	$ReadableNumbers = ReadableNumbers::getInstance();
	
	
### 2. Optional: Set the output options

	// English is default, let's configure a German notation
	$ReadableNumbers::setFormattingOptions(1, '.', ',');
	$ReadableNumbers::setAbbreviations(array(' Tsd.', ' Mio.', ' Mrd.', ' Bio.', ' Brd.'));

### 3. Some example outputs

	// Just some examples, feel free to try a number up to quadrillions :-)
	echo $ReadableNumbers::outputReadableNumber(16234);
	echo $ReadableNumbers::outputReadableNumber('34564443');
	echo $ReadableNumbers::outputReadableNumber(15733256486.14);
	
## Requirements

- PHP 5.2

## Todo

Extend the class for use with timespans