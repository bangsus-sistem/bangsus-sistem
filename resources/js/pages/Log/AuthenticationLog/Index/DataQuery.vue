<template>
    <cb-screen>
        <template v-slot:desktop>
            <cb-tr-query>
                <cb-th-query></cb-th-query>
                <cb-th-query v-if="flWithUser">
                    <cb-select size="sm"
                        v-model="query['user_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(user, i) in resources['users']" :key="i" :value="user['id']">
                            {{ user['full_name'] }}
                        </option>
                    </cb-select>
                </cb-th-query>
                <cb-th-query>

                </cb-th-query>
                <cb-th-query>
                    <cb-select size="sm"
                        v-model="query['state']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Login' },
                            { value: false, title: 'Logout' }
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
                <cb-form-group v-if="flWithUser">
                    <cb-select size="sm"
                        v-model="query['user_id']"
                    >
                        <option value="*">Semua</option>
                        <option v-for="(user, i) in resources['users']" :key="i" :value="user['id']">
                            {{ user['full_name'] }}
                        </option>
                    </cb-select>
                </cb-form-group>
                <cb-form-group>
                    <label>Status</label>
                    <cb-select size="sm"
                        v-model="query['state']"
                        :options="[
                            { value: '*', title: 'Semua' },
                            { value: true, title: 'Login' },
                            { value: false, title: 'Logout' }
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
    props: {
        flWithUser: {
            type: Boolean,
            default: true,
        }
    }
}
</script>