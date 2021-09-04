<template>
    <div>
        <Textarea
            :value="value"
            @input="$emit('input', $event)"
            :class="{ 'is-invalid': errors.length > 0 }"
            :readonly="readonly"
        />
        <ErrorsWrapper :errors="errors" />
    </div>
</template>

<script>
import Textarea from './Textarea'
import ErrorsWrapper from '../form/ErrorsWrapper'

export default {
    components: {
        Textarea,
        ErrorsWrapper,
    },
    props: {
        value: {
            default: '',
        },
        errors: {
            type: Array,
            default() {
                return []
            },
        },
        readonly: {
            type: Boolean,
            default: false,
        }
    },
}
</script>