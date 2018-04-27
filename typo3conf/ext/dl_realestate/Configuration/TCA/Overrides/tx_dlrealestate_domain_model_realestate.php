<?php
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

// custom configuration for displaying fields in the overlay/reference table
// to use the imageoverlayPalette instead of the basicoverlayPalette
$GLOBALS['TCA']['tx_dlrealestate_domain_model_realestate']['columns']['upload_images1']['config']['foreign_match_fields'] = array(
    'fieldname' => 'upload_images1',
    'tablenames' => 'tx_dlrealestate_domain_model_realestate',
    'table_local' => 'sys_file',
);
$GLOBALS['TCA']['tx_dlrealestate_domain_model_realestate']['columns']['upload_images2']['config']['foreign_match_fields'] = array(
    'fieldname' => 'upload_images2',
    'tablenames' => 'tx_dlrealestate_domain_model_realestate',
    'table_local' => 'sys_file',
);
$GLOBALS['TCA']['tx_dlrealestate_domain_model_realestate']['columns']['upload_images3']['config']['foreign_match_fields'] = array(
    'fieldname' => 'upload_images3',
    'tablenames' => 'tx_dlrealestate_domain_model_realestate',
    'table_local' => 'sys_file',
);
$GLOBALS['TCA']['tx_dlrealestate_domain_model_realestate']['columns']['upload_images4']['config']['foreign_match_fields'] = array(
    'fieldname' => 'upload_images4',
    'tablenames' => 'tx_dlrealestate_domain_model_realestate',
    'table_local' => 'sys_file',
);
$GLOBALS['TCA']['tx_dlrealestate_domain_model_realestate']['columns']['upload_images5']['config']['foreign_match_fields'] = array(
    'fieldname' => 'upload_images5',
    'tablenames' => 'tx_dlrealestate_domain_model_realestate',
    'table_local' => 'sys_file',
);

                // custom configuration for displaying fields in the overlay/reference table
                // to use the imageoverlayPalette instead of the basicoverlayPalette
				/*
                'foreign_match_fields' => [
                    'fieldname' => 'image',
                    'tablenames' => 'tx_uploadexample_domain_model_example',
                    'table_local' => 'sys_file',
                ],
                */