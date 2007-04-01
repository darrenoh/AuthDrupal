######################################################################
# User authentication via Drupal using AuthDrupal
# AuthDrupal v 0.3.2, 2007-0725

// disable registration and sign-in from the wiki front page
$wgGroupPermissions['*']['edit'] = false; // MediaWiki 1.5+ Settings
$wgGroupPermissions['*']['createaccount'] = false; // MediaWiki 1.5+ Settings

$wgCookieDomain = '.yourdomain.com';

// is Drupal in a different database than Mediawiki?
$wgAuthDrupal_UseExtDatabase = true;

//NOTE: You only need the next four settings if you set $wgAuthDrupal_UseExtDatabase to true.
$wgAuthDrupal_MySQL_Host     = $wgDBserver;      // Drupal MySQL Host Name.
$wgAuthDrupal_MySQL_Username = $wgDBuser;        // Drupal MySQL Username.
$wgAuthDrupal_MySQL_Password = $wgDBpassword;    // Drupal MySQL Password.
$wgAuthDrupal_MySQL_Database = 'drpl';           // Drupal MySQL Database Name.

$wgAuthDrupal_TablePrefix      = "";
$wgAuthDrupal_UserTable     = 'users';        // name of drupal user table without prefix; normally 'users'


// $wgAuthDrupal_GetRealNames :
// Drupal's default user table schema does not include a field for real names
// If you use Drupal's profile.module and add fields profile_first_name and
// profile_last_name, the Auth Module can copy the names into the user's
// wiki profile
$wgAuthDrupal_GetRealNames = false;

// You probably do not need to change these
// $wgAuthDrupal_RealNames_fields_table; // set if different than 'profile_fields'
// $wgAuthDrupal_RealNames_values_table; // set if different than 'profile_values'

// $wgAuthDrupal_RealNames_first_name_field; // set if different than 'profile_first_name'
// $wgAuthDrupal_RealNames_last_name_field;  // set if different than 'profile_last_name'

// set to false to retain wiki's own login/logout
$wgAuthDrupal_ReplaceLogin = true;

// if ReplaceLogin is true, set these URLs to appropriate targets:
$wgAuthDrupal_LoginURL = 'http://yourdomain.com/drupal/';
$wgAuthDrupal_LogoutURL = 'http://yourdomain.com/drupal/?q=logout';

// Do you want status messages in your Drupal watchdog log?
$wgAuthDrupal_LogMessages = false;

require_once 'extensions/AuthDrupal/AuthDrupal.php';
SetupAuthDrupal();