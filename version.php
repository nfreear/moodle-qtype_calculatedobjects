<?php
/**
* Version information for the calculatedobjects question type.
*
* @package qtype
* @subpackage calculatedobjects
* @copyright 2010 Nicholas Freear (except images, see readme).
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v2 or later
*/

defined('MOODLE_INTERNAL') || die();

///  Called by moodle_needs_upgrading() and /admin/index.php
// See: http://docs.moodle.org/dev/version.php

$plugin->component= 'qtype_calculatedobjects';
$plugin->version  = 2011121300;  // The current module version (Date: YYYYMMDDXX)

#$plugin->requires = 2010090501;
$plugin->requires = 2007101000;  // Moodle 1.9.7 (Build: 20091126)
$plugin->dependencies = array(
    'qtype_calculated' => 2006032200,
);
$plugin->cron     = 0;           // Period for cron to check this module (secs)
$plugin->release  = '0.96 (Build: 2011121300)'; // User-friendly version number
$plugin->maturity = MATURITY_RC;
