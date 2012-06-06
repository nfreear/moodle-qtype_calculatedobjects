<?php
/**
 * Serve question type files
 *
 * @since      2.0
 * @package    qtype
 * @subpackage calculatedobjects
 * @copyright  Dongsheng Cai <dongsheng@moodle.com>
 * @copyright  2012 Nicholas Freear
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


class qtype_calculatedobjects_lib {

    // We have images for the following objects.
    protected static $default_pix = array(
        'apple' => 'apple-green-chrisdesign-75.png',
        'orange'=> 'orange-juice-75.png',
        'pear'  => 'pear-75.png',
        'pineapple'=>'pineapple-75.png',
        'cookie'=> 'cookie-tulliana-75.png',
        'coffee'=> 'coffee-icon-75.png',
        'walnut'=> 'walnut-60.png',
        // New objects.
        'cup'   => 'coffee-icon-75.png',
        'redapple' => 'apple-red-80.png',
        'greenapple'=>'apple-green-chrisdesign-75.png',
        'tomato'=> 'tomato-torrent-80.png',
        'cake'  => 'choc-cake-ill-70.png',
        'car'   => 'car-dodge-challenger-90.png',
        'pencil'=> 'pencil-red-emblem-75.png',
    );

    /**
     * Get a list of available objects, joined with $glue.
     * (Used in [QTYPE]/lang/*-/qtype_calculatedobjects.php)
     * @return string
     */
    public static function object_names_implode($glue = ', ') {
        return implode($glue, array_keys(self::$default_pix));
    }

    /** Get an array of available object pictures or a single picture.
     * @return mixed
     */
    public static function object_pix($name = NULL) {
        if (!$name) return self::$default_pix;
        return isset(self::$default_pix[$name]) ? self::$default_pix[$name] : NULL;
    }
}
