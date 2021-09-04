<template>
    <CardBodySpinner :loading="loading">
        <slot name="always-render"></slot>
        <template v-if="error">
            <Alert color="danger" class="mt-3">
                {{ errorMessage }}
            </Alert>
        </template>
        <template v-else>
            <slot></slot>
        </template>
    </CardBodySpinner>
</template>

<script>
import CardBodySpinner from './CardBodySpinner'
import Alert from '../alerts/Alert'

export default {
    components: {
        CardBodySpinner,
        Alert,
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
    }
}
</script>