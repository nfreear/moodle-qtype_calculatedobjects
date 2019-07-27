Calculated Objects question type
================================

This a Moodle question type which extends the 'calculated' question type.
Teachers can create questions like `How much is {apples} + {oranges}?`
- where the `{wildcards}` become M and N x images of apples and oranges respectively.
It is aimed at pre/primary-school students (approximately age 3-9).

Note, this question type uses the database tables of the 'calculated' question type.

Tested with Moodle 1.9.7, 2.0.2 and 2.2.3.


Currently supported wildcards:
 apple, redapple, orange, pear, pineapple, tomato, walnut, cookie, cake, cup, car pencil
(each with or without an 's', eg. {cookies} and with an optional differentiator, eg. `{apples_1} + {apples_2}`).


Book
----
This plugin was initially developed to support the book
"Moodle 2 for Teaching 4-9 Year Olds", by Nicholas Freear,
published 2011 by Packt Publishing [isbn:978-1-84951-328-9]
<http://bit.ly/packt-moodle4-9-book>


Links
-----
* Moodle plugin entry: <http://moodle.org/plugins/view.php?plugin=qtype_calculatedobjects>
* (Old plugin page: <http://moodle.org/mod/data/view.php?rid=4143>)
* Wiki: <http://docs.moodle.org/en/Calculated_Objects_question_type>
* Discussion: <http://moodle.org/mod/forum/discuss.php?d=156605>
* Bugs: <http://tracker.moodle.org/browse/CONTRIB/component/10720>
* Code, Git: <https://github.com/nfreear/moodle-qtype_calculatedobjects>
* (Old code, CVS: <http://cvs.moodle.org/contrib/plugins/question/type/calculatedobjects/>)
* Demo: <http://freear.org.uk/moodle>


Releases
--------
Note, the version number 2.1.x-1.0 indicates that this is version 1.0 of the
plugin for version 2.1.x onwards of Moodle (this follows the Drupal model).

There are currently two branches of development:

* MOODLE_21_STABLE - for Moodle 2.1.x onwards, including Moodle 2.2.x - active development;
* MOODLE_20_STABLE - for Moodle 1.9.x and Moodle 2.0.x - bug fixes only.


Releases Notes
--------------
14 June 2012 / 2.1.x-1.1-beta:

* Added to README 'install' section; fixed $plugin->requires.

5 June 2012 / 2.1.x-1.0-beta:

* Added support for the Moodle 2.1+ question engine [CONTRIB-3684];
* Added HTML5 form validation to the student interface [CONTRIB-3687];
* Improvements to the popup help for authors.

13 December 2011 / 2.0.x-0.96-rc:

* Fixed requires bug in version.php [CONTRIB-3301].

24 April-7 May 2011:

* Moving to Github.
* Adding Moodle 2 support [CONTRIB-2888];
* Initial French language pack [CONTRIB-2924].

27 August-2 September 2010:

1. Renamed language string file, for auto-include (from CONTRIB-2308).
2. Renamed help file, for auto-include.
3. Added 2 missing language strings.
4. Verified that styles.css is being auto-included.
5. Simplified install instructions.
6. Fixed missing % modulo operator bug (CONTRIB-2308)
7. Added support for 'like' objects, eg. `{apples_1} + {apples_2}` http://moodle.org/mod/forum/discuss.php?d=156605)
8. Added support for arbitrary single-character wildcards, eg. {apples} / {n}.
9. Support for more textual questions.
10. Improved layout/styling.


Install
-------
1. Download and uncompress the archive. The resulting directory may look something like `nfreear-moodle-qtype_calculatedobjects-1234567`.
2. Copy the it into the directory `{MOODLE}/question/type/` on your server and rename it `calculatedobjects` (no underscore).
3. Visit the administrator 'notifications' page, `http://moodle.example.org/admin/` - there are no database changes for this question type.

(Note, English language strings, help file, and styles will be auto-included.)

Upgrade
-------
To upgrade from previous versions:

1. Delete the `question/type/calculatedobjects` directory.
2. Delete `{MOODLE}/lang/en_utf8/help/quiz/calculatedobjects.html` (Moodle < 2.0)
3. Follow the install instructions above.

Notes
-----
TODO/ limitations:

* Add support for multiple operators (currently only 1 supported).
* Test with browsers.
* More testing of backup and restore.
* Work on validation functions (qtype_calculatedobjects_find_formula_errors).
* Tidy up.
* If there's demand, add ability to use custom icons/images.
* If there's demand, translation.

* Please look at Moodle documentation about plugins with missing strings in AMOS at https://docs.moodle.org/dev/Translating_plugins#Plugins_with_coding_errors :

The plugin code must not rely on trailing and leading whitespace in strings.
The string file must be considered as pure data file with the syntax $string['id'] = 'value';
No other PHP syntax such as concatenation, heredoc and nowdoc is supported by the tools that AMOS use when processing the strings (even if it may work in Moodle itself).
Use neither string concatenation operators nor other PHP logic inside string files. Those should really be considered as plain data files with simple $string['key'] = 'value'; syntax, nothing more.


Credits
-------
Calculated Objects question type. Copyright © 2010 Nicholas Freear.

* License: <http://gnu.org/copyleft/gpl.html> GNU GPL v2 or later.

Images. Various,

* See, pix/acknowledgements.txt 


[End.]
