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
$plugin->version  = 2012061400;

$plugin->requires = 2011070100;    // Moodle 2.1 official.
$plugin->requires_human = '2.1.x'; // NDF: my idea!
//N: $plugin->requires  = 2011102700;
$plugin->dependencies = array(
    'qtype_calculated' => 2011051900,
    //'qtype_calculated' => 2011102700,
);
$plugin->cron     = 0;           // Period for cron to check this module (secs)
$plugin->release  = '2.1.x-1.1 (Build: 2012061400)'; // User-friendly version number
$plugin->maturity  = MATURITY_BETA;
