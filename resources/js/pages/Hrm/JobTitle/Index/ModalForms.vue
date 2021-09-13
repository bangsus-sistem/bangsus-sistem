<template>
    <fragment>
        <bsb-access-wrapper module-ref="job_title" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Divisi"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/job_title/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Divisi"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/job_title/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="job_title" action-ref="delete">
            <bsb-modal-form
                title="Hapus Divisi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/job_title"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>