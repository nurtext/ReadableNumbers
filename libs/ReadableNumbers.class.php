<?php
/**
 * ReadableNumbers
 * 
 * Generates human readable text out of large numbers
 *
 * @author	Cedric Kastner <nurtext@me.com>
 * @version	1.0.0
 */
class ReadableNumbers 
{
	// Stores the Singleton instance
	static private $instance			= NULL;
	
	// No of decimals
	static private $decimals			= 1;
	
	// Decimal point
	static private $dec_point			= '.';
	
	// Thousands separator
	static private $thousands_sep		= ',';
	
	// Stores the abbreviations
	static private $abbr				= array('K', 'M', 'B', 'TN', 'Q');
	
	// Stores the readable number
	static private $readable			= '';
	
	// Static class, forbid constructing/cloning
	private function __construct(){}
	private function __clone(){}
	
	// Get the current instance or create one if it doesn't exist
	static public function getInstance()
	{
		if (self::$instance === NULL)
		{
			self::$instance = new self;
		}
		
		return self::$instance;
		
	}
	
	// Sets formatting options for output
	static public function setFormattingOptions($decimals = 1, $dec_point = '.', $thousands_sep = ',')
	{
		self::$decimals			= $decimals;
		self::$dec_poins		= $dec_point;
		self::$thousands_sep	= $thousands_sep;
		
	}
	
	// Sets the abbreviations for shortened numbers
	static public function setAbbreviations($abbr)
	{
		self::$abbr = $abbr;
		
	}
	
	// Generates the readable output
	static public function generateReadableOutput($number)
	{
		// Removes anything that isn't a number (even a prefixed 0!)
		$number = intval((0 + preg_replace('/[^0-9]/', '', $number)));
		
		// Don't proceed if we don't have a numeric value
		if (!is_numeric($number)) return FALSE;
		
		// I prefer nice switch statements instead of nasty if-else-elseif logics ;-)
		switch (TRUE)
		{
			// Quadrillions
			case ($number >= 1000000000000000):
				self::$readable = number_format(($number / 1000000000000000), self::$decimals, self::$dec_point, self::$thousands_sep) . self::$abbr[4];
				break;
			
			// Trillions
			case ($number >= 1000000000000):
				self::$readable = number_format(($number / 1000000000000), self::$decimals, self::$dec_point, self::$thousands_sep) . self::$abbr[3];
				break;
				
			// Billions
			case ($number >= 1000000000):
				self::$readable = number_format(($number / 1000000000), self::$decimals, self::$dec_point, self::$thousands_sep) . self::$abbr[2];
				break;
			
			// Millions
			case ($number >= 1000000):
				self::$readable = number_format(($number / 1000000), self::$decimals, self::$dec_point, self::$thousands_sep) . self::$abbr[1];
				break;
				
			// Thousands
			case ($number >= 100000):
				self::$readable = number_format(($number / 1000), self::$decimals, self::$dec_point, self::$thousands_sep) . self::$abbr[0];
				break;
				
			// Low enough to read 
			default:
				self::$readable = number_format($number, 0, self::$dec_point, self::$thousands_sep);
				break;
			
		}
		
		return self::$readable;
		
	}

	// Outputs the readable number
	static public function outputReadableNumber($number)
	{
		return self::generateReadableOutput($number) ?: FALSE;
		
	}
	
}