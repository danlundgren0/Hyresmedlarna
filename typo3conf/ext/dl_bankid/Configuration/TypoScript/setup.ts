
plugin.tx_dlbankid_bankid {
    view {
        templateRootPaths.0 = EXT:dl_bankid/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlbankid_bankid.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_bankid/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlbankid_bankid.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_bankid/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlbankid_bankid.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlbankid_bankid.persistence.storagePid}
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

plugin.tx_dlbankid_ajaxrequest {
    view {
        templateRootPaths.0 = EXT:dl_bankid/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlbankid_ajaxrequest.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_bankid/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlbankid_ajaxrequest.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_bankid/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlbankid_ajaxrequest.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlbankid_ajaxrequest.persistence.storagePid}
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
plugin.tx_dlbankid._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-dl-bankid table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-dl-bankid table th {
        font-weight:bold;
    }

    .tx-dl-bankid table td {
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
plugin.tx_dlbankid_bankid.settings {
    cacert = {$plugin.tx_dlbankid_bankid.settings.cacert}
    localcert = {$plugin.tx_dlbankid_bankid.settings.localcert}
    prikey = {$plugin.tx_dlbankid_bankid.settings.prikey}
    uservisibledata = {$plugin.tx_dlbankid_bankid.settings.uservisibledata}
    feusergroupsuid = {$plugin.tx_dlbankid_bankid.settings.feusergroupsuid}
    feuserlandingpage = {$plugin.tx_dlbankid_bankid.settings.feuserlandingpage}
}
page.includeJSFooter.formator = EXT:dl_bankid/Resources/Public/Js/formator.min.js
page.includeJSFooter.dlbankid = EXT:dl_bankid/Resources/Public/Js/bankid.js
DlBankidAjaxPrototype = PAGE
DlBankidAjaxPrototype {
    typeNum = 666
    config {
        disableAllHeaderCode = 1
        xhtml_cleaning = 0
        admPanel = 0
        debug = 0
        no_cache = 1
        additionalHeaders = Content-type:application/json
    }
    10 = USER_INT
    10 {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        extensionName = DlBankid
        pluginName = Ajaxrequest
        vendorName = DanLundgren
        controller = AjaxRequest
        action = getJson
        switchableControllerActions {
            AjaxRequest {
                1 = getJson
            }
        }
    }
}
#lib.bankidlogin = USER
#lib.bankidlogin {
#    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
#    extensionName = DlBankid
#    pluginName = BankId
#    vendorName = DanLundgren
#    controller = BankId
#    action = loginbox
#}