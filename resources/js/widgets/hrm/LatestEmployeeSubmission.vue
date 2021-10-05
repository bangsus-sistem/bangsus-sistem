<template>
    <WidgetWrapper
        widget-ref="latest_authentication_log"
        class="col-md-12 col-lg-8 col-xl-6"
        :loading="state.widget.loading"
        title="Pengajuan Karyawan"
    >
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <bsb-th justify="center">Aksi</bsb-th>
                </thead>
                <tbody>
                    <tr v-for="(employee, i) in data" :key="i">
                        <bsb-td>{{ i + 1 }}</bsb-td>
                        <bsb-td>{{ employee['nik'] }}</bsb-td>
                        <bsb-td>{{ employee['full_name'] }}</bsb-td>
                        <bsb-td justify="center">
                            <bsb-access-wrapper module-ref="employee" action-ref="read">
                                <bsb-button-router-link-read :to="{ name: 'hrm.employee.read', params: { id: employee['id'] } }" />
                            </bsb-access-wrapper>
                            <bsb-access-wrapper module-ref="employee" action-ref="update">
                                <bsb-button-router-link-update :to="{ name: 'hrm.employee.update', params: { id: employee['id'] } }" />
                            </bsb-access-wrapper>
                            <bsb-access-wrapper module-ref="employee" action-ref="admit">
                                <bsb-button-admit @click="showModalForm('employee', 'admit', { id: employee['id'] })" v-if="!employee['admitted']" />
                            </bsb-access-wrapper>
                            <bsb-access-wrapper module-ref="employee" action-ref="delete">
                                <bsb-button-delete @click="showModalForm('employee', 'delete', { id: employee['id'] })" />
                            </bsb-access-wrapper>
                        </bsb-td>
                    </tr>
                </tbody>
            </table>
            <!-- Modal Form -->
            <EmployeeModalForms ref="employee" @success="reloadData" />
        </div>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'
import mixins from '../mixins'
import EmployeeModalForms from '../../pages/Hrm/Employee/Index/ModalForms'

export default {
    components: {
        WidgetWrapper,
        EmployeeModalForms,
    },
    data() {
        return {
            meta: {
                source: '/ajax/hrm/employee/widget/latest_submission'
            },
            data: {},
        }
    },
    mixins: [ mixins ]
}
</script>