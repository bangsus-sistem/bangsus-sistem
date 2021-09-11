<template>
    <bsb-table-responsive v-if="!allFeatures">
        <bsb-table>
            <thead>
                <bsb-tr>
                    <bsb-th>#</bsb-th>
                    <bsb-th></bsb-th>
                    <bsb-th
                        justify="center"
                        v-for="(action, i) in resources['actions']"
                        :key="i"
                    >
                        {{ action['ref'] }}
                    </bsb-th>
                </bsb-tr>
            </thead>
            <tbody>
                <template
                    v-for="_package in resources['packages']"
                >
                    <!-- Package Title -->
                    <bsb-tr :key="'package-row-' + _package['id']">
                        <bsb-td :colspan="packageTitleColspan">
                            <b>
                                {{ _package['ref'] }}
                            </b>
                        </bsb-td>
                    </bsb-tr>
                    <!-- Module in the package -->
                    <bsb-tr
                        v-for="(module, i) in getModulesByPackageId(_package['id'])"
                        :key="'module-row-' + module['id']"
                    >
                        <bsb-td>
                            {{ i + 1 }}
                        </bsb-td>
                        <bsb-td>
                            {{ module['ref'] }}
                        </bsb-td>
                        <bsb-td
                            justify="center"
                            v-for="(action, i) in resources['actions']"
                            :key="i"
                        >
                            <template v-if="featureExists(module['id'], action['id'])">
                                <bsb-switch-icon
                                    :value="featureIsChecked(getFeature(module['id'], action['id'])['id'])"
                                    v-if="readonly"
                                />
                                <input
                                    type="checkbox"
                                    v-model="featureIds"
                                    :value="getFeature(module['id'], action['id'])['id']"
                                    v-else
                                >
                            </template>
                        </bsb-td>
                    </bsb-tr>
                </template>
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
        allFeatures: {
            type: Boolean,
            required: true,
        },
    },
    created() {
        this.featureIds = this.value
    },
    data() {
        return {
            featureIds: [],
        }
    },
    methods: {
        getFeature(moduleId, actionId) {
            return lodash.find(this.resources['features'], {
                'module_id': moduleId,
                'action_id': actionId,
            })
        },
        featureExists(moduleId, actionId) {
            return this.getFeature(moduleId, actionId) != undefined
        },
        getModulesByPackageId(packageId) {
            return lodash.filter(this.resources['modules'], (module) => module['package_id'] == packageId)
        },
        featureIsChecked(featureId) {
            return lodash.includes(this.featureIds, featureId)
        },
    },
    watch: {
        featureIds(ne, old) {
            this.$emit('input', ne)
        },
    },
    computed: {
        packageTitleColspan() {
            const additionalColumn = 2
            return additionalColumn + this.resources.actions.length
        },
    },
}
</script>