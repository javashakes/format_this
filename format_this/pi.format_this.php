<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Format This!
 *
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		Matthew Kirkpatrick
 * @copyright   Copyright (c) 2020, Matthew Kirkpatrick
 * @link		https://github.com/javashakes
 */

// config
include(PATH_THIRD.'format_this/config.php');

// EE v2 backward compatibility
// Ignored by EE v3+
$plugin_info = array(
	'pi_name'			=> FORMAT_THIS_NAME,
	'pi_version'		=> FORMAT_THIS_VERSION,
	'pi_author'			=> FORMAT_THIS_AUTHOR,
	'pi_author_url'		=> FORMAT_THIS_AUTHOR_URL,
	'pi_description'	=> FORMAT_THIS_DESC,
	'pi_usage'			=> Format_this::usage()
);

class Format_this {

	public $return_data = '';
    
	/**
	 * Constructor
     *
     * @access  public
     * @return  string
    */
	public function __construct()
	{
		// default output
		$this->return_data = '' . FORMAT_THIS_NAME . '<br>' . FORMAT_THIS_DESC;
	}
	
	/**
	 * STRING FORMATTING
     *
     * @access  public
     * @return  string
    */
	public function string ()
	{
		$input		= "Hello World! The quick brown fox jumps over the lazy dog.";
		$actions	= ee()->TMPL->fetch_param('actions', NULL);

		// From Publish page
		if (!empty($direct) && "" != $direct) { $input = $direct; }

		// From a tag parameter
		else if (
			NULL !== ee()->TMPL->fetch_param('string', NULL) &&
			"" != ee()->TMPL->fetch_param('string', NULL)
		) {
			$input = ee()->TMPL->fetch_param('string', NULL);
		}
		// From tag pair data
		else if (
			'' != ee()->TMPL->tagdata
		) {
			$input = ee()->TMPL->tagdata;
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
	
	/**
	 * NUMBER FORMATTING
     *
     * @access  public
     * @return  string
    */
	public function number ()
	{
		$input			= 0.0;
		$decimals		= ee()->TMPL->fetch_param('decimals', NULL);
		$dec_point		= ee()->TMPL->fetch_param('dec_point', NULL);
		$thousands_sep	= ee()->TMPL->fetch_param('thousands_sep', NULL);

		// From Publish page
		if (!empty($direct) && 0.0 != floatval($direct)) { $input = floatval($direct); }

		// From a tag parameter
		else if (
			NULL !== ee()->TMPL->fetch_param('number', NULL) &&
			0.0 != floatval(ee()->TMPL->fetch_param('number', NULL))
		) {
			$input = ee()->TMPL->fetch_param('number', NULL);
		}
		// From tag pair data
		else if (
			'' != ee()->TMPL->tagdata &&
			0.0 != floatval(ee()->TMPL->tagdata)
		) {
			$input = ee()->TMPL->tagdata;
		}
		
		$output = number_format($input, $decimals, $dec_point, $thousands_sep);
		
		return $output;
	}

	/**
	 * STRIP CHARACTERS
     *
     * @access  public
     * @return  string
    */
	public function strip ()
	{
		$input		= "Hello World! The quick brown fox jumps over the lazy dog.";
		$find		= ee()->TMPL->fetch_param('find', NULL);
		$replace	= ee()->TMPL->fetch_param('replace', NULL);

		// From Publish page
		if (!empty($direct) && "" != $direct) { $input = $direct; }

		// From a tag parameter
		else if (
			NULL !== ee()->TMPL->fetch_param('string', NULL) &&
			"" != ee()->TMPL->fetch_param('string', NULL)
		) {
			$input = ee()->TMPL->fetch_param('string', NULL);
		}
		// From tag pair data
		else if (
			'' != ee()->TMPL->tagdata
		) {
			$input = ee()->TMPL->tagdata;
		}
		
		$output = $input;
		
		$find = explode("&&", $find);
		$replace = explode("&&", $replace);
		
		$output = str_replace($find, $replace, $output);
		
		return $output;

	}
	
	/**
	 * Plugin Usage for EE2
     *
     * @access  public
     * @return  string
    */
	public static function usage()
	{
		$output = file_get_contents(PATH_THIRD.'format_this/README.md');

		// converts Markdown to HTML
		ee()->load->add_package_path(PATH_THIRD.FORMAT_THIS_PACKAGE.'/');
		ee()->load->library('parsedown/parsedown');
		$usage = new Parsedown();
		$output = strip_tags($usage->text($output));

		return $output;
	}
}

/* End of file pi.format_this.php */
/* Location: /system/expressionengine/third_party/format_this/pi.format_this.php */