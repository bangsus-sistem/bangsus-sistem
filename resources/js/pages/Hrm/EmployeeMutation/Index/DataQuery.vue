<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['job_title_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(jobTitle, i) in resources['job_titles']" :key="i" :value="jobTitle['id']">
                            {{ jobTitle['code'] }} - {{ jobTitle['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['start_date']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['end_date']" />
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
                    <label>Jabatan Pertama</label>
                    <bsb-select size="sm"
                        v-model="query['job_title_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(jobTitle, i) in resources['job_titles']" :key="i" :value="jobTitle['id']">
                            {{ jobTitle['code'] }} - {{ jobTitle['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group>
                    <label>Tanggal Mulai</label>
                    <bsb-input size="sm" type="text" v-model="query['start_date']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Tanggal Selesai</label>
                    <bsb-input size="sm" type="text" v-model="query['end_date']" />
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
    mixins: [mixin],
}
</script>