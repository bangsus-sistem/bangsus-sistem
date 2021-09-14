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
                <h5 class="mb-3">Ubah Mutasi Karyawan</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/hrm/employee_mutation', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'hrm.employeeMutation', params: { employeeId: $route.params.employeeId, employeeAssignmentId: $route.params.employeeAssignmentId } }))
                    "
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
                        <bsb-select-errors v-model="form.data['job_title_id']" :errors="form.errors['job_title_id']" :disabled="form.data['admitted']">
                            <option :value="null">-- Pilih Jabatan --</option>
                            <bsb-option-active
                                v-for="(jobTitle, i) in resources['job_titles']"
                                :key="i"
                                :value="jobTitle['id']"
                                :item="jobTitle"
                            >
                                {{ jobTitle['code'] }} - {{ jobTitle['name'] }}
                            </bsb-option-active>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Mulai</label>
                        <bsb-input-errors v-model="form.data['start_date']" :errors="form.errors['start_date']" type="date" :readonly="form.data['admitted']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Selesai</label>
                        <bsb-input-errors v-model="form.data['end_date']" :errors="form.errors['end_date']" type="date" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea-errors v-model="form.data['description']" :errors="form.errors['description']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea-errors v-model="form.data['note']" :errors="form.errors['note']" />
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