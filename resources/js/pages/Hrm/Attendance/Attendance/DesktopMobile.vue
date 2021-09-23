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
                <h5 class="mb-3">Absen</h5>
                <template v-if="!state.form.submitted">
                    <form
                        class="mt-5"
                        @submit.prevent="submit"
                        key="notSubmitted"
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
                        <bsb-form-group v-if="!state.form.submitted">
                            <label>Gambar</label>
                            <bsb-image-viewer :id="form.data['image_id']" />
                            <bsb-image-capturer v-model="form.data['image_id']" />
                            <bsb-errors-wrapper :errors="form.errors['image_id']" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <bsb-errors-wrapper :errors="form.errors['position']" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <bsb-errors-wrapper :errors="form.errors['datetime']" />
                        </bsb-form-group>
                        <bsb-form-group v-if="!state.form.located">
                            <span class="text-secondary">
                                <bsb-spinner size="sm" class="mr-1" /> Mengambil lokasi anda. Refresh bila memakan waktu lama. Hubungi manajemen bila lokasi tidak bisa didapatkan.
                            </span>
                        </bsb-form-group>
                        <bsb-button-spinner type="submit" :loading="state.form.loading" :disabled="!state.form.submittable">
                            Submit
                        </bsb-button-spinner>
                    </form>
                </template>
                <template v-else>
                    <p>
                        Anda berhasil absen <template v-if="resources['attendance']['attendance_out_datetime'] == null">masuk</template><template v-else>keluar</template>

                    </p>
                    <form
                        class="mt-5"
                        @submit.prevent=""
                        key="submitted"
                    >
                        <bsb-form-group>
                            <label>Cabang</label>
                            <bsb-input :value="resources['attendance']['branch']['code'] + ' - ' + resources['attendance']['branch']['name']" :readonly="true" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <label>Karyawan</label>
                            <bsb-input :value="resources['attendance']['employee']['code'] + ' - ' + resources['attendance']['employee']['full_name']" :readonly="true" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <label>Tipe Absensi</label>
                            <bsb-input :value="resources['attendance']['attendance_type']['ref']" :readonly="true" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <label>Jadwal Masuk</label>
                            <bsb-input type="text" :value="standardDatetime(resources['attendance']['schedule_in_datetime'])" :readonly="true" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <label>Jadwal Keluar</label>
                            <bsb-input type="text" :value="standardDatetime(resources['attendance']['schedule_out_datetime'])" :readonly="true" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <label>Absensi Masuk</label>
                            <bsb-input type="text" :value="standardDatetime(resources['attendance']['attendance_in_datetime'])" :readonly="true" />
                        </bsb-form-group>
                        <bsb-form-group>
                            <label>Absensi Keluar</label>
                            <bsb-input type="text" :value="standardDatetime(resources['attendance']['attendance_out_datetime'])" :readonly="true"  />
                        </bsb-form-group>
                        <bsb-form-group v-if="resources['attendance']['image_in']">
                            <label>Gambar Masuk</label>
                            <bsb-image-viewer :id="resources['attendance']['image_in']['id']" />
                        </bsb-form-group>
                        <bsb-form-group v-if="resources['attendance']['image_out']">
                            <label>Gambar Keluar</label>
                            <bsb-image-viewer :id="resources['attendance']['image_out']['id']" />
                        </bsb-form-group>
                        <bsb-button @click="repopulate()">Absen Lagi</bsb-button>
                    </form>
                </template>
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