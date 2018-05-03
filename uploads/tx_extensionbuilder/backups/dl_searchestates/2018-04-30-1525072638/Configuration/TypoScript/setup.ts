
plugin.tx_dlsearchestates_searchestates {
    view {
        templateRootPaths.0 = EXT:dl_searchestates/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlsearchestates_searchestates.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_searchestates/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlsearchestates_searchestates.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_searchestates/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlsearchestates_searchestates.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlsearchestates_searchestates.persistence.storagePid}
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
plugin.tx_dlsearchestates._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-dl-searchestates table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-dl-searchestates table th {
        font-weight:bold;
    }

    .tx-dl-searchestates table td {
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
plugin.tx_dlsearchestates_searchestates {
    persistence {
        storagePid = {$plugin.tx_dlrealestate_realestate.persistence.storagePid}
        recursive = 99
    }    
}
page.includeJSFooter.dl_searchestates = EXT:dl_searchestates/Resources/Public/Js/tx_dlsearchestates.js
page.includeCSS.dl_searchestates = EXT:dl_searchestates/Resources/Public/Css/tx_dlsearchestates.css