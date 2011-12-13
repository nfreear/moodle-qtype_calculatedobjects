<?php // $Id: version.php,v 1.1 2011/12/13 11:36:31 nfreear Exp $
      //calculatedobjects

///////////////////////////////////////////////////////////////////////////
///  Called by moodle_needs_upgrading() and /admin/index.php

$plugin->version  = 2010090200;  // The current module version (Date: YYYYMMDDXX)
#$plugin->requires = 2010090501;
$plugin->requires = 2007101000;  // Moodle 1.9.7 (Build: 20091126) qtype_calculated.
$plugin->cron     = 0;           // Period for cron to check this module (secs)

$release = "0.9alpha";             // User-friendly version number

