
plugin.tx_dlrealestate_realestate {
    view {
        # cat=plugin.tx_dlrealestate_realestate/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_realestate/Resources/Private/Templates/
        # cat=plugin.tx_dlrealestate_realestate/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_realestate/Resources/Private/Partials/
        # cat=plugin.tx_dlrealestate_realestate/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_realestate/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlrealestate_realestate//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder