<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "bootstrap_grids".
 *
 * Auto generated 09-06-2017 19:15
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Grids for bootstrap',
  'description' => 'Gridelements for bootstrap. Column grids, grids for simple accordions, tabs and content slider.',
  'category' => 'misc',
  'author' => 'Pascal Mayer',
  'author_email' => 'typo3@bsdist.ch',
  'author_company' => '',
  'version' => '1.4.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearCacheOnLoad' => 1,
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '8.7.0-8.7.99',
      'gridelements' => '8.0.0-0.0.0',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  'autoload' => 
  array (
    'psr-4' => 
    array (
      'Laxap\\BootstrapGrids\\' => 'Classes',
    ),
  ),
  'clearcacheonload' => true,
);

