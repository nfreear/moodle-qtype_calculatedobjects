<?php //$Id: qtype_calculatedobjects.php,v 1.2 2010/09/08 21:14:57 nfreear Exp $

require_once __DIR__ .'/../../renderer.php';


$string['pluginname'] = 'Calculated Objects';

// Language strings for creating/ editing questions.
$string['addingcalculatedobjects'] = 'Adding a Calculated Objects question';
$string['calculatedobjects']       = 'Calculated Objects';
// New question popup - restricted space.
$string['calculatedobjectssummary']= $qco_summary =
'An extension of calculated questions which allows you to quickly set questions like "<em>How much is {apples} + {oranges}?</em>" They are like numerical questions but with the numbers used selected randomly from a set when the quiz is taken.';
// Help popup - more space.
$string['calculatedobjects_help']  =
  "<div class=qco-help>$qco_summary. Supported objects: <ul>"
  . qtype_calculatedobjects_renderer::object_names_implode('<li>')
  . ' </ul></div>';
$string['editingcalculatedobjects']= 'Editing a Calculated Objects question';

$string['mandatoryhdr'] = 'Mandatory wild cards present in answers';
$string['possiblehdr']  = 'Possible wild cards present only in the question text';

// The objects. I suggest we use plurals.
$string['greenapple'] = //Synonyms/ aliases for 'apple'.
$string['redapple']=
$string['apple' ]  = 'apples';
$string['orange']  = 'oranges';
$string['pear'  ]  = 'pears';
$string['pineapple']='pineappples';
$string['cookie']  = 'cookies';
$string['cup']     = 'cups';
$string['coffee']  = 'cups of coffee';
$string['walnut']  = 'walnuts';
$string['tomato']  = 'tomatoes'; 
$string['cake']    = 'cakes';
$string['pencil']  = 'pencils';
$string['car']     = 'cars';

//End.
