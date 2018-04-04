
plugin.tx_dlmobilebankid_mobilebankid {
    view {
        templateRootPaths.0 = EXT:dl_mobilebankid/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlmobilebankid_mobilebankid.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_mobilebankid/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlmobilebankid_mobilebankid.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_mobilebankid/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlmobilebankid_mobilebankid.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlmobilebankid_mobilebankid.persistence.storagePid}
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

plugin.tx_dlmobilebankid_ajaxrequest {
    view {
        templateRootPaths.0 = EXT:dl_mobilebankid/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_dlmobilebankid_ajaxrequest.view.templateRootPath}
        partialRootPaths.0 = EXT:dl_mobilebankid/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_dlmobilebankid_ajaxrequest.view.partialRootPath}
        layoutRootPaths.0 = EXT:dl_mobilebankid/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_dlmobilebankid_ajaxrequest.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_dlmobilebankid_ajaxrequest.persistence.storagePid}
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
plugin.tx_dlmobilebankid._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-dl-mobilebankid table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-dl-mobilebankid table th {
        font-weight:bold;
    }

    .tx-dl-mobilebankid table td {
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
plugin.tx_dlmobilebankid_mobilebankid {
    persistence {
        storagePid = {$plugin.tx_dlmobilebankid_mobilebankid.persistence.storagePid}
        recursive = 99
    }
}
#Copy this to TCA if extension builder overwrites it
#$GLOBALS['TCA']['fe_groups']['columns']['user_type']['config']['items'] = array(
#   ['-Not set', 0],
#   ['Tenant', 1],
#   ['Landlord', 2] 
#);


plugin.tx_dlmobilebankid_mobilebankid.settings {
    cacert = {$plugin.tx_dlmobilebankid_mobilebankid.settings.cacert}
    localcert = {$plugin.tx_dlmobilebankid_mobilebankid.settings.localcert}
    prikey = {$plugin.tx_dlmobilebankid_mobilebankid.settings.prikey}
    uservisibledata = {$plugin.tx_dlmobilebankid_mobilebankid.settings.uservisibledata}
    feusergroupsuid = {$plugin.tx_dlmobilebankid_mobilebankid.settings.feusergroupsuid}
    tenantLoginPid = {$plugin.tx_dlmobilebankid_mobilebankid.settings.tenantLoginPid}
    landlordLoginPid = {$plugin.tx_dlmobilebankid_mobilebankid.settings.landlordLoginPid}
    tenantGroupuid = {$plugin.tx_dlmobilebankid_mobilebankid.settings.tenantGroupuid}
    landlordGroupuid = {$plugin.tx_dlmobilebankid_mobilebankid.settings.landlordGroupuid}
    alreadyRegisteredPID = {$plugin.tx_dlmobilebankid_mobilebankid.settings.alreadyRegisteredPID}
    registerSuccessPID = {$plugin.tx_dlmobilebankid_mobilebankid.settings.registerSuccessPID}
}
page.includeJSFooter.formator = EXT:dl_mobilebankid/Resources/Public/Js/formator.min.js
page.includeJSFooter.dlbankid = EXT:dl_mobilebankid/Resources/Public/Js/bankid.js
page.includeCSS.dlbankid = EXT:dl_mobilebankid/Resources/Public/Css/dlbankid.css
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
        extensionName = DlMobilebankid
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