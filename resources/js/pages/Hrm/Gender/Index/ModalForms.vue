<template>
    <fragment>
        <bsb-access-wrapper module-ref="gender" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Jenis Kelamin"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/gender/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Jenis Kelamin"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/gender/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="gender" action-ref="delete">
            <bsb-modal-form
                title="Hapus Jenis Kelamin"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/gender"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>