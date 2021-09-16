<template>
    <fragment>
        <bsb-access-wrapper module-ref="attendance" action-ref="delete">
            <bsb-modal-form
                title="Hapus Absensi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/attendance"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>