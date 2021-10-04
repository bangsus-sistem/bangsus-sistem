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
                <h5 class="mb-3">Ganti Password User</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/auth/user/password', 'patch', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'auth.user' }))
                    "
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
                        <label>Role</label>
                        <bsb-select v-model="form.data['role_id']" :readonly="true">
                            <option :value="null">-- Pilih Role --</option>
                            <option
                                v-for="(role, i) in resources['roles']"
                                :key="i"
                                :value="role['id']"
                            >
                                {{ role['code'] }} - {{ role['name'] }}
                            </option>
                        </bsb-select>
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
                        <label>Password Baru</label>
                        <bsb-input-errors v-model="form.data['password']" type="password" :errors="form.errors['password']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Konfirmasi Password Baru</label>
                        <bsb-input-errors v-model="form.data['password_confirmation']" type="password" :errors="form.errors['password_confirmation']" />
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

export default {
    mixins: [mixin],
}
</script>