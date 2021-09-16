<template>
    <fragment>
        <h3>Absensi</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Absensi</h5>
                <bsb-access-wrapper module-ref="attendance" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'hrm.attendance.create' }" />
                </bsb-access-wrapper>
                <bsb-access-wrapper module-ref="attendance" action-ref="attendance">
                    <bsb-button-router-link :to="{ name: 'hrm.attendance.attendance' }" color="info" size="sm">
                        Absen
                    </bsb-button-router-link>
                </bsb-access-wrapper>
                <bsb-table-responsive class="p-1 mt-3">
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <AttendanceDataQuery
                                :loading="state.result.loading"
                                @search="search"
                                v-model="query"
                            />
                            <bsb-tr-sort
                                :sort-orders="meta.sortOrders"
                                :sort="query['sort']"
                                :order="query['order']"
                                v-model="query"
                                @sort="changeSortOrder"
                            />
                        </thead>
                        <bsb-tbody-empty :items="result.items" :col="meta.sortOrders.length">
                            <AttendanceDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                @delete="showModalForm('attendance', 'delete', { id: item['id'] })"
                            />
                        </bsb-tbody-empty>
                    </bsb-table>
                </bsb-table-responsive>
            </bsb-card-body-spinner-error>
        </bsb-card>
        <!-- Modal Form -->
        <AttendanceModalForms ref="attendance" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import AttendanceDataQuery from './DataQuery'
import AttendanceDataRow from './DataRow'
import AttendanceModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { AttendanceDataQuery, AttendanceDataRow, AttendanceModalForms },
}
</script>