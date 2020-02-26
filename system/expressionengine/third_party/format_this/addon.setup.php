<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Format This! Plugin
 *
 * @package		format_this
 * @subpackage	Addons
 * @category	Plugin
 * @author		Matthew Kirkpatrick
 * @link		http://www.designafterdusk.com
 */

// include config file
include(PATH_THIRD.'format_this/config.php');

return array(
    'author'            => FORMAT_THIS_AUTHOR,
    'author_url'        => FORMAT_THIS_AUTHOR_URL,
    'name'              => FORMAT_THIS_NAME,
    'description'       => FORMAT_THIS_DESC,
    'version'           => FORMAT_THIS_VERSION,
    'namespace'         => FORMAT_THIS_NAMESPACE,
    'docs_url'          => FORMAT_THIS_DOCS,
    'settings_exist'    => FALSE
);

/* End of file addon.setup.php */
/* Location: /system/expressionengine/third_party/format_this/addon.setup.php */