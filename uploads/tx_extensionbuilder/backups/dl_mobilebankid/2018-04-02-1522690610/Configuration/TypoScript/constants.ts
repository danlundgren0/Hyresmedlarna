
plugin.tx_dlmobilebankid_mobilebankid {
    view {
        # cat=plugin.tx_dlmobilebankid_mobilebankid/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_mobilebankid/Resources/Private/Templates/
        # cat=plugin.tx_dlmobilebankid_mobilebankid/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_mobilebankid/Resources/Private/Partials/
        # cat=plugin.tx_dlmobilebankid_mobilebankid/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_mobilebankid/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlmobilebankid_mobilebankid//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_dlmobilebankid_ajaxrequest {
    view {
        # cat=plugin.tx_dlmobilebankid_ajaxrequest/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_mobilebankid/Resources/Private/Templates/
        # cat=plugin.tx_dlmobilebankid_ajaxrequest/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_mobilebankid/Resources/Private/Partials/
        # cat=plugin.tx_dlmobilebankid_ajaxrequest/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_mobilebankid/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlmobilebankid_ajaxrequest//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
plugin.tx_dlmobilebankid_mobilebankid.settings {
    # cat=plugin.tx_dlmobilebankid_mobilebankid/a; type=string; label=Path to public certificate    
    cacert = 
    # cat=plugin.tx_dlmobilebankid_mobilebankid/b; type=string; label=Path to local certificate 
    localcert = 
    # cat=plugin.tx_dlmobilebankid_mobilebankid/c; type=string; label=Path to private key   
    prikey = 
    # cat=plugin.tx_dlmobilebankid_mobilebankid/d; type=string; label=Your message to feuser    
    uservisibledata = 
    # cat=plugin.tx_dlmobilebankid_mobilebankid/e; type=int; label=tenantLoginPid
    tenantLoginPid = 
    # cat=plugin.tx_dlmobilebankid_mobilebankid/f; type=int; label=landlordLoginPid
    landlordLoginPid =
    # cat=plugin.tx_dlmobilebankid_mobilebankid/g; type=int; label=tenantGroupuid
    tenantGroupuid =  
    # cat=plugin.tx_dlmobilebankid_mobilebankid/h; type=int; label=landlordGroupuid
    landlordGroupuid =  
    # cat=plugin.tx_dlmobilebankid_mobilebankid/i; type=int; label=already Registered PID
    alreadyRegisteredPID =  
    # cat=plugin.tx_dlmobilebankid_mobilebankid/j; type=int; label=register success PID
    registerSuccessPID =  
}