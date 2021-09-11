<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['username']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['full_name']" />
                </bsb-th-query>
                <bsb-th-query v-if="flWithRole">
                    <bsb-select size="sm"
                        v-model="query['role_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(role, i) in resources['roles']" :key="i" :value="role['id']">
                            {{ role['code'] }} - {{ role['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
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
                    <bsb-select size="sm"
                        v-model="query['all_branches']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
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
                    <label>Username</label>
                    <bsb-input size="sm" type="text" v-model="query['username']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Nama</label>
                    <bsb-input size="sm" type="text" v-model="query['full_name']" />
                </bsb-form-group>
                <bsb-form-group v-if="flWithRole">
                    <label>Role</label>
                    <bsb-select size="sm"
                        v-model="query['role_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(role, i) in resources['roles']" :key="i" :value="role['id']">
                            {{ role['code'] }} - {{ role['name'] }}
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
                <bsb-form-group>
                    <label>Cabang</label>
                    <bsb-select size="sm"
                        v-model="query['all_branches']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Tak Terbatas' },
                            { value: false, title: 'Terbatas' }
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
        flWithRole: {
            type: Boolean,
            default: true,
        }
    }
}
</script>