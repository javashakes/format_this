<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Format This! Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		Matthew Kirkpatrick
 * @link		http://www.designafterdusk.com
 */

$plugin_info = array(
	'pi_name'		=> 'Format This!',
	'pi_version'	=> '0.6',
	'pi_author'		=> 'Matthew Kirkpatrick',
	'pi_author_url'	=> 'http://www.designafterdusk.com',
	'pi_description'=> 'Format Numbers and Strings!',
	'pi_usage'		=> Format_this::usage()
);


class Format_this {

	public $return_data;
    
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		// Default output
		$this->return_data = "Format This! Please read the documentation.";
	}
	
	// STRING FORMATTING
	public function string ()
	{
		$input		= "Hello World! The quick brown fox jumps over the lazy dog.";
		$actions	= $this->EE->TMPL->fetch_param('actions', NULL);

		// From Publish page
		if (!empty($direct) && "" != $direct) { $input = $direct; }

		// From a tag parameter
		else if (
			NULL !== $this->EE->TMPL->fetch_param('string', NULL) &&
			"" != $this->EE->TMPL->fetch_param('string', NULL)
		) {
			$input = $this->EE->TMPL->fetch_param('string', NULL);
		}
		// From tag pair data
		else if (
			'' != $this->EE->TMPL->tagdata
		) {
			$input = $this->EE->TMPL->tagdata;
		}
		
		$output = $input;
		
		/*	&& is the delimeter
			strtoupper
			strtolower
			ucfirst
			lcfirst
			ucwords
			stripslashes
			trim
		*/
		$actions = explode("&&", $actions);

		for ($a = 0; isset($actions[$a]); $a++)
		{
			$func = $actions[$a];
			$output = $func($output);
		}
		
		return $output;

	}
	
	// NUMBER FORMATTING
	public function number ()
	{
		$input			= 0.0;
		$decimals		= $this->EE->TMPL->fetch_param('decimals', NULL);
		$dec_point		= $this->EE->TMPL->fetch_param('dec_point', NULL);
		$thousands_sep	= $this->EE->TMPL->fetch_param('thousands_sep', NULL);

		// From Publish page
		if (!empty($direct) && 0.0 != floatval($direct)) { $input = floatval($direct); }

		// From a tag parameter
		else if (
			NULL !== $this->EE->TMPL->fetch_param('number', NULL) &&
			0.0 != floatval($this->EE->TMPL->fetch_param('number', NULL))
		) {
			$input = $this->EE->TMPL->fetch_param('number', NULL);
		}
		// From tag pair data
		else if (
			'' != $this->EE->TMPL->tagdata &&
			0.0 != floatval($this->EE->TMPL->tagdata)
		) {
			$input = $this->EE->TMPL->tagdata;
		}
		
		$output = number_format($input, $decimals, $dec_point, $thousands_sep);
		
		return $output;
	}

	// STRIP CHARACTERS
	public function strip ()
	{
		$input		= "Hello World! The quick brown fox jumps over the lazy dog.";
		$find		= $this->EE->TMPL->fetch_param('find', NULL);
		$replace	= $this->EE->TMPL->fetch_param('replace', NULL);

		// From Publish page
		if (!empty($direct) && "" != $direct) { $input = $direct; }

		// From a tag parameter
		else if (
			NULL !== $this->EE->TMPL->fetch_param('string', NULL) &&
			"" != $this->EE->TMPL->fetch_param('string', NULL)
		) {
			$input = $this->EE->TMPL->fetch_param('string', NULL);
		}
		// From tag pair data
		else if (
			'' != $this->EE->TMPL->tagdata
		) {
			$input = $this->EE->TMPL->tagdata;
		}
		
		$output = $input;
		
		$find = explode("&&", $find);
		$replace = explode("&&", $replace);
		
		$output = str_replace($find, $replace, $output);
		
		return $output;

	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>
------------------------------
 {exp:format_this:string}
------------------------------

 PARAMETERS
-------------------------
string - (string $input = "") The string being formatted.
actions - (array $actions = "[actions&&listed&&below]") Multiple allowed. Executed in order of listing.
   • strtoupper
   • strtolower
   • ucfirst
   • lcfirst
   • ucwords
   • stripslashes
   • trim

 EXAMPLES
-------------------------
{exp:format_this:string}
- Returns: Hello World! The quick brown fox jumps over the lazy dog.

{exp:format_this:string string="Hello World!"}
- Returns: Hello World!

{exp:format_this:string}Hello World!{/exp:format_this:string}
- Returns: Hello World!


------------------------------
 {exp:format_this:number}
------------------------------

 PARAMETERS
-------------------------
number - (float $input = 0.0) The number being formatted.
decimals - (int $decimals = 0) Sets the number of decimal points.
dec_point - (string $dec_point = ".") Sets the separator for the decimal point.
thousands_sep - (string $thousands_sep = ",") Sets the thousands separator.


 EXAMPLES
-------------------------
{exp:format_this:number number="1234.56"}
- Returns: 1,234

{exp:format_this:number number="1234.56" decimals="2"}
- Returns: 1,234.56

{exp:format_this:number number="1234.56" decimals="2" dec_point="," thousands_sep="."}
- Returns: 1.234,56

{exp:format_this:number}1234.56{/exp:format_this:number}
- Returns: 1,234

{exp:format_this:number number="1234.56" decimals="2"}1234.56{/exp:format_this:number}
- Returns: 1,234.56

{exp:format_this:number number="1234.56" decimals="2" dec_point="," thousands_sep="."}1234.56{/exp:format_this:number}
- Returns: 1.234,56


------------------------------
 {exp:format_this:strip}
------------------------------

 PARAMETERS
-------------------------
string - (string $input = "") The string being formatted.
find - (array $find = "[characters&&to&&find]") Multiple allowed. Executed in order of listing.
replace - (array $replace = "[characters&&for&&replace]") Multiple allowed. Executed in order of listing.

 EXAMPLES
-------------------------
{exp:format_this:strip}
- Returns: Hello World! The quick brown fox jumps over the lazy dog.

{exp:format_this:strip string="Hello World!"}
- Returns: Hello World!

{exp:format_this:strip}Hello World!{/exp:format_this:string}
- Returns: Hello World!

<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.format_this.php */
/* Location: /system/expressionengine/third_party/format_this/pi.format_this.php */