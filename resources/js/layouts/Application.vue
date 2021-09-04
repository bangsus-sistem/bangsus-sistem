<template>
    <div>
        <cb-screen>
            <!-- Mobile -->
            <template v-slot:mobile>
                <SidebarMobile :active="active"/>
                <cb-page-wrapper-mobile>
                    <Breadcrumb :breadcrumbs="breadcrumbs" />
                    <cb-container-fluid class="px-4 pt-2">
                        <slot name="mobile" />
                    </cb-container-fluid>
                </cb-page-wrapper-mobile>
                <cb-screen-mode-wrapper label="Mode Mobile" />
            </template>
            <!-- Desktop -->
            <template v-slot:desktop>
                <Sidebar :active="active" />
                <cb-page-wrapper>
                    <Navbar />
                    <Breadcrumb :breadcrumbs="breadcrumbs" />
                    <cb-container-fluid class="px-4 pt-4">
                        <slot name="desktop" />
                    </cb-container-fluid>
                </cb-page-wrapper>
                <cb-screen-mode-wrapper label="Mode Desktop" />
            </template>
        </cb-screen>
        <Flashers />
    </div>
</template>

<script>
import Flashers from './sections/Flashers'
import Sidebar from './sections/Sidebar'
import SidebarMobile from './sections/SidebarMobile'
import Navbar from './sections/Navbar'
import Breadcrumb from './sections/Breadcrumb'

export default {
    components: {
        Flashers,
        Sidebar,
        SidebarMobile,
        Navbar,
        Breadcrumb,
    },
    props: {
        breadcrumbs: {
            required: true,
            type: Array,
        },
        active: {
            type: String,
            default: '',
        },
    },
}
</script>