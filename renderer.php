<?php
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

require_once($CFG->dirroot . '/question/type/calculated/renderer.php');


/**
 * Generates the output for calculated objects questions.
 */
class qtype_calculatedobjects_renderer extends qtype_calculated_renderer {

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

    /**
     * Substitute variables in questiontext to give a copy of
     * the question with pictures, and a 'plain' copy.
     * @return string
     */
	public function formulation_and_controls(question_attempt $qa,
            question_display_options $options) {
        global $CFG;

        $object_pix = self::$default_pix;

        $question = $qa->get_question();
        $q_values = $question->vs->get_values();
        $q_operators = $question->vs->get_maths_operators();


        // Find the first math operator/symbol (+-*/)
        // - prevent mis-matches on <br /> etc. below.
        $classes = '';
        $op = $op_replace = '+';

        $ops= array('+'=>'+', '-'=>'&ndash;', '*'=>'&times;', '/'=>'<hr class="o"/>', '%'=>'%');
        $op = $q_operators[1];
        $op_replace = $ops[$q_operators[1]];
        if ('/' == $op) {
            $classes .= 'vertical';
        }


        $objects = $patterns = $plains = array();

        foreach ($q_values as $key => $multiply) {
            
            // Trim plural 's' and check against supported wildcards.
            // (Later we may take the first or last '-' separated token(s). For $class='file-uploads-apple-2')
            $name = preg_replace('#_?\d$#', '', $key);
            $class= rtrim($name, 's');

            if (strlen($key) == 1) {
                $class= $key;
                $items = " <i class='big'>$multiply</i>";
                $plains[] = $items;
            }
            elseif (!isset($object_pix[$class])) { #in_array($class, self::$wildcards)) {
                // Error.
                $class = 'unknown';
                $items = " <i>?</i>";
                $plains[] = $items;
            } else {
                $pix = $object_pix[$class];
                global $CFG;
                $src = "$CFG->wwwroot/question/type/calculatedobjects/pix/$pix";
                $item = "<img\n alt='' src='$src' />";
                $items = str_repeat($item, $multiply);

                // Internationalization.
                $plains[] = "<i>$multiply ".
                    get_string($class, 'qtype_calculatedobjects')."</i>";
            }
            $objects[] = "<div align='center' class='$class'>$items</div>";
            $patterns[]= '{'.$key.'}';


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
        $object_str = $objects[0] ."<p class='op $classes'>$op_replace</p>". $objects[1];
        #$plain_str = str_replace($patterns, $plains, $qtext);
        #$plain_str = preg_replace("#\[[\+\-\*\/%]\]#", '', $plain_str);


        $qtext_answer = parent::formulation_and_controls($qa, $options);


        #<h3 class="qco-text">$plain_str</h3>

        $qco_objects = <<<EOT
        <div class="qco-objects $classes">$object_str
        <br style="clear:both;height:1px;" /></div>
EOT;

        // Optionally, start with the pictures then the text question..
        if (isset($CFG->calculatedobjects_pix_first)) {
            return $qco_objects . $qtext_answer;
        }

        // Default: put the pictures between the question and the answer block.
        $ablock_start = '<div class="ablock">';
        return str_replace($ablock_start,
    	    $qco_objects . $ablock_start, $qtext_answer);
    }
}
