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


$plugin->component = 'qtype_calculatedobjects';
$plugin->version  = 2011051900;
//N: $plugin->version   = 2011102700;

$plugin->requires = 2011051212;
//N: $plugin->requires  = 2011102700;
$plugin->dependencies = array(
    'qtype_calculated' => 2011051900,
    //'qtype_calculated' => 2011102700,
);
$plugin->cron     = 0;           // Period for cron to check this module (secs)
$plugin->release  = '0.98 (Build: 2012060200)'; // User-friendly version number
$plugin->maturity  = MATURITY_BETA;
