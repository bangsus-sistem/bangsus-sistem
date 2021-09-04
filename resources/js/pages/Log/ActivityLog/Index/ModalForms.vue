<template>
    <fragment>
        <cb-access-wrapper module-ref="activity_log" action-ref="delete">
            <cb-modal-form
                title="Hapus Log Autentikasi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/log/activity_log"
                method="delete"
                @success="$emit('success')"
            />
        </cb-access-wrapper>
    </fragment>
</template>