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
 * Calculated Objects question renderer class.
 *
 * @package    qtype
 * @subpackage calculatedobjects
 * @copyright  2011 The Open University
 * @copyright  2010 Nicholas Freear (except images, see README).
 * @author     N.D.Freear, 2 June 2012.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');
require_once($CFG->dirroot . '/question/type/calculated/renderer.php');


/**
 * Generates the output for calculated objects questions.
 */
class qtype_calculatedobjects_renderer extends qtype_calculated_renderer {

    /** Get an array of available object pictures or a single picture.
     * @return mixed
     */
    public static function object_pix($name = null) {
        return qtype_calculatedobjects_lib::object_pix($name);
    }

    /**
     * Substitute variables in questiontext to give a copy of
     * the question with pictures, and a 'plain' copy.
     * @return string
     */
    public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {
        global $CFG;

        $question = $qa->get_question();
        $qvalues = $question->vs->get_values();
        $qoperators = $question->vs->get_maths_operators();

        // Find the first math operator/symbol (+-*/)
        // - prevent mis-matches on <br /> etc. below.
        $classes = '';
        $op = $opreplace = '+';

        $ops = array('+' => '+', '-' => '&ndash;', '*' => '&times;', '/' => '<hr class ="o"/>', '%' => '%');
        $op = $qoperators[1];
        $opreplace = $ops[$qoperators[1]];
        if ('/' == $op) {
            $classes .= 'vertical';
        }

        $objects = $patterns = $plains = array();

        foreach ($qvalues as $key => $multiply) {

            // Trim plural 's' and check against supported wildcards.
            // (Later we may take the first or last '-' separated token(s). For $class='file-uploads-apple-2')
            $name = preg_replace('#_?\d$#', '', $key);
            $class = rtrim($name, 's');

            if (strlen($key) == 1) {
                $class = $key;
                $items = " <i class='big'>$multiply</i>";
                $plains[] = $items;
            } else if (! self::object_pix($class)) {
                // Error.
                $class = 'unknown';
                $items = " <i>?</i>";
                $plains[] = $items;
            } else {
                $pix = self::object_pix($class);
                global $CFG;
                $src = "$CFG->wwwroot/question/type/calculatedobjects/pix/$pix";
                $item = "<img\n alt='' src='$src' />";
                $items = str_repeat($item, $multiply);

                // Internationalization.
                $plains[] = "<i>$multiply ".
                    get_string($class, 'qtype_calculatedobjects')."</i>";
            }
            $objects[] = "<div align='center' class='$class'>$items</div>";
            $patterns[] = '{'.$key.'}';

            /*//? Remove trailing 's'
            $obj = rtrim($obj, 's');

            if (isset($object_pix[$obj])) {
                $pix = $object_pix[$obj];
            }
            else {
                $object_display .= "<i>unknown {$obj} ($multiplier)</i>";
            }*/
        }

        // Create the objects/pictures string.
        $objectstr = $objects[0] ."<p class='op $classes'>$op_replace</p>". $objects[1];
        // Comment #$plain_str = str_replace($patterns, $plains, $qtext);
        // Comment #$plain_str = preg_replace("#\[[\+\-\*\/%]\]#", '', $plain_str);

        $qtextanswer = parent::formulation_and_controls($qa, $options);

        // HTML5 form validation.
        if (!isset($CFG->calculatedobjects_html5) || $CFG->calculatedobjects_html5 == true) {
            $hint = get_string('calculatedobjects_inputhint', 'qtype_calculatedobjects');
            $qtextanswer = preg_replace('#(<input[^>]*name="q\d+:\d+_answer")#',
                '$1 pattern="-?\d{1,3}(\.\d*)?" maxlength="6" required title="'. $hint .'"',
                $qtextanswer);
        }

        // Comment #<h3 class="qco-text">$plain_str</h3>

        $qcoobjects = <<<EOT
        <div class="qco-objects $classes">$object_str
        <br style="clear:both;height:1px;" /></div>
EOT;

        // Optionally, start with the pictures then the text question..
        if (isset($CFG->calculatedobjects_pix_first)) {
            return $qcoobjects . $qtextanswer;
        }

        // Default: put the pictures between the question and the answer block.
        $ablockstart = '<div class="ablock">';
        return str_replace($ablockstart,
           $qcoobjects . $ablockstart, $qtextanswer);
    }
}
