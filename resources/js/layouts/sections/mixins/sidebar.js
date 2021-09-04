
export default {
    props: {
        active: {
            type: String,
            default: '',
        }
    },
    data() {
        return {
            sidebars: [
                {
                    title: 'Dashboard',
                    icon: 'layout',
                    route: { name: 'dashboard' },
                    active: false,
                },
                {
                    title: 'Autentikasi',
                    icon: 'key',
                    children: [
                        {
                            title: 'Role',
                            route: { name: 'auth.role' },
                            access: {
                                moduleRef: 'role',
                                actionRef: 'index',
                            },
                            active: false,
                        },
                        {
                            title: 'User',
                            route: { name: 'auth.user' },
                            access: {
                                moduleRef: 'user',
                                actionRef: 'index',
                            },
                            active: false,
                        },
                    ],
                    collapse: false,
                },
                {
                    title: 'Log',
                    icon: 'pocket',
                    children: [
                        {
                            title: 'Log Autentikasi',
                            route: { name: 'log.authenticationLog' },
                            access: {
                                moduleRef: 'authentication_log',
                                actionRef: 'index',
                            },
                            active: false,
                        },
                        {
                            title: 'Log Aktivitas',
                            route: { name: 'log.activityLog' },
                            access: {
                                moduleRef: 'activity_log',
                                actionRef: 'index',
                            },
                            active: false,
                        },
                    ],
                    collapse: false,
                },
            ],
            collapsedIndex: null,
        }
    },
    methods: {
        initiateSidebar() {
            let computedSidebars = []
            this.sidebars.forEach(sidebar => {
                // Check if the sidebar has children.
                if (sidebar.children) {
    
                    // Stack the sidebar children.
                    let computedSidebarChildren = []
                    sidebar.children.forEach(sidebarChildren => {
                        if (sidebarChildren.access) {
                            let feature = this.findFeature(
                                sidebarChildren.access.moduleRef,
                                sidebarChildren.access.actionRef
                            )
                            if (feature) computedSidebarChildren.push(sidebarChildren)
                        } else {
                            computedSidebarChildren.push(sidebarChildren)
                        }
                    })
    
                    // Evaluate the count of accessible sidebar children.
                    // If none then we won't show the sidebar at all.
                    if (computedSidebarChildren.length > 0) {
                        sidebar.children = computedSidebarChildren
                        computedSidebars.push(sidebar)
                    }
                } else {
    
                    // If the sidebar has access then we simply evaluate.
                    // If none, then add it directly.
                    if (sidebar.access) {
                        let feature = this.findFeature(sidebar.access.moduleRef, sidebar.access.actionRef)
                        if (feature) computedSidebars.push(sidebar)
                    } else {
                        computedSidebars.push(sidebar)
                    }
                }
            })
    
            this.sidebars = computedSidebars
            
            this.sidebars.forEach((sidebar, i) => {
                if (sidebar.children) {
                    sidebar.children.forEach((sidebarChildren, j) => {
                        if (sidebarChildren.route.name == this.active) {
                            this.toggleCollapseSidebar(i)
                            this.activateSidebar(i, j)
                        }
                    })
                } else {
                    if (sidebar.route.name == this.active) {
                        this.activateSidebar(i)
                    }
                }
            })
        },
        toggleCollapseSidebar(i) {
            if (this.collapsedIndex == i) {
                this.sidebars[i].collapse = false
                this.collapsedIndex = null
            } else {
                this.sidebars[i].collapse = true
                this.collapsedIndex = i
            }
        },
        activateSidebar(i, j = null) {
            this.sidebars[i].active = true
            if (j != null) {
                this.sidebars[i].children[j].active = true
            }
        },
        getFeatureAuth() {
            this.featureAuth = this.$store.getters['utils/auth/features']
        },
        findFeature(moduleRef, actionRef) {
            return lodash.find(this.featureAuth, (feature) => {
                return feature['module']['ref'] == moduleRef && feature['action']['ref'] == actionRef
            })
        }
    },
    created() {
        this.getFeatureAuth()
        this.initiateSidebar()
    }
}
