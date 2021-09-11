<template>
    <bsb-table-responsive v-if="!allWidgets">
        <bsb-table>
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
                    <!-- Widget in the package -->
                    <bsb-tr
                        v-for="(widget, i) in getWidgetsByPackageId(_package['id'])"
                        :key="'widget-row-' + widget['id']"
                    >
                        <bsb-td>
                            {{ i + 1 }}
                        </bsb-td>
                        <bsb-td>
                            {{ widget['ref'] }}
                        </bsb-td>
                        <bsb-td
                            justify="center"
                        >
                            <bsb-switch-icon
                                :value="widgetIsChecked(widget['id'])"
                                v-if="readonly"
                            />
                            <input
                                type="checkbox"
                                v-model="widgetIds"
                                :value="widget['id']"
                                v-else
                            >
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
        allWidgets: {
            type: Boolean,
            required: true,
        },
    },
    created() {
        this.widgetIds = this.value
    },
    data() {
        return {
            widgetIds: [],
        }
    },
    methods: {
        getWidgetsByPackageId(packageId) {
            return lodash.filter(this.resources['widgets'], (widget) => widget['package_id'] == packageId)
        },
        widgetIsChecked(widgetId) {
            return lodash.includes(this.widgetIds, widgetId)
        },
    },
    watch: {
        widgetIds(ne, old) {
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