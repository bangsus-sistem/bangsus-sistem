<template>
    <fragment>
        <bsb-access-wrapper module-ref="general_cleaning_activity" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Aktivitas General Cleaning"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/general_cleaning_activity/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Aktivitas General Cleaning"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/general_cleaning_activity/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="general_cleaning_activity" action-ref="delete">
            <bsb-modal-form
                title="Hapus Aktivitas General Cleaning"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/general_cleaning_activity"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>