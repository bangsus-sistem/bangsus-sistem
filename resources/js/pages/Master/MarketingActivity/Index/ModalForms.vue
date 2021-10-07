<template>
    <fragment>
        <bsb-access-wrapper module-ref="marketing_activity" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Aktivitas Marketing"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/marketing_activity/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Aktivitas Marketing"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/marketing_activity/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="marketing_activity" action-ref="delete">
            <bsb-modal-form
                title="Hapus Aktivitas Marketing"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/marketing_activity"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>