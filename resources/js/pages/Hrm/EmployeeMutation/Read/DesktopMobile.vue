<template>
    <fragment>
        <h3>Mutasi Karyawan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.employeeMutation', params: { employeeId: $route.params.employeeId, employeeAssignmentId: $route.params.employeeAssignmentId } }"
            >
                <h5 class="mb-3">Lihat Mutasi Karyawan</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>NIP</label>
                        <bsb-input v-model="form.data['employee_assignment']['employee']['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>NIK</label>
                        <bsb-input v-model="form.data['employee_assignment']['employee']['nik']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input v-model="form.data['employee_assignment']['employee']['full_name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-input :value="form.data['employee_assignment']['branch']['code'] + ' - ' + form.data['employee_assignment']['branch']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jabatan</label>
                        <bsb-input :value="form.data['job_title']['code'] + ' - ' + form.data['job_title']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Mulai</label>
                        <bsb-input v-model="form.data['start_date']" type="date" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Selesai</label>
                        <bsb-input v-model="form.data['end_date']" type="date" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-button-spinner type="submit" :loading="state.form.loading">
                        Submit
                    </bsb-button-spinner>
                </form>
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>