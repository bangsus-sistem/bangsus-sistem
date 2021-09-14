<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['code']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['nik']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['full_name']" />
                </bsb-th-query>
                <bsb-th-query v-if="flWithGender">
                    <bsb-select size="sm"
                        v-model="query['gender_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(gender, i) in resources['genders']" :key="i" :value="gender['id']">
                            {{ gender['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['admitted']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Disetujui' },
                            { value: false, title: 'Menunggu Persetujuan' }
                        ]"
                    />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                        Cari
                    </bsb-button-spinner>
                </bsb-th-query>
            </bsb-tr-query>
        </template>
        <template v-slot:mobile>
            <bsb-mobile-query-form>
                <bsb-form-group>
                    <label>NIP</label>
                    <bsb-input size="sm" type="text" v-model="query['code']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>NIK</label>
                    <bsb-input size="sm" type="text" v-model="query['nik']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama Lengkap</label>
                    <bsb-input size="sm" type="text" v-model="query['full_name']" />
                </bsb-form-group>
                <bsb-form-group v-if="flWithGender">
                    <label>Jenis Kelamin</label>
                    <bsb-select size="sm"
                        v-model="query['gender_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(gender, i) in resources['genders']" :key="i" :value="gender['id']">
                            {{ gender['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group>
                    <label>Admisi</label>
                    <bsb-select size="sm"
                        v-model="query['admitted']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Disetujui' },
                            { value: false, title: 'Menunggu Persetujuan' }
                        ]"
                    />
                </bsb-form-group>
                <bsb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                    Cari
                </bsb-button-spinner>
            </bsb-mobile-query-form>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-query-section-mixin'

export default {
    props: {
        flWithGender: {
            type: Boolean,
            default: true,
        },
    },
    mixins: [mixin],
}
</script>