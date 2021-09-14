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
                <h5 class="mb-3">Lihat Karyawan</h5>
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
                                            <bsb-input
                                                v-model="form.data['employee_addresses'][i]['address']"
                                                :readonly="true"
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
                                            <bsb-input
                                                v-model="form.data['employee_contacts'][i]['contact']"
                                                :readonly="true"
                                            />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
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