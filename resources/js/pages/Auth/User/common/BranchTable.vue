<template>
    <bsb-table-responsive v-if="!allBranches">
        <bsb-table>
            <tbody>
                <bsb-tr
                    v-for="(branch, i) in resources['branches']"
                    :key="i"
                >
                    <bsb-td>
                        {{ i + 1 }}
                    </bsb-td>
                    <bsb-td>
                        {{ branch['code'] }}
                    </bsb-td>
                    <bsb-td>
                        {{ branch['name'] }}
                    </bsb-td>
                    <bsb-td>
                        {{ branch['branch_type']['code'] }} - {{ branch['branch_type']['name'] }}
                    </bsb-td>
                    <bsb-td
                        justify="center"
                    >
                        <bsb-switch-icon
                            :value="branchIsChecked(branch['id'])"
                            v-if="readonly"
                        />
                        <input
                            type="checkbox"
                            v-model="branchIds"
                            :value="branch['id']"
                            v-else
                        >
                    </bsb-td>
                </bsb-tr>
            </tbody>
        </bsb-table>
    </bsb-table-responsive>
</template>

<script>
export default {
    props: {
        resources: {
            required: true,
            type: Object,
        },
        value: {
            type: Array,
        },
        readonly: {
            type: Boolean,
            default: false,
        },
        allBranches: {
            type: Boolean,
            required: true,
        },
    },
    created() {
        this.branchIds = this.value
    },
    data() {
        return {
            branchIds: [],
        }
    },
    methods: {
        branchIsChecked(branchId) {
            return lodash.includes(this.branchIds, branchId)
        },
    },
    watch: {
        branchIds(ne, old) {
            this.$emit('input', ne)
        },
    },
}
</script>