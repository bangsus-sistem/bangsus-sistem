<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td justify="center">{{ item['job_title']['code'] }} - {{ item['job_title']['name'] }}</bsb-td>
                <bsb-td justify="center">{{ item['start_date'] }}</bsb-td>
                <bsb-td justify="center">{{ item['end_date'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['admitted']" true-label="Disetujui" false-label="Menunggu Persetujuan"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="employee_mutation" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'hrm.employeeMutation.read', params: { id: item['id'], employeeAssignmentId: $route.params.employeeAssignmentId, employeeId: $route.params.employeeId } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee_mutation" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'hrm.employeeMutation.update', params: { id: item['id'], employeeAssignmentId: $route.params.employeeAssignmentId, employeeId: $route.params.employeeId } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee_mutation" action-ref="admit">
                        <bsb-button-admit @click="$emit('admit')" v-if="!item['admitted']" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee_mutation" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <h6>{{ item['job_title']['code'] }} - {{ item['job_title']['name'] }}</h6>
                        <small><b>{{ item['start_date'] }} - {{ item['end_date'] != null ? item['end_date'] : __('dictionary.now') }}</b></small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="employee_mutation" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'hrm.employeeMutation.read', params: { id: item['id'], employeeAssignmentId: $route.params.employeeAssignmentId, employeeId: $route.params.employeeId } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee_mutation" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'hrm.employeeMutation.update', params: { id: item['id'], employeeAssignmentId: $route.params.employeeAssignmentId, employeeId: $route.params.employeeId } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee_mutation" action-ref="admit">
                            <bsb-button-admit @click="$emit('admit')" v-if="!item['admitted']" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee_mutation" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['admitted']" true-label="Disetujui" false-label="Menunggu Persetujuan"/>
                    </template>
                </bsb-list-group-item-content>
            </bsb-list-group-item>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-row-section-mixin'

export default {
    mixins: [mixin],
}
</script>