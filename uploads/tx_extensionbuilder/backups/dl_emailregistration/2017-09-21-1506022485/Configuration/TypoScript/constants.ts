
plugin.tx_dlemailregistration_emailregistration {
    view {
        # cat=plugin.tx_dlemailregistration_emailregistration/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:dl_emailregistration/Resources/Private/Templates/
        # cat=plugin.tx_dlemailregistration_emailregistration/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:dl_emailregistration/Resources/Private/Partials/
        # cat=plugin.tx_dlemailregistration_emailregistration/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:dl_emailregistration/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_dlemailregistration_emailregistration//a; type=string; label=Default storage PID
        storagePid =
    }
}
