<?php
/**
 * Calculated Objects question definition class.
 *
 * @package    qtype
 * @subpackage calculated
 * @copyright  2011 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/calculated/question.php');
//N: require_once($CFG->dirroot . '/question/type/numerical/question.php');


/**
 * Represents a calculated question.
 *
 * @copyright  2011 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_calculatedobjects_question extends qtype_calculated_question
//N: class qtype_calculated_question extends qtype_numerical_question
        implements qtype_calculated_question_with_expressions {

}
