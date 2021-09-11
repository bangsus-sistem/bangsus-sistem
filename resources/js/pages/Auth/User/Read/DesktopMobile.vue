<template>
    <fragment>
        <h3>User</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'auth.user' }"
            >
                <h5 class="mb-3">Lihat User</h5>
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
                        <label>Username</label>
                        <bsb-input v-model="form.data['username']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input v-model="form.data['full_name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Status</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        </div>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Role</label>
                        <bsb-input :value="form.data['role']['code'] + ' - ' + form.data['role']['name']" :readonly="true" />
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
                        <label>Cabang</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_branches']"
                            :readonly="true"
                        />
                        <BranchTable
                            class="mt-1"
                            :all-branches="form.data['all_branches']"
                            :resources="resources"
                            v-model="form.data['branch_ids']"
                            :readonly="true"
                        />
                    </bsb-form-group>
                </form>
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'
import BranchTable from '../common/BranchTable'

export default {
    mixins: [mixin],
    components: { BranchTable },
}
</script>