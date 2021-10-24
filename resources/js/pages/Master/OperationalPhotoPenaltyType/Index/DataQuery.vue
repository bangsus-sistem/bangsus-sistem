<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['code']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-th-query>
                <bsb-th-query v-if="flWithOperationalPhotoType">
                    <bsb-select size="sm"
                        v-model="query['operational_photo_type_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(operationalPhotoType, i) in resources['operational_photo_types']" :key="i" :value="operationalPhotoType['id']">
                            {{ operationalPhotoType['code'] }} - {{ operationalPhotoType['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['active']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Aktif' },
                            { value: false, title: 'Nonaktif' }
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
                    <label>Kode</label>
                    <bsb-input size="sm" type="text" v-model="query['code']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama</label>
                    <bsb-input size="sm" type="text" v-model="query['name']" />
                </bsb-form-group>
                <bsb-form-group v-if="flWithOperationalPhotoType">
                    <label>Tipe Foto Operasional</label>
                    <bsb-select size="sm"
                        v-model="query['operational_photo_type_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(operationalPhotoType, i) in resources['operational_photo_types']" :key="i" :value="operationalPhotoType['id']">
                            {{ operationalPhotoType['code'] }} - {{ operationalPhotoType['name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group>
                    <label>Status</label>
                    <bsb-select size="sm"
                        v-model="query['active']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Aktif' },
                            { value: false, title: 'Nonaktif' }
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
    props: {
        flWithOperationalPhotoType: {
            type: Boolean,
            default: true,
        },
    },
}
</script>