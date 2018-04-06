
plugin.tx_dlpersonalinformation_personalinformation {
    view {
        # cat=plugin.tx_dlpersonalinformation_personalinformation/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_personalinformation/Resources/Private/Templates/
        # cat=plugin.tx_dlpersonalinformation_personalinformation/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_personalinformation/Resources/Private/Partials/
        # cat=plugin.tx_dlpersonalinformation_personalinformation/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_personalinformation/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlpersonalinformation_personalinformation//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
plugin.tx_dlpersonalinformation_personalinformation.settings {
    # cat=plugin.tx_dlpersonalinformation_personalinformation/a; type=string; label=Update Landlord Info PID    
    updateLandlordPID = 
    # cat=plugin.tx_dlpersonalinformation_personalinformation/b; type=string; label=Update Tenant Info PID    
    updateTenantPID = 
    # cat=plugin.tx_dlpersonalinformation_personalinformation/c; type=string; label=Delete account PID
    deleteFeuserPID = 
}