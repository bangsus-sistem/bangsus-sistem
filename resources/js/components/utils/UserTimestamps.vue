<template>
    <div class="mt-3">
        <UserCreate :user-create="userCreate" :created-at="createdAt" />
        <UserUpdate :user-update="userUpdate" :updated-at="updatedAt" />
        <UserAdmit v-if="admit" :user-update="userAdmit" :updated-at="admittedAt" />
    </div>
</template>

<script>
import UserCreate from './UserCreate'
import UserUpdate from './UserUpdate'
import UserAdmit from './UserAdmit'

export default {
    props: {
        userCreate: {
            required: true
        },
        createdAt: {
            required: true
        },
        userUpdate: {
            required: true
        },
        updatedAt: {
            required: true
        },
        admit: {
            type: Boolean,
            default: false,
        },
        userAdmit: {
            default() {
                return {}
            }
        },
        admittedAt: {
            default: ''
        },
    },
    components: { UserCreate, UserUpdate, UserAdmit },
}
</script>