<template>
    <fragment>
        <h3>Karyawan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.employee' }"
            >
                <h5 class="mb-3">Ubah Karyawan</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/hrm/employee', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'hrm.employee' }))
                    "
                >
                    <bsb-form-group>
                        <label>NIP</label>
                        <bsb-input :readonly="true" v-model="form.data['code']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>NIK</label>
                        <bsb-input-errors v-model="form.data['nik']" :errors="form.errors['nik']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input-errors v-model="form.data['full_name']" :errors="form.errors['full_name']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tempat Lahir</label>
                        <bsb-input-errors v-model="form.data['place_of_birth']" :errors="form.errors['place_of_birth']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Lahir</label>
                        <bsb-input-errors v-model="form.data['date_of_birth']" :errors="form.errors['date_of_birth']" type="date" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Golongan Darah</label>
                        <bsb-select-errors v-model="form.data['blood_type_id']" :errors="form.errors['blood_type_id']">
                            <option :value="null">-- Pilih Golongan Darah --</option>
                            <bsb-option-active
                                v-for="(bloodType, i) in resources['blood_types']"
                                :key="i"
                                :value="bloodType['id']"
                                :item="bloodType"
                            >
                                {{ bloodType['name'] }}
                            </bsb-option-active>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jenis Kelamin</label>
                        <bsb-select-errors v-model="form.data['gender_id']" :errors="form.errors['gender_id']">
                            <option :value="null">-- Pilih Jenis Kelamin --</option>
                            <bsb-option-active
                                v-for="(gender, i) in resources['genders']"
                                :key="i"
                                :value="gender['id']"
                                :item="gender"
                            >
                                {{ gender['name'] }}
                            </bsb-option-active>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang Penerima</label>
                        <bsb-select-errors v-model="form.data['first_branch_id']" :errors="form.errors['first_branch_id']" :disabled="form.data['admitted']">
                            <option :value="null">-- Pilih Cabang Penerima --</option>
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
                        <bsb-select-errors v-model="form.data['first_job_title_id']" :errors="form.errors['first_job_title_id']" :disabled="form.data['admitted']">
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
                        <label>Tanggal Mulai Bekerja</label>
                        <bsb-input-errors v-model="form.data['start_date']" :errors="form.errors['start_date']" type="date" :readonly="form.data['admitted']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea-errors v-model="form.data['description']" :errors="form.errors['description']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea-errors v-model="form.data['note']" :errors="form.errors['note']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Foto Karyawan</label>
                        <bsb-table-responsive>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Tipe Foto Karyawan</bsb-th>
                                        <bsb-th>Foto</bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <bsb-tr v-for="(employeePhoto, i) in form.data['employee_photos']" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>
                                            {{ getEmployeePhotoTypeString(employeePhoto['employee_photo_type_id']) }}
                                            <sup class="text-danger" v-if="getEmployeePhotoTypeRequired(employeePhoto['employee_photo_type_id'])">*</sup>
                                        </bsb-td>
                                        <bsb-td>
                                            <bsb-image-viewer :id="form.data['employee_photos'][i]['image_id']" />
                                            <bsb-image-uploader v-model="form.data['employee_photos'][i]['image_id']" />
                                            <bsb-errors-wrapper :errors="form.errors['employee_photos'][i]" />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Alamat Karyawan</label>
                        <bsb-table-responsive>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Tipe Alamat Karyawan</bsb-th>
                                        <bsb-th>Alamat</bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <bsb-tr v-for="(employeeAddress, i) in form.data['employee_addresses']" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>
                                            {{ getAddressTypeString(employeeAddress['address_type_id']) }}
                                            <sup class="text-danger" v-if="getAddressTypeRequired(employeeAddress['address_type_id'])">*</sup>
                                        </bsb-td>
                                        <bsb-td>
                                            <bsb-input-errors
                                                step="any"
                                                v-model="form.data['employee_addresses'][i]['address']"
                                                :errors="form.errors['employee_addresses'][i]"
                                            />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Kontak Karyawan</label>
                        <bsb-table-responsive>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Tipe Kontak Karyawan</bsb-th>
                                        <bsb-th>Kontak</bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <bsb-tr v-for="(employeeContact, i) in form.data['employee_contacts']" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>
                                            {{ getContactTypeString(employeeContact['contact_type_id']) }}
                                            <sup class="text-danger" v-if="getContactTypeRequired(employeeContact['contact_type_id'])">*</sup>
                                        </bsb-td>
                                        <bsb-td>
                                            <bsb-input-errors
                                                step="any"
                                                v-model="form.data['employee_contacts'][i]['contact']"
                                                :errors="form.errors['employee_contacts'][i]"
                                            />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
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