
plugin.tx_dlsearchestates_searchestates {
    view {
        # cat=plugin.tx_dlsearchestates_searchestates/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_searchestates/Resources/Private/Templates/
        # cat=plugin.tx_dlsearchestates_searchestates/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_searchestates/Resources/Private/Partials/
        # cat=plugin.tx_dlsearchestates_searchestates/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_searchestates/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlsearchestates_searchestates//a; type=string; label=Default storage PID
        storagePid =
    }
}
