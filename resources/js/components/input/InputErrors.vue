<template>
    <div>
        <Input
            :type="type"
            :step="step"
            :value="value"
            @input="$emit('input', $event)"
            :class="{ 'is-invalid': errors.length > 0 }"
            :readonly="readonly"
        />
        <Errors :errors="errors" />
    </div>
</template>

<script>
import Input from './Input'
import Errors from './Errors'

export default {
    components: {
        Input,
        Errors,
    },
    props: {
        type: {
            type: String,
            default: 'text',
        },
        step: {
            default: null,
        },
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