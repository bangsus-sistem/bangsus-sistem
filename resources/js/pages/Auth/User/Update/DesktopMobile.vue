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
                <h5 class="mb-3">Ubah User</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/auth/user', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'auth.user' }))
                    "
                >
                    <bsb-form-group>
                        <label>Username</label>
                        <bsb-input-errors v-model="form.data['username']" :errors="form.errors['username']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input-errors v-model="form.data['full_name']" :errors="form.errors['full_name']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Role</label>
                        <bsb-select-errors v-model="form.data['role_id']" :errors="form.errors['role_id']">
                            <option :value="null">-- Pilih Role --</option>
                            <bsb-option-active
                                v-for="(role, i) in resources['roles']"
                                :key="i"
                                :value="role['id']"
                                :item="role"
                            >
                                {{ role['code'] }} - {{ role['name'] }}
                            </bsb-option-active>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea-errors v-model="form.data['description']" :errors="form.errors['description']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea-errors v-model="form.data['note']" :errors="form.errors['note']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_branches']"
                        />
                        <BranchTable
                            class="mt-1"
                            :all-branches="form.data['all_branches']"
                            :resources="resources"
                            v-model="form.data['branch_ids']"
                        />
                        <bsb-errors-wrapper :errors="form.errors['branch_ids']" />
                    </bsb-form-group>
                    <bsb-button-spinner type="submit" :loading="state.form.loading">
                        Submit
                    </bsb-button-spinner>
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