<?php
/**
 * Calculated Objects question definition class.
 *
 * @package    qtype
 * @subpackage calculatedobjects
 * @copyright  2011 The Open University
 * @copyright  2012 Nicholas Freear
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/calculated/question.php');


if (!function_exists('_MY_debug')) {

function _MY_debug($exp) {
  static $where, $count = 0;
  //if (isset($_GET['debug']) /*|| variable_get('debug', NULL)*/ ) {
    # $where could be based on __FUNCTION__ or debug_stacktrace().
    if(!$where) $where = str_replace(array('_', '.'), '-', basename(__FILE__));
    header("X-D-$where-".sprintf('%02d', $count).': '.json_encode($exp));

    foreach (func_get_args() as $c => $arg) {
      if($c > 0) _MY_debug($arg); #Recurse.
    }
    $count++;
  //}
}
}


/**
 * Represents a calculated objects question.
 *
 * @copyright  2011 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_calculatedobjects_question extends qtype_calculated_question
//N: class qtype_calculated_question extends qtype_numerical_question
        implements qtype_calculated_question_with_expressions {

    public function __start_attempt(question_attempt_step $step, $variant) {
    }


    /// THE route in!

    /**
     * Copied from parent and modified.
     */
    public function apply_attempt_state(question_attempt_step $step) {
        qtype_calculatedobjects_question_helper::apply_attempt_state($this, $step);
        //parent::apply_attempt_state($step);
    }

}


/**
 * Copied from parent and modified.
 */
abstract class qtype_calculatedobjects_question_helper
        extends qtype_calculated_question_helper {

    public static function ___start_attempt(
            qtype_calculated_question_with_expressions $question,
            question_attempt_step $step, $variant) {
    }


    public static function apply_attempt_state(
            qtype_calculated_question_with_expressions $question, question_attempt_step $step) {
        $values = array();
        foreach ($step->get_qt_data() as $name => $value) {
            if (substr($name, 0, 5) === '_var_') {
                $values[substr($name, 5)] = $value;
            }
        }

        $question->vs = new qtype_calculatedobjects_variable_substituter(
                $values, get_string('decsep', 'langconfig'));

        _MY_debug(__METHOD__);

        $question->calculate_all_expressions();
    }
}


class qtype_calculatedobjects_variable_substituter
        extends qtype_calculated_variable_substituter {

    protected $_maths_operators_r;

    #? protected $_solution;


    /** Get the array of values and object-names.
     * @return array
     */
    public function get_values() {
        return $this->values;
    }

    /** Get the array of maths operators.
     * @return array
     */
    public function get_maths_operators() {
        return $this->_maths_operators_r;
    }


    /**
     * Todo: internationalize.
     */
    protected function substitute_values_pretty($text) {

        if (FALSE !== strpos($text, '{')) {
            #$this->_copy_questiontext = $text;

            // Find any [+] operators - a bit of a hack!
            if (preg_match('#[^<]([\+\-\*\/%])[^>]#', $text, $regs_op)) {
                $this->_maths_operators_r = $regs_op;
            }

            // Remove any [+] operators.
            $text = preg_replace('#\[[\+\-\*\/%]\]#', '', $text);

            // Append the search eg. {apples} to the value, eg. 4.
            foreach ($this->prettyvalue as $idx => $pvalue) {
                $this->prettyvalue[$idx] .= ' '. $this->search[$idx];
            }
        }

        return str_replace($this->search, $this->prettyvalue, $text);
    }


    public function __replace_expressions_in_text($text, $length=null, $format=null) {
    }
}

