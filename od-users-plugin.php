<?php
/*
Plugin Name: odUsersPlugin
Plugin URI: https://wordpress.org/plugins/od-users-plugin/
Description: ...
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
	protected $options = array(
		'save_contacts_as_users' => true,
		'send_welcome_email' => true
	);
	// ...
} // End of odWpUsersPlugin

// ===========================================================================
// Plugin initialization

global $od_users_plugin;

$od_users_plugin = new odWpUsersPlugin();
