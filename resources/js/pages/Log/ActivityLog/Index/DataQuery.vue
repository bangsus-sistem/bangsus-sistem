<template>
    <bsb-screen>
        <template v-slot:desktop>
            <bsb-tr-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query v-if="flWithUser">
                    <bsb-select size="sm"
                        v-model="query['user_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(user, i) in resources['users']" :key="i" :value="user['id']">
                            {{ user['full_name'] }}
                        </option>
                    </bsb-select>
                </bsb-th-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query></bsb-th-query>
                <bsb-th-query>
                    <bsb-select size="sm"
                        v-model="query['activity_log_type']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: 'feature', title: translateActivityLogType('feature') },
                            { value: 'widget', title: translateActivityLogType('widget') },
                            { value: 'report', title: translateActivityLogType('report') },
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
                <bsb-form-group v-if="flWithUser">
                    <bsb-select size="sm"
                        v-model="query['user_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(user, i) in resources['users']" :key="i" :value="user['id']">
                            {{ user['full_name'] }}
                        </option>
                    </bsb-select>
                </bsb-form-group>
                <bsb-form-group>
                    <label>Tipe</label>
                    <bsb-select size="sm"
                        v-model="query['activity_log_type']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: 'feature', title: translateActivityLogType('feature') },
                            { value: 'widget', title: translateActivityLogType('widget') },
                            { value: 'report', title: translateActivityLogType('report') },
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
import activityLogTypeMixin from '../common/activity-log-type-mixin'

export default {
    mixins: [mixin, activityLogTypeMixin],
    props: {
        flWithUser: {
            type: Boolean,
            default: true,
        }
    }
}
</script>