<template>
    <fragment>
        <bsb-access-wrapper module-ref="schedule_submission" action-ref="admit">
            <bsb-modal-form
                title="Terima Pengajuan Jadwal"
                message="Apakah anda yakin?"
                ref="admit"
                link="/ajax/hrm/schedule_submission/admit"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>