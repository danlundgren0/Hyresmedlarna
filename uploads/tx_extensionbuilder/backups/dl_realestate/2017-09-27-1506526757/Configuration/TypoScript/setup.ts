
plugin.tx_dlrealestate_realestate {
    view {
        templateRootPaths.0 = EXT:dl_realestate/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlrealestate_realestate.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_realestate/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlrealestate_realestate.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_realestate/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlrealestate_realestate.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlrealestate_realestate.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_dlrealestate._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-dl-realestate table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-dl-realestate table th {
        font-weight:bold;
    }

    .tx-dl-realestate table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder