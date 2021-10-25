<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="text" v-model="query['code']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-input size="sm" type="date" v-model="query['transaction_date']" />
                </bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['branch_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(branch, i) in resources['branches']" :key="i" :value="branch['id']">
                            {{ branch['code'] }} - {{ branch['name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query></bsb-th-query>
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
                    <label>Tanggal Transaksi</label>
                    <bsb-input size="sm" type="date" v-model="query['transaction_date']" />
                </bsb-form-group>
                <bsb-form-group>
                    <label>Cabang</label>
                    <bsb-select size="sm"
                        v-model="query['branch_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(branch, i) in resources['branches']" :key="i" :value="branch['id']">
                            {{ branch['code'] }} - {{ branch['name'] }}
                        </option>
                    </bsb-select>
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