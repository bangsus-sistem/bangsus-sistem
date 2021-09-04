<template>
    <fragment>
        <h3>Log Aktivitas</h3>
        <cb-card class="mt-3">
            <cb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Lihat Log Aktivitas</h5>
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
                        <label>Tipe</label>
                        <div>
                            <cb-badge>
                                {{ translateActivityLogType(form.data['activity_log_type']) }}
                            </cb-badge>
                        </div>
                    </cb-form-group>
                    <cb-form-group>
                        <label>{{ translateActivityLogType(form.data['activity_log_type']) }}</label>
                        <div>
                            <template v-if="form.data['activity_log_type'] == 'feature'">
                                <cb-badge color="info">
                                    {{ form.data['feature']['module']['ref'] }}
                                </cb-badge>
                                <cb-badge color="secondary">
                                    {{ form.data['feature']['action']['ref'] }}
                                </cb-badge>
                            </template>
                            <template v-else-if="form.data['activity_log_type'] == 'widget'">
                                <cb-badge color="info">
                                    {{ form.data['widget']['ref'] }}
                                </cb-badge>
                            </template>
                            <template v-else-if="form.data['activity_log_type'] == 'report'">
                                <cb-badge color="info">
                                    {{ form.data['report']['ref'] }}
                                </cb-badge>
                            </template>
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