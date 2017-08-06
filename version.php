<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version information  for the calculatedobjects question type.
 *
 * @package qtype
 * @subpackage calculatedobjects
 * @copyright 2010 Nicholas Freear (except images, see readme).
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v2 or later
 */

defined('MOODLE_INTERNAL') || die();

// Comment Called by moodle_needs_upgrading() and /admin/index.php .
// See: http://docs.moodle.org/dev/version.php .


$plugin->component = 'qtype_calculatedobjects';
$plugin->version  = 2012061400;

$plugin->requires = 2011070100;    // Moodle 2.1 official.
$plugin->requires_human = '2.1.x'; // NDF: my idea!
// N: $plugin->requires  = 2011102700;
$plugin->dependencies = array(
    'qtype_calculated' => 2011051900,
// 'qtype_calculated' => 2011102700,
);
$plugin->cron     = 0;           // Period for cron to check this module (secs)
$plugin->release  = '2.1.x-1.1 (Build: 2012061400)'; // User-friendly version number .
$plugin->maturity  = MATURITY_BETA;
