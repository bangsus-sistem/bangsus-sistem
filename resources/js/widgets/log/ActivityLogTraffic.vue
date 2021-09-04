<template>
    <WidgetWrapper
        widget-ref="activity_log_traffic"
        class="col-12 col-lg-6 col-xl-4"
        :loading="state.widget.loading"
        title="Traffic Log Aktivitas"
    >
        <div class="form-group mt-4">
            <select class="form-control form-control-sm" v-model="query.timestamp" @change="reloadData">
                <option value="300">5 menit terakhir</option>
                <option value="900">15 menit terakhir</option>
                <option value="3600">1 jam terakhir</option>
                <option value="7200">2 jam terakhir</option>
                <option value="21600">6 jam terakhir</option>
                <option value="43200">12 jam terakhir</option>
                <option value="86400">24 jam terakhir</option>
                <option value="259200">3 hari terakhir</option>
                <option value="604800">1 minggu terakhir</option>
            </select>
        </div>
        <cb-row>
            <div class="col text-center">
                <h5 class="text-green-600">{{ data['users_count'] }}</h5>
                <span class="text-green-600">Pengguna</span>
            </div>
            <div class="col text-center">
                <h5 class="text-yellow-600">{{ data['count'] }}</h5>
                <span class="text-yellow-600">Aktivitas</span>
            </div>
        </cb-row>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'
import mixins from '../mixins'

export default {
    components: {
        WidgetWrapper,
    },
    data() {
        return {
            meta: {
                source: '/ajax/log/activity_log/widget/traffic'
            },
            data: {},
            query: {
                'timestamp': 300,
            }
        }
    },
    mixins: [ mixins ],
}
</script>