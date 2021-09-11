<template>
    <fragment>
        <h3>Log Aktivitas</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Lihat Log Aktivitas</h5>
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
                        <label>Tipe</label>
                        <div>
                            <bsb-badge>
                                {{ translateActivityLogType(form.data['activity_log_type']) }}
                            </bsb-badge>
                        </div>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>{{ translateActivityLogType(form.data['activity_log_type']) }}</label>
                        <div>
                            <template v-if="form.data['activity_log_type'] == 'feature'">
                                <bsb-badge color="info">
                                    {{ form.data['feature']['module']['ref'] }}
                                </bsb-badge>
                                <bsb-badge color="secondary">
                                    {{ form.data['feature']['action']['ref'] }}
                                </bsb-badge>
                            </template>
                            <template v-else-if="form.data['activity_log_type'] == 'widget'">
                                <bsb-badge color="info">
                                    {{ form.data['widget']['ref'] }}
                                </bsb-badge>
                            </template>
                            <template v-else-if="form.data['activity_log_type'] == 'report'">
                                <bsb-badge color="info">
                                    {{ form.data['report']['ref'] }}
                                </bsb-badge>
                            </template>
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