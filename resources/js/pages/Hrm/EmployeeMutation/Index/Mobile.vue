<template>
    <fragment>
        <h3>Mutasi Karyawan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.employee', employeeId: $route.params.employeeId }"
            >
                <h5 class="mb-3">Daftar Mutasi Karyawan</h5>
                <bsb-access-wrapper module-ref="employee_mutation" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'hrm.employeeMutation.create', params: { employeeAssignmentId: $route.params.employeeAssignmentId } }" />
                </bsb-access-wrapper>
                <EmployeeMutationDataQuery
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
                    <EmployeeMutationDataRow
                        v-for="(item, i) in result.items"
                        :key="i"
                        :num="i + 1"
                        :item="item"
                        @admit="showModalForm('employeeMutation', 'admit', { id: item['id'] })"
                        @delete="showModalForm('employeeMutation', 'delete', { id: item['id'] })"
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
                        <bsb-input v-model="form.data['employee']['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>NIK</label>
                        <bsb-input v-model="form.data['employee']['nik']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input v-model="form.data['employee']['full_name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-input :value="form.data['branch']['code'] + ' - ' + form.data['branch']['name']" :readonly="true" />
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
        <EmployeeMutationModalForms ref="employeeMutation" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import EmployeeMutationDataQuery from './DataQuery'
import EmployeeMutationDataRow from './DataRow'
import EmployeeMutationModalForms from './ModalForms'

export default {
    components: {
        EmployeeMutationDataQuery,
        EmployeeMutationDataRow,
        EmployeeMutationModalForms,
    },
    mixins: [mixin],
}
</script>