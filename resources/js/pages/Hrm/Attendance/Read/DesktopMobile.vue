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
                <h5 class="mb-3">Lihat Absensi</h5>
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
                        <label>Cabang</label>
                        <bsb-input :value="form.data['branch']['code'] + ' - ' + form.data['branch']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Karyawan</label>
                        <bsb-input :value="form.data['employee']['code'] + ' - ' + form.data['employee']['full_name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tipe Absensi</label>
                        <bsb-input :value="form.data['attendance_type']['ref'] + ' - ' + form.data['attendance_type']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jadwal Masuk</label>
                        <bsb-input type="text" :value="standardDatetime(form.data['schedule_in_datetime'])" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jadwal Keluar</label>
                        <bsb-input type="text" :value="standardDatetime(form.data['schedule_out_datetime'])" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Absensi Masuk</label>
                        <bsb-input type="text" :value="standardDatetime(form.data['attendance_in_datetime'])" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Absensi Keluar</label>
                        <bsb-input type="text" :value="standardDatetime(form.data['attendance_out_datetime'])" :readonly="true"  />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Gambar Masuk</label>
                        <bsb-image-viewer :id="form.data['image_in_id']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Gambar Keluar</label>
                        <bsb-image-viewer :id="form.data['image_out_id']" />
                    </bsb-form-group>
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