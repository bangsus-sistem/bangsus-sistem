<template>
    <div>
        <bsb-sidebar-mobile v-if="show" @clickBackdrop="toggleShow">
            <div class="d-flex align-items-center justify-content-between">
                <bsb-sidebar-title>Bangsus Sistem</bsb-sidebar-title>
                <bsb-sidebar-bars-button @click.prevent="toggleShow" :dark-mode="true" />
            </div>
            <bsb-sidebar-items>
                <bsb-sidebar-item
                    :active="sidebar.active"
                    v-for="(sidebar, i) in sidebars"
                    :key="i"
                >
                    <template v-if="sidebar.children">
                        <a href="#" @click="toggleCollapseSidebar(i)">
                            <bsb-sidebar-item-icon :icon="sidebar.icon" />
                            <bsb-sidebar-item-title :title="sidebar.title" />
                            <bsb-sidebar-item-toggle-icon :collapse="sidebar.collapse" />
                        </a>
                        <bsb-sidebar-collapse
                            :collapse="sidebar.collapse"
                        >
                            <bsb-sidebar-collapse-item
                                :active="sidebarChildren.active"
                                v-for="(sidebarChildren, i) in sidebar.children"
                                :key="i"
                            >
                                <router-link :to="sidebarChildren.route">
                                    {{ sidebarChildren.title }}
                                </router-link>
                            </bsb-sidebar-collapse-item>
                        </bsb-sidebar-collapse>
                    </template>
                    <router-link :to="sidebar.route" v-else>
                        <bsb-sidebar-item-icon :icon="sidebar.icon" />
                        <bsb-sidebar-item-title :title="sidebar.title" />
                    </router-link>
                </bsb-sidebar-item>
            </bsb-sidebar-items>
        </bsb-sidebar-mobile>
        <div class="p-3">
            <bsb-sidebar-bars-button @click="toggleShow" />
        </div>
    </div>
</template>

<script>
import sidebar from './mixins/sidebar'

export default {
    mixins: [sidebar],
    data() {
        return {
            show: false
        }
    },
    methods: {
        toggleShow() {
            this.show = ! this.show
        }
    }
}
</script>