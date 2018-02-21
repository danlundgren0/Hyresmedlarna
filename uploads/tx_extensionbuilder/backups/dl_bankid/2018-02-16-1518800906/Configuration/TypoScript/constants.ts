
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

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder