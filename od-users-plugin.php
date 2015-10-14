<?php
/*
Plugin Name: ondrejd's Users Plugin
Plugin URI: https://github.com/ondrejd/od-users-plugin/
Description: WordPress plug-in for managing contact forms and users.
Version: 0.1
Author: Ondřej Doněk
Author URI: http://ondrejdonek.blogspot.cz/
*/

/*  ***** BEGIN LICENSE BLOCK *****
    Version: MPL 1.1
    
    The contents of this file are subject to the Mozilla Public License Version 
    1.1 (the "License"); you may not use this file except in compliance with 
    the License. You may obtain a copy of the License at 
    http://www.mozilla.org/MPL/
    
    Software distributed under the License is distributed on an "AS IS" basis,
    WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
    for the specific language governing rights and limitations under the
    License.
    
    The Original Code is WordPress Photogallery Plugin.
    
    The Initial Developer of the Original Code is
    Ondrej Donek.
    Portions created by the Initial Developer are Copyright (C) 2009
    the Initial Developer. All Rights Reserved.
    
    Contributor(s):
    
    ***** END LICENSE BLOCK ***** */

// TODO Add test if autoload exists! Otherwise show message to the user.
require_once dirname(__FILE__) . '/vendor/autoload.php';

/**
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @since 0.1
 */
class odWpUsersPlugin extends \odwp\SimplePlugin
{
	protected $id = 'od-users-plugin';
	protected $version = '0.1';
	protected $textdomain = 'od-users-plugin';
	protected $admin_menu_position = 12;
    protected $enable_default_options_page = true;

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->init_locales();

		$this->options = array();
		$this->options[] = new \odwp\PluginOption(
			'save_contacts_as_users',
			__('Save contacts as users', $this->get_textdomain()),
			\odwp\PluginOption::TYPE_BOOL,
			true
		);
		$this->options[] = new \odwp\PluginOption(
			'send_welcome_email',
			__('Send welcome email', $this->get_textdomain()),
			\odwp\PluginOption::TYPE_BOOL,
			true
		);
		$this->options[] = new \odwp\PluginOption(
			'send_welcome_email_template',
			__('Welcome email template', $this->get_textdomain()),
			\odwp\PluginOption::TYPE_STRING,
			'default',
			__('Test description…', $this->get_textdomain())
		);

		parent::__construct();
	}

    /**
     * Returns title of the plug-in.
     *
     * @since 0.1
     * @param string $suffix (Optional.)
     * @param string $sep (Optional.)
     * @return string
     */
    public function get_title($suffix = '', $sep = ' - ') {
		if (empty($suffix)) {
			return __('Contacts and Users', $this->get_textdomain());
		}

		return sprintf(
			__('Contacts and Users%s%s', $this->get_textdomain()),
			$sep,
			$suffix
		);
	}
} // End of odWpUsersPlugin

// ===========================================================================
// Plugin initialization

global $od_users_plugin;

$od_users_plugin = new odWpUsersPlugin();
