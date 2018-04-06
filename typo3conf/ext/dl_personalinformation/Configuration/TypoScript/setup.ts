
plugin.tx_dlpersonalinformation_personalinformation {
    view {
        templateRootPaths.0 = EXT:dl_personalinformation/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlpersonalinformation_personalinformation.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_personalinformation/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlpersonalinformation_personalinformation.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_personalinformation/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlpersonalinformation_personalinformation.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlpersonalinformation_personalinformation.persistence.storagePid}
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
plugin.tx_dlpersonalinformation._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-dl-personalinformation table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-dl-personalinformation table th {
        font-weight:bold;
    }

    .tx-dl-personalinformation table td {
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
page.includeJSFooter.dl_personalinformation = EXT:dl_personalinformation/Resources/Public/Js/dl_personalinformation.js
page.includeCSS.dl_personalinformation = EXT:dl_personalinformation/Resources/Public/Css/dl_personalinformation.css

plugin.tx_dlpersonalinformation_personalinformation.settings {
    updateLandlordPID = {$plugin.tx_dlpersonalinformation_personalinformation.settings.updateLandlordPID}
    updateTenantPID = {$plugin.tx_dlpersonalinformation_personalinformation.settings.updateTenantPID}
    deleteFeuserPID = {$plugin.tx_dlpersonalinformation_personalinformation.settings.deleteFeuserPID}
}