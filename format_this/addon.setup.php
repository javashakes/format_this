<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

return array(
    'name'              => FORMAT_THIS_NAME,
    'version'           => FORMAT_THIS_VERSION,
    'author'            => FORMAT_THIS_AUTHOR,
    'author_url'        => FORMAT_THIS_AUTHOR_URL,
    'docs_url'          => FORMAT_THIS_DOCS,
    'description'       => FORMAT_THIS_DESC,
    'namespace'         => FORMAT_THIS_NAMESPACE,
    'settings_exist'    => FALSE
);

/* End of file addon.setup.php */
/* Location: /system/expressionengine/third_party/format_this/addon.setup.php */