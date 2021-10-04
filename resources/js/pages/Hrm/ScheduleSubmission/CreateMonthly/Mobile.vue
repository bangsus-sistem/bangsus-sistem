<template>
    <fragment>
        <h3>Pengajuan Jadwal</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.scheduleSubmission' }"
            >
                <h5 class="mb-3">Tambah Pengajuan Jadwal Bulanan</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/hrm/schedule_submission/monthly', 'post', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'hrm.scheduleSubmission' }))
                    "
                >
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-select-errors v-model="form.data['branch_id']" :errors="form.errors['branch_id']" :disabled="state.form.locked">
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
                        <label>Tibe Absensi</label>
                        <bsb-select-errors v-model="form.data['attendance_type_id']" :errors="form.errors['attendance_type_id']" :disabled="state.form.locked">
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
                        <label>Tanggal Mulai</label>
                        <bsb-input-errors type="date" step="1" v-model="form.data['start_date']" :errors="form.errors['start_date']" :readonly="state.form.locked" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Selesai</label>
                        <bsb-input-errors type="date" step="1" v-model="form.data['end_date']" :errors="form.errors['end_date']" :readonly="state.form.locked" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <bsb-button size="sm" @click.prevent="lock">
                            {{ state.form.locked ? 'Buka Kunci' : 'Kunci' }}
                        </bsb-button>
                    </bsb-form-group>
                    <template>
                        <bsb-form-group v-if="!state.form.table.loading">
                            <label>Jadwal</label>
                            <bsb-table-responsive class="p-1 mt-3">
                                <bsb-table :hover="true">
                                    <thead class="thead-light">
                                        <th>#</th>
                                        <th colspan="3">Nama Karyawan</th>
                                    </thead>
                                    <tbody>
                                        <template v-for="(employee, i) in resources['employees']">
                                            <tr :key="'employee-'+i">
                                                <td>{{ i + 1 }}</td>
                                                <td colspan="2">{{ employee['full_name'] }}</td>
                                                <td>
                                                    <button class="btn btn-sm" type="button" @click.prevent="toggleEmployeeSchedules(employee['id'])">
                                                        <bsb-icon :icon="state.form.table.show[employee['id']] ? 'chevron-up' : 'chevron-down'" />
                                                    </button>
                                                </td>
                                            </tr>
                                            <template v-if="state.form.table.show[employee['id']]">
                                                <tr v-for="(date, k) in state.form['dates']" :key="'schedule-submission-' + i + '-' + k">
                                                    <td></td>
                                                    <td>{{ date }}</td>
                                                    <td colspan="2">
                                                        <bsb-input-errors type="time" v-model="form.data['schedule_submissions'][employee['id']][date]" />
                                                    </td>
                                                </tr>
                                            </template>
                                        </template>
                                    </tbody>
                                </bsb-table>
                            </bsb-table-responsive>
                        </bsb-form-group>
                        <div class="mb-2" v-else>
                            <bsb-spinner size="sm" /> Mengambil data karyawan
                        </div>
                    </template>
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