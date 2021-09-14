<template>
    <fragment>
        <h3>Penugasan Karyawan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.employee' }"
            >
                <h5 class="mb-3">Daftar Penugasan Karyawan</h5>
                <bsb-access-wrapper module-ref="employee_assignment" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'hrm.employeeAssignment.create', params: { employeeId: $route.params.employeeId } }" />
                </bsb-access-wrapper>
                <EmployeeAssignmentDataQuery
                    :loading="state.result.loading"
                    @search="search"
                    v-model="query"
                    :resources="resources"
                />
                <bsb-item-count
                    :options="meta.counts"
                    v-model="query.count"
                    @input="search"
                    class="mt-3"
                />
                <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                    <EmployeeAssignmentDataRow
                        v-for="(item, i) in result.items"
                        :key="i"
                        :num="i + 1"
                        :item="item"
                        @admit="showModalForm('employeeAssignment', 'admit', { id: item['id'] })"
                        @delete="showModalForm('employeeAssignment', 'delete', { id: item['id'] })"
                    />
                </bsb-list-group-empty>
                <div class="mt-3 text-center">
                    <bsb-data-index
                        :first-item="result.meta['first_item']"
                        :last-item="result.meta['last_item']"
                        :total="result.meta['total']"
                    />
                    <bsb-page-button-group v-model="query.page" :last-page="result.meta['last_page']" @changed="search" />
                </div>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>NIP</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>NIK</label>
                        <bsb-input v-model="form.data['nik']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input v-model="form.data['full_name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tempat Lahir</label>
                        <bsb-input v-model="form.data['place_of_birth']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Lahir</label>
                        <bsb-input v-model="form.data['date_of_birth']" :readonly="true" type="date" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Golongan Darah</label>
                        <bsb-input :value="form.data['blood_type']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jenis Kelamin</label>
                        <bsb-input :value="form.data['gender']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang Penerima</label>
                        <bsb-input :value="form.data['first_branch']['code'] + ' - ' + form.data['first_branch']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jabatan Pertama</label>
                        <bsb-input :value="form.data['first_job_title']['code'] + ' - ' + form.data['first_job_title']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Mulai Bekerja</label>
                        <bsb-input v-model="form.data['start_date']" type="date" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                </form>
            </bsb-card-body-spinner-error-back>
        </bsb-card>
        <!-- Modal Form -->
        <EmployeeAssignmentModalForms ref="employeeAssignment" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import EmployeeAssignmentDataQuery from './DataQuery'
import EmployeeAssignmentDataRow from './DataRow'
import EmployeeAssignmentModalForms from './ModalForms'

export default {
    components: {
        EmployeeAssignmentDataQuery,
        EmployeeAssignmentDataRow,
        EmployeeAssignmentModalForms,
    },
    mixins: [mixin],
}
</script>