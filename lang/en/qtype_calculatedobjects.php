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
//
// $Id: qtype_calculatedobjects.php,v 1.2 2010/09/08 21:14:57 nfreear Exp $.

require_once(__DIR__ .'/../../lib.php');


$string['pluginname'] = 'Calculated Objects';
$string['pluginname_help'] = 'Object calculated questions enable individual numerical questions to be created using wildcards that are substituted with individual values when the quiz is taken. Simple calculated questions offer the most used features of the calculated question with a simpler creation interface.';
$string['pluginname_link'] = 'question/type/calculatedobjects';
$string['pluginnameadding'] = 'Adding a Object calculated question';
$string['pluginnameediting'] = 'Editing an Object calculated question';
$string['pluginnamesummary'] = 'An extension of calculated questions which allows you to quickly set questions like "<em>How much is {apples} + {oranges}?</em>" They are like numerical questions but with the numbers used selected randomly from a set when the quiz is taken.';

// Language strings for creating/ editing questions.
$string['addingcalculatedobjects'] = 'Adding a Calculated Objects question';
$string['calculatedobjects']       = 'Calculated Objects';
// New question popup - restricted space.
$string['calculatedobjectssummary'] = $qco_summary = 'An extension of calculated questions which allows you to quickly set questions like "<em>How much is {apples} + {oranges}?</em>" They are like numerical questions but with the numbers used selected randomly from a set when the quiz is taken.';
// Help popup - more space.
$string['calculatedobjects_help']  = "<div class=qco-help>$qco_summary. Supported objects: <ul>"
  . qtype_calculatedobjects_lib::object_names_implode('<li>')
  . ' </ul></div>';
$string['editingcalculatedobjects'] = 'Editing a Calculated Objects question';
$string['calculatedobjects_inputhint'] = 'I\'m expecting a number';

$string['mandatoryhdr'] = 'Mandatory wild cards present in answers';
$string['possiblehdr']  = 'Possible wild cards present only in the question text';

// The objects. I suggest we use plurals.
// Synonyms/ aliases for 'apple'.
$string['greenapple'] = 'apples';
$string['redapple'] = 'apples';

// Other objects.
$string['apple' ]  = 'apples';
$string['orange']  = 'oranges';
$string['pear'  ]  = 'pears';
$string['pineapple'] = 'pineappples';
$string['cookie']  = 'cookies';
$string['cup']     = 'cups';
$string['coffee']  = 'cups of coffee';
$string['walnut']  = 'walnuts';
$string['tomato']  = 'tomatoes';
$string['cake']    = 'cakes';
$string['pencil']  = 'pencils';
$string['car']     = 'cars';

// End.
