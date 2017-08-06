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

// $Id$
/**
 * The CALCULATED OBJECTS question type.
 *
 * Teachers can create questions like "How much is {apples} + {oranges}?"
 *  - where the {wildcards} become M and N x images of apples and oranges respectively.
 *
 * @package    qtype
 * @subpackage calculatedobjects
 * @copyright  2010 Nicholas Freear (except images, see README).
 * @author     N.D.Freear, 14 August 2010, 2 June 2012.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU Public License
 *
 * (Useful searches: 'calculated[objects]', qtype_calculated, 'question_calculated'.)
 */

// Comment QUESTION TYPE CLASS
require_once("$CFG->dirroot/question/type/calculated/questiontype.php");


// Moodle 2.1+ compatible class names.
class qtype_calculatedobjects extends qtype_calculated {
    // (...extends question_dataset_dependent_questiontype)

    // Object images $default_pix.. -- SEE: lib.php


    // Moodle 2.0 specific - test!
    public function __construct() {
        global $PAGE;
        if (isset($PAGE->requires)) {
            $PAGE->requires->css(
            'question/type/calculatedobjects/styles.css');#css.php?d='.$data->id)
        }
        return parent::__construct();
    }

    public function __get_virtual_qtype() { } // Parent.

    public function __supports_dataset_item_generation() { } // Parent.

    function __dataset_options($form, $name, $mandatory=true, $renameabledatasets=false) {
        // Takes datasets from the parent implementation but
        // filters options that are currently not accepted by calculated
        // It also determines a default selection...
        // $renameabledatasets not implemented anywhere
        list($options, $selected) = parent::dataset_options($form, $name, '', 'qtype_calculatedobjects');
        // list($options, $selected) = $this->dataset_optionsa($form, $name);

        $type = 1; // Only type = 1 (i.e. old 'LITERAL') has ever been used

        // ...

        return array($options, $selected);
    }


    // Legacy.
    /**
     * Runs all the code required to set up and save an essay question for testing purposes.
     * Alternate DB table prefix may be used to facilitate data deletion.
     */
    function generate_test($name, $courseid = null) {
        list($form, $question) = parent::generate_test($name, $courseid);
        $form->feedback = 1;
        $form->multiplier = array(1, 1);
        $form->shuffleanswers = 1;
        $form->noanswers = 1;
        $form->qtype = 'calculated';  #@TODO.N. Do we change this line? (Change next ones!)
        $question->qtype = 'calculatedobjects';
        $form->answers = array('{apples} + {oranges}');
        $form->fraction = array(1);
        $form->tolerance = array(0.01);
        $form->tolerancetype = array(1);
        $form->correctanswerlength = array(2);
        $form->correctanswerformat = array(1);
        $form->questiontext = "What is {apples} + {oranges}?";

        if ($courseid) {
            $course = get_record('course', 'id', $courseid);
        }

        $new_question = $this->save_question($question, $form, $course);

        $dataset_form = new stdClass();
        $dataset_form->nextpageparam["forceregeneration"] = 1;
        $dataset_form->calcmin = array(1 => 1.0, 2 => 1.0);
        $dataset_form->calcmax = array(1 => 10.0, 2 => 10.0);
        $dataset_form->calclength = array(1 => 1, 2 => 1);
        $dataset_form->number = array(1 => 5.4 , 2 => 4.9);
        $dataset_form->itemid = array(1 => '' , 2 => '');
        $dataset_form->calcdistribution = array(1 => 'uniform', 2 => 'uniform');
        $dataset_form->definition = array(1 => "1-0-a",
                                        2 => "1-0-b");
        $dataset_form->nextpageparam = array('forceregeneration' => false);
        $dataset_form->addbutton = 1;
        $dataset_form->selectadd = 1;
        $dataset_form->courseid = $courseid;
        $dataset_form->cmid = 0;
        $dataset_form->id = $new_question->id;
        $this->save_dataset_items($new_question, $dataset_form);

          return $new_question;
    }
}
// Comment END OF CLASS //




function __qtype_calculatedobjects_calculate_answer($formula, $individualdata,
    $tolerance, $tolerancetype, $answerlength, $answerformat = '1', $unit = '') {
    // The return value has these properties:
    // ->answer    the correct answer
    // ->min       the lower bound for an acceptable response
    // ->max       the upper bound for an accetpable response

    // Exchange formula variables with the correct values...
    $answer = question_bank::get_qtype('calculated')->substitute_variables_and_eval(
            $formula, $individualdata);
    // if ('1' = $answerformat) { /* Answer is to have $answerlength decimals */
    $calculated = null;

    // ...

    // Comment Return the result
    return $calculated;
}


function __qtype_calculatedobjects_find_formula_errors($formula) {
    // Parent.
    // Comment Validates the formula submitted from the question edit page.
    // Comment Returns false if everything is alright.
        // ...

        // } else {
        // Formula just might be valid
        return false;
    // }
}