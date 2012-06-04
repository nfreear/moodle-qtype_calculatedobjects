<?php
/**
 * Serve question type files
 *
 * @since      2.0
 * @package    qtype
 * @subpackage calculatedobjects
 * @copyright  Dongsheng Cai <dongsheng@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 * Checks file access for calculated questions.
 */
function qtype_calculatedobjects_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload) {
    global $CFG;
    require_once($CFG->libdir . '/questionlib.php');
    question_pluginfile($course, $context, 'qtype_calculatedobjects', $filearea, $args, $forcedownload);
}

