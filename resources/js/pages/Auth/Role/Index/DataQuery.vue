<template>
    <cb-screen>
        <template v-slot:desktop>
            <cb-tr-query>
                <cb-th-query></cb-th-query>
                    <cb-th-query>
                        <cb-input size="sm" type="text" v-model="query['code']" />
                    </cb-th-query>
                    <cb-th-query>
                        <cb-input size="sm" type="text" v-model="query['name']" />
                    </cb-th-query>
                    <cb-th-query>
                        <cb-select size="sm"
                            v-model="query['active']"
                            :options="[
                                { value: '*', title: 'Semua' },
                                { value: true, title: 'Aktif' },
                                { value: false, title: 'Nonaktif' }
                            ]"
                        />
                    </cb-th-query>
                    <cb-th-query>
                        <cb-select size="sm"
                            v-model="query['all_features']"
                            :options="[
                                { value: '*', title: 'Semua' },
                                { value: true, title: 'Tak Terbatas' },
                                { value: false, title: 'Terbatas' }
                            ]"
                        />
                    </cb-th-query>
                    <cb-th-query>
                        <cb-select size="sm"
                            v-model="query['all_widgets']"
                            :options="[
                                { value: '*', title: 'Semua' },
                                { value: true, title: 'Tak Terbatas' },
                                { value: false, title: 'Terbatas' }
                            ]"
                        />
                    </cb-th-query>
                    <cb-th-query>
                        <cb-select size="sm"
                            v-model="query['all_reports']"
                            :options="[
                                { value: '*', title: 'Semua' },
                                { value: true, title: 'Tak Terbatas' },
                                { value: false, title: 'Terbatas' }
                            ]"
                        />
                    </cb-th-query>
                <cb-th-query>
                    <cb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                        Cari
                    </cb-button-spinner>
                </cb-th-query>
            </cb-tr-query>
        </template>
        <template v-slot:mobile>
            <cb-mobile-query-form>
                <cb-form-group>
                    <label>Kode</label>
                    <cb-input size="sm" type="text" v-model="query['code']" />
                </cb-form-group>
                <cb-form-group>
                    <label>Nama</label>
                    <cb-input size="sm" type="text" v-model="query['name']" />
                </cb-form-group>
                <cb-form-group>
                    <label>Status</label>
                    <cb-select size="sm"
                        v-model="query['active']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Aktif' },
                            { value: false, title: 'Nonaktif' }
                        ]"
                    />
                </cb-form-group>
                <cb-form-group>
                    <label>Fitur</label>
                    <cb-select size="sm"
                        v-model="query['all_features']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
                        ]"
                    />
                </cb-form-group>
                <cb-form-group>
                    <label>Widget</label>
                    <cb-select size="sm"
                        v-model="query['all_widgets']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
                        ]"
                    />
                </cb-form-group>
                <cb-form-group>
                    <label>Laporan</label>
                    <cb-select size="sm"
                        v-model="query['all_reports']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
                        ]"
                    />
                </cb-form-group>
                <cb-button-spinner color="primary" size="sm" @click="$emit('search')" :loading="loading">
                    Cari
                </cb-button-spinner>
            </cb-mobile-query-form>
        </template>
    </cb-screen>
</template>

<script>
import mixin from '../../../mixins/data-query-section-mixin'

export default {
    mixins: [mixin],
}
</script>