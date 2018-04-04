
plugin.tx_dlbankid_bankid {
    view {
        # cat=plugin.tx_dlbankid_bankid/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_bankid/Resources/Private/Templates/
        # cat=plugin.tx_dlbankid_bankid/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_bankid/Resources/Private/Partials/
        # cat=plugin.tx_dlbankid_bankid/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_bankid/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlbankid_bankid//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_dlbankid_ajaxrequest {
    view {
        # cat=plugin.tx_dlbankid_ajaxrequest/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_bankid/Resources/Private/Templates/
        # cat=plugin.tx_dlbankid_ajaxrequest/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_bankid/Resources/Private/Partials/
        # cat=plugin.tx_dlbankid_ajaxrequest/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_bankid/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlbankid_ajaxrequest//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
plugin.tx_dlbankid_bankid.settings {
    # cat=plugin.tx_dlbankid_bankid/a; type=string; label=Path to public certificate    
    cacert = 
    # cat=plugin.tx_dlbankid_bankid/b; type=string; label=Path to local certificate 
    localcert = 
    # cat=plugin.tx_dlbankid_bankid/c; type=string; label=Path to private key   
    prikey = 
    # cat=plugin.tx_dlbankid_bankid/d; type=string; label=Your message to feuser    
    uservisibledata = 
    # cat=plugin.tx_dlbankid_bankid/e; type=string; label=commaseparated list if uids    
    feusergroupsuid = 
    # cat=plugin.tx_dlbankid_bankid/f; type=string; label=feuserlandingpage
    feuserlandingpage = 
}