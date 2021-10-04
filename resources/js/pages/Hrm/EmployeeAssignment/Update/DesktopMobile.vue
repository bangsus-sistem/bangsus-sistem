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
                <h5 class="mb-3">Ubah Penugasan Karyawan</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/hrm/employee_assignment', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'hrm.employeeAssignment', params: { employeeId: $route.params.employeeId } }))
                    "
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
                        <bsb-select-errors
                            v-model="form.data['branch_id']"
                            :errors="form.errors['branch_id']"
                            :disabled="form.data['admitted']"
                        >
                            <option :value="null">-- Pilih Cabang --</option>
                            <bsb-option-active
                                v-for="(branch, i) in resources['branches']"
                                :key="i"
                                :value="branch['id']"
                                :item="branch"
                            >
                                {{ branch['code'] }} - {{ branch['name'] }}
                            </bsb-option-active>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jabatan Pertama</label>
                        <bsb-select-errors
                            v-model="form.data['first_job_title_id']"
                            :errors="form.errors['first_job_title_id']"
                            :disabled="form.data['admitted']"
                        >
                            <option :value="null">-- Pilih Jabatan Pertama --</option>
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
                    <bsb-access-wrapper module-ref="employee_assignment" action-ref="admit">
                        <bsb-form-group>
                            <label>Gaji Pokok</label>
                            <bsb-input-errors v-model="form.data['base_salary']" :errors="form.errors['base_salary']" type="number" />
                        </bsb-form-group>
                    </bsb-access-wrapper>
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