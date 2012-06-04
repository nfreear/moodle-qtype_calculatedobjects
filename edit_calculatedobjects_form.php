<?php  // $Id: edit_calculatedobjects_form.php,v 1.1 2010/09/04 11:36:31 deraadt Exp $
/**
 * Defines the editing form for the calculated objects question type.
 *
 * @copyright &copy; 2007 Jamie Pratt
 * @author Jamie Pratt me@jamiep.org
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package    qtype
 * @subpackage calculatedobjects
 */
require_once("$CFG->dirroot/question/type/calculated/edit_calculated_form.php");

/**
 * calculatedobjects editing form definition - just
 * extend the calculated editing form and leave empty, for now.
 */
// Moodle 2.1+ compatible class names.
class qtype_calculatedobjects_edit_form extends qtype_calculated_edit_form {
}
?>