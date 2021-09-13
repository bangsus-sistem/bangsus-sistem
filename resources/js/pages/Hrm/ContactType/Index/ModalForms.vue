<template>
    <fragment>
        <bsb-access-wrapper module-ref="contact_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Kontak"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/contact_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Kontak"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/contact_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="contact_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Kontak"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/contact_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>