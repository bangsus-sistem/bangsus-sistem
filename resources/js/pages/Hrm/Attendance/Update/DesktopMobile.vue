<template>
    <fragment>
        <h3>Absensi</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.attendance' }"
            >
                <h5 class="mb-3">Ubah Absensi</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/hrm/attendance', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'hrm.attendance' }))
                    "
                >
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-select-errors v-model="form.data['branch_id']" :errors="form.errors['branch_id']">
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
                        <label>Karyawan</label>
                        <bsb-select-errors v-model="form.data['employee_id']" :errors="form.errors['employee_id']" :disabled="!form.data['branch_id']">
                            <option :value="null">-- Pilih Karyawan --</option>
                            <option
                                v-for="(employee, i) in resources['employees']"
                                :key="i"
                                :value="employee['id']"
                            >
                                {{ employee['code'] }} - {{ employee['full_name'] }}
                            </option>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tibe Absensi</label>
                        <bsb-select-errors v-model="form.data['attendance_type_id']" :errors="form.errors['attendance_type_id']">
                            <option :value="null">-- Pilih Tipe Absensi --</option>
                            <option
                                v-for="(attendanceType, i) in resources['attendance_types']"
                                :key="i"
                                :value="attendanceType['id']"
                            >
                                {{ attendanceType['ref'] }} - {{ attendanceType['name'] }}
                            </option>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jadwal Masuk</label>
                        <bsb-input-errors type="datetime-local" step="1" v-model="form.data['schedule_in_datetime']" :errors="form.errors['schedule_in_datetime']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jadwal Keluar</label>
                        <bsb-input-errors type="datetime-local" step="1" v-model="form.data['schedule_out_datetime']" :errors="form.errors['schedule_out_datetime']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Absensi Masuk</label>
                        <bsb-input-errors type="datetime-local" step="1" v-model="form.data['attendance_in_datetime']" :errors="form.errors['attendance_in_datetime']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Absensi Keluar</label>
                        <bsb-input-errors type="datetime-local" step="1" v-model="form.data['attendance_out_datetime']" :errors="form.errors['attendance_out_datetime']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Gambar Masuk</label>
                        <bsb-image-viewer :id="form.data['image_in_id']" />
                        <bsb-image-uploader v-model="form.data['image_in_id']" />
                        <bsb-errors-wrapper :errors="form.errors['image_in_id']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Gambar Keluar</label>
                        <bsb-image-viewer :id="form.data['image_out_id']" />
                        <bsb-image-uploader v-model="form.data['image_out_id']" />
                        <bsb-errors-wrapper :errors="form.errors['image_out_id']" />
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