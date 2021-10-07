<template>
    <fragment>
        <bsb-access-wrapper module-ref="operational_photo_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Foto Operasional"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/operational_photo_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Foto Operasional"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/operational_photo_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="operational_photo_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Foto Operasional"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/operational_photo_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>