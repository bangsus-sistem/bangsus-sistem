
export default {
    prefix: 'bsb',
    components: {
        /**
         * Access
         */
        'access-wrapper': require('./access/AccessWrapper').default,

        /**
         * Alerts
         */
        'alert': require('./alerts/Alert').default,
        'alert-dismissible': require('./alerts/AlertDismissible').default,

        /**
         * Badge.
         */
        'badge': require('./badge/Badge').default,
        'switch-badge': require('./badge/SwitchBadge').default,

        /**
         * Breadcrumb.
         */
        'breadcrumb': require('./breadcrumb/Breadcrumb').default,
        'breadcrumb-item': require('./breadcrumb/BreadcrumbItem').default,

        /**
         * Buttons
         */
        // Actions
        'button-activate': require('./buttons/actions/ButtonActivate').default,
        'button-admit': require('./buttons/actions/ButtonAdmit').default,
        'button-create': require('./buttons/actions/ButtonCreate').default,
        'button-deactivate': require('./buttons/actions/ButtonDeactivate').default,
        'button-delete': require('./buttons/actions/ButtonDelete').default,
        'button-post': require('./buttons/actions/ButtonPost').default,
        'button-read': require('./buttons/actions/ButtonRead').default,
        'button-update': require('./buttons/actions/ButtonUpdate').default,
        // Contents
        'button-activate-content': require('./buttons/contents/ButtonActivateContent').default,
        'button-back-content': require('./buttons/contents/ButtonBackContent').default,
        'button-create-content': require('./buttons/contents/ButtonCreateContent').default,
        'button-deactivate-content': require('./buttons/contents/ButtonDeactivateContent').default,
        'button-delete-content': require('./buttons/contents/ButtonDeleteContent').default,
        'button-post-content': require('./buttons/contents/ButtonPostContent').default,
        'button-read-content': require('./buttons/contents/ButtonReadContent').default,
        'button-update-content': require('./buttons/contents/ButtonUpdateContent').default,
        // Router Link
        'button-router-link-back': require('./buttons/router-link/actions/ButtonRouterLinkBack').default,
        'button-router-link-create': require('./buttons/router-link/actions/ButtonRouterLinkCreate').default,
        'button-router-link-delete': require('./buttons/router-link/actions/ButtonRouterLinkDelete').default,
        'button-router-link-read': require('./buttons/router-link/actions/ButtonRouterLinkRead').default,
        'button-router-link-update': require('./buttons/router-link/actions/ButtonRouterLinkUpdate').default,
        'button-router-link': require('./buttons/router-link/ButtonRouterLink').default,

        'button': require('./buttons/Button').default,
        'button-group': require('./buttons/ButtonGroup').default,
        'button-link': require('./buttons/ButtonLink').default,
        'button-spinner': require('./buttons/ButtonSpinner').default,
        'close-button': require('./buttons/CloseButton').default,

        /**
         * Card
         */
        'card': require('./card/Card').default,
        'card-body': require('./card/CardBody').default,
        'card-body-spinner': require('./card/CardBodySpinner').default,
        'card-body-spinner-error': require('./card/CardBodySpinnerError').default,
        'card-body-spinner-error-back': require('./card/CardBodySpinnerErrorBack').default,
        'card-header': require('./card/CardHeader').default,
        'mobile-card-spinner': require('./card/MobileCardSpinner').default,
        'mobile-card-spinner-error': require('./card/MobileCardSpinnerError').default,
        'mobile-card-spinner-error-back': require('./card/MobileCardSpinnerErrorBack').default,
        'mobile-query-form': require('./card/MobileQueryForm').default,

        /**
         * Flashers
         */
        'flashers': require('./flashers/Flashers').default,
        'flasher-wrapper': require('./flashers/FlasherWrapper').default,

        /**
         * Form
         */
        'errors-wrapper': require('./form/ErrorsWrapper').default,
        'form-check': require('./form/FormCheck').default,
        'form-check-label': require('./form/FormCheckLabel').default,
        'form-group': require('./form/FormGroup').default,
        'form-inline': require('./form/FormInline').default,
        'form-radios': require('./form/FormRadios').default,
        'form-row': require('./form/FormRow').default,
        'modal-form': require('./form/ModalForm').default,

        /**
         * Icon
         */
        'icon': require('./icons/Icon').default,
        'feather-icon': require('./icons/FeatherIcon').default,
        'switch-icon': require('./icons/SwitchIcon').default,

        /**
         * Input
         */
        'errors': require('./input/Errors').default,
        'input': require('./input/Input').default,
        'input-append-prepend': require('./input/InputAppendPrepend').default,
        'input-append-prepend-errors': require('./input/InputAppendPrependErrors').default,
        'input-errors': require('./input/InputErrors').default,
        'input-group': require('./input/InputGroup').default,
        'input-group-append': require('./input/InputGroupAppend').default,
        'input-group-prepend': require('./input/InputGroupPrepend').default,
        'input-group-text': require('./input/InputGroupText').default,
        'option-active': require('./input/OptionActive').default,
        'select': require('./input/Select').default,
        'select-errors': require('./input/SelectErrors').default,
        'textarea': require('./input/Textarea').default,
        'textarea-errors': require('./input/TextareaErrors').default,

        /**
         * List
         */
        'list-group': require('./list/ListGroup').default,
        'list-group-empty': require('./list/ListGroupEmpty').default,
        'list-group-item': require('./list/ListGroupItem').default,
        'list-group-item-content': require('./list/ListGroupItemContent').default,

        /**
         * Mode
         */
        'screen-mode-wrapper': require('./mode/ScreenModeWrapper').default,

        /**
         * Navbar
         */
        'navbar': require('./navbar/Navbar').default,

        /**
         * Pagination
         */
        'data-index': require('./pagination/DataIndex').default,
        'item-count': require('./pagination/ItemCount').default,
        'item-count-label': require('./pagination/ItemCountLabel').default,
        'item-count-select': require('./pagination/ItemCountSelect').default,
        'page-button-group': require('./pagination/PageButtonGroup').default,
        'refresh-button': require('./pagination/RefreshButton').default,

        /**
         * Sample
         */
        'sample': require('./sample/Sample').default,

        /**
         * Screeen
         */
        'screen': require('./screen/Screen').default,

        /**
         * Sidebar
         */
        'sidebar': require('./sidebar/Sidebar').default,
        'sidebar-bars-button': require('./sidebar/SidebarBarsButton').default,
        'sidebar-collapse': require('./sidebar/SidebarCollapse').default,
        'sidebar-collapse-item': require('./sidebar/SidebarCollapseItem').default,
        'sidebar-item': require('./sidebar/SidebarItem').default,
        'sidebar-item-icon': require('./sidebar/SidebarItemIcon').default,
        'sidebar-items': require('./sidebar/SidebarItems').default,
        'sidebar-item-title': require('./sidebar/SidebarItemTitle').default,
        'sidebar-item-toggle-icon': require('./sidebar/SidebarItemToggleIcon').default,
        'sidebar-mobile': require('./sidebar/SidebarMobile').default,
        'sidebar-title': require('./sidebar/SidebarTitle').default,

        /**
         * Spinner
         */
        'spinner': require('./spinner/Spinner').default,

        /**
         * Table
         */
        'table': require('./table/Table').default,
        'table-responsive': require('./table/TableResponsive').default,
        'table-responsive-footer': require('./table/TableResponsiveFooter').default,
        'table-responsive-header': require('./table/TableResponsiveHeader').default,
        'tbody-empty': require('./table/TbodyEmpty').default,
        'td': require('./table/Td').default,
        'th': require('./table/Th').default,
        'th-query': require('./table/ThQuery').default,
        'th-sort': require('./table/ThSort').default,
        'tr': require('./table/Tr').default,
        'tr-query': require('./table/TrQuery').default,
        'tr-sort': require('./table/TrSort').default,

        /**
         * Utils
         */
        'col': require('./utils/Col').default,
        'container-fluid': require('./utils/ContainerFluid').default,
        'image-capturer': require('./utils/ImageCapturer.vue').default,
        'image-uploader': require('./utils/ImageUploader.vue').default,
        'image-viewer': require('./utils/ImageViewer.vue').default,
        'page-wrapper': require('./utils/PageWrapper').default,
        'page-wrapper-mobile': require('./utils/PageWrapperMobile').default,
        'row': require('./utils/Row').default,
        'user-admit': require('./utils/UserAdmit').default,
        'user-create': require('./utils/UserCreate').default,
        'user-timestamps': require('./utils/UserTimestamps').default,
        'user-update': require('./utils/UserUpdate').default,
    }
}
