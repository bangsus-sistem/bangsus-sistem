<template>
    <MobileCardSpinnerError
        :loading="loading"
        :error="error"
        :error-message="errorMessage"
    >
        <template v-slot:always-render>
            <ButtonRouterLinkBack :default-back-link="defaultBackLink" />
        </template>
        <slot></slot>
    </MobileCardSpinnerError>
</template>

<script>
import MobileCardSpinnerError from './MobileCardSpinnerError'
import ButtonRouterLinkBank from '../buttons/router-link/actions/ButtonRouterLinkBack'

export default {
    components: {
        MobileCardSpinnerError,
        ButtonRouterLinkBank,
    },
    props: {
        loading: {
            type: Boolean,
            default: false,
        },
        error: {
            type: Boolean,
            default: false,
        },
        errorMessage: {
            default: '',
        },
        defaultBackLink: {
            default() {
                return { name: 'dashboard' }
            }
        },
    }
}
</script>