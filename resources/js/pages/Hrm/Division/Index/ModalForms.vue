<template>
    <fragment>
        <bsb-access-wrapper module-ref="division" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Divisi"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/division/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Divisi"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/division/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="division" action-ref="delete">
            <bsb-modal-form
                title="Hapus Divisi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/division"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>