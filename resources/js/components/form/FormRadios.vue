<template>
    <div v-frag>
        <FormCheck v-for="(option, i) in options" :key="i">
            <input class="form-check-input" type="radio" v-model="switchValue" :value="option.val" :disabled="readonly">
            <FormCheckLabel :label="option.label" />
        </FormCheck>
    </div>
</template>

<script>
import FormCheck from './FormCheck'
import FormCheckLabel from './FormCheckLabel'

export default {
    components: {
        FormCheck,
        FormCheckLabel,
    },
    props: {
        options: {
            type: Array,
            default() {
                return []
            },
        },
        value: {
            default: null,
        },
        readonly: {
            type: Boolean,
            default: false,
        },
    },
    created() {
        this.switchValue = this.value
    },
    data() {
        return {
            switchValue: null,
        }
    },
    watch: {
        switchValue(ne, old) {
            this.$emit('input', ne)
        }
    }
}
</script>