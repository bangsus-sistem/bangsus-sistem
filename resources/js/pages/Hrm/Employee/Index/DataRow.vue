<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ item['nik'] }}</bsb-td>
                <bsb-td>{{ item['full_name'] }}</bsb-td>
                <bsb-td justify="center" v-if="flWithGender">
                    {{ item['gender']['name'] }}
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['admitted']" true-label="Disetujui" false-label="Menunggu Persetujuan"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="employee" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'hrm.employee.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'hrm.employee.update', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee" action-ref="admit">
                        <bsb-button-admit @click="$emit('admit')" v-if="!item['admitted']" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="employee_assignment" action-ref="index">
                        <bsb-button-router-link :to="{ name: 'hrm.employeeAssignment', params: { employeeId: item['id'] } }" color="secondary" size="sm">
                            Penugasan
                        </bsb-button-router-link>
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['code'] }}</small>
                        <h6>{{ item['nik'] }}</h6>
                        <h6>{{ item['full_name'] }}</h6>
                        <small v-if="flWithGender"><b>{{ item['gender']['name'] }}</b></small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="employee" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'hrm.employee.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'hrm.employee.update', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee" action-ref="admit">
                            <bsb-button-admit @click="$emit('admit')" v-if="!item['admitted']" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="employee_assignment" action-ref="index">
                            <bsb-button-router-link :to="{ name: 'hrm.employeeAssignment', params: { employeeId: item['id'] } }" color="secondary" size="sm">
                                Penugasan
                            </bsb-button-router-link>
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
    props: {
        flWithGender: {
            type: Boolean,
            default: true,
        },
    },
}
</script>