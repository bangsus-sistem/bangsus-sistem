<template>
    <fragment>
        <h3>Log Autentikasi</h3>
        <cb-card class="mt-3">
            <cb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Lihat Log Autentikasi</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <cb-form-group>
                        <label>User</label>
                        <cb-input :value="form.data['user']['full_name']" readonly />
                    </cb-form-group>
                    <cb-form-group>
                        <label>Waktu</label>
                        <cb-input :value="standardDatetime(form.data['created_at'])" readonly />
                    </cb-form-group>
                    <cb-form-group>
                        <label>Status</label>
                        <div>
                            <cb-switch-badge :condition="form.data['state']" true-label="Login" false-label="Logout"/>
                        </div>
                    </cb-form-group>
                </form>
            </cb-card-body-spinner-error-back>
        </cb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>