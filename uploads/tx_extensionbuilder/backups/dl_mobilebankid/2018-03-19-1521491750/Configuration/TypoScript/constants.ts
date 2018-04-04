
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