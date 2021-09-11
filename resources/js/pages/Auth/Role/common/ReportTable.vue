<template>
    <bsb-table-responsive v-if="!allReports">
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
                        v-for="(report, i) in getReportsByPackageId(_package['id'])"
                        :key="'report-row-' + report['id']"
                    >
                        <bsb-td>
                            {{ i + 1 }}
                        </bsb-td>
                        <bsb-td>
                            {{ report['ref'] }}
                        </bsb-td>
                        <bsb-td
                            justify="center"
                        >
                            <bsb-switch-icon
                                :value="reportIsChecked(report['id'])"
                                v-if="readonly"
                            />
                            <input
                                type="checkbox"
                                v-model="reportIds"
                                :value="report['id']"
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
        allReports: {
            type: Boolean,
            required: true,
        },
    },
    created() {
        this.reportIds = this.value
    },
    data() {
        return {
            reportIds: [],
        }
    },
    methods: {
        getReportsByPackageId(packageId) {
            return lodash.filter(this.resources['reports'], (report) => report['package_id'] == packageId)
        },
        reportIsChecked(reportId) {
            return lodash.includes(this.reportIds, reportId)
        },
    },
    watch: {
        reportIds(ne, old) {
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