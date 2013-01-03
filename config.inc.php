<?php

/**
 * RexBrowscap Addon
 * Based on https://github.com/GaretJax/phpbrowscap/
 * @author st DOT jonathan AT gmail DOT com
 * @author rexdev.de
 * @package redaxo4.2
 * @version svn:$Id$
 */
 
// ADDON IDENTIFIER AUS ORDNERNAMEN ABLEITEN
////////////////////////////////////////////////////////////////////////////////
$mypage = 'rex_browscap';
$myroot = $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/';

// ADDON VERSION
////////////////////////////////////////////////////////////////////////////////
$Revision = '';
$REX['ADDON'][$mypage]['VERSION'] = array
(
'VERSION'      => 0,
'MINORVERSION' => 1,
'SUBVERSION'   => preg_replace('/[^0-9]/','',"$Revision$")
);

$REX['ADDON']['rxid'][$mypage]        = '714';
$REX['ADDON']['name'][$mypage]        = 'RexBrowscap';
$REX['ADDON']['version'][$mypage]     = implode('.', $REX['ADDON'][$mypage]['VERSION']);
$REX['ADDON']['author'][$mypage]      = 'rexdev.de';
$REX['ADDON']['supportpage'][$mypage] = 'forum.redaxo.de';


// SETTINGS
$REX['ADDON']['rex_browscap']['cache'] = $REX['HTDOCS_PATH'].'files/addons/rex_browscap/cache';
$REX['ADDON']['rex_browscap']['silent'] = true;
$REX['ADDON']['rex_browscap']['userAgent'] = 'Redaxo Addon "rex_browsecap" - version '.$REX['ADDON']['version'][$mypage];


// --- DYN
// --- /DYN


// REQUIRE LIBS BY PHP VERSION
////////////////////////////////////////////////////////////////////////////////
$phpversion = intval(PHP_VERSION);

switch($phpversion)
{
  case ($phpversion<4):
    rex_warning('Mindestens PHP4 benötigt!');
    break;

  case ($phpversion<5):
    // VERSION FÜR PHP 4
    rex_warning('Die PHP4 Version ist depreciated!');
    require_once('libs/php4/Browscap.php');
    break;

  default:
    // VERSION FÜR PHP 5
    require_once('libs/php5/Browscap.php');
    break;
}

// REQUIRE REX_GET_BROWSER FUNCTION
////////////////////////////////////////////////////////////////////////////////
require_once('functions/function.rex_get_browser.inc.php');

?>