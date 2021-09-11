<template>
    <fragment>
        <h3>Log Autentikasi</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Lihat Log Autentikasi</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>User</label>
                        <bsb-input :value="form.data['user']['full_name']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Waktu</label>
                        <bsb-input :value="standardDatetime(form.data['created_at'])" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Status</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['state']" true-label="Login" false-label="Logout"/>
                        </div>
                    </bsb-form-group>
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