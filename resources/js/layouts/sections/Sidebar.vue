<template>
    <cb-sidebar>
        <cb-sidebar-title>Bangsus Sistem</cb-sidebar-title>
        <cb-sidebar-items>
            <cb-sidebar-item
                :active="sidebar.active"
                v-for="(sidebar, i) in sidebars"
                :key="i"
            >
                <template v-if="sidebar.children">
                    <a href="#" @click="toggleCollapseSidebar(i)">
                        <cb-sidebar-item-icon :icon="sidebar.icon" />
                        <cb-sidebar-item-title :title="sidebar.title" />
                        <cb-sidebar-item-toggle-icon :collapse="sidebar.collapse" />
                    </a>
                    <cb-sidebar-collapse
                        :collapse="sidebar.collapse"
                    >
                        <cb-sidebar-collapse-item
                            :active="sidebarChildren.active"
                            v-for="(sidebarChildren, i) in sidebar.children"
                            :key="i"
                        >
                            <router-link :to="sidebarChildren.route">
                                {{ sidebarChildren.title }}
                            </router-link>
                        </cb-sidebar-collapse-item>
                    </cb-sidebar-collapse>
                </template>
                <router-link :to="sidebar.route" v-else>
                    <cb-sidebar-item-icon :icon="sidebar.icon" />
                    <cb-sidebar-item-title :title="sidebar.title" />
                </router-link>
            </cb-sidebar-item>
        </cb-sidebar-items>
    </cb-sidebar>
</template>

<script>
import sidebar from './mixins/sidebar'

export default {
    mixins: [sidebar]
}
</script>