<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { 
    LayoutGrid, Notebook, Car , DollarSign, TriangleAlert, Calendar, Brush, UserRoundCheck, Lightbulb, Tag
} from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Moradores',
        href: '/residents',
        icon: UserRoundCheck,
    },
    {
        title: 'Ocorrências',
        href: '/incidents',
        icon: TriangleAlert,
    },
    {
        title: 'Sugestões',
        href: '/suggestions',
        icon: Lightbulb,
    },
    {
        title: 'Tag',
        href: '/tags',
        icon: Tag,
    },
    {
        title: 'Gastos',
        href: '/gastos',
        icon: DollarSign,
    },
    {
        title: 'Permissões',
        href: '/roles',
        icon: Notebook,
    },
    {
        title: 'Veiculos',
        href: '/veiculos',
        icon: Car,
    },
    {
        title: 'Reservas',
        href: '/reservas',
        icon: Calendar,
    },
    {
        title: 'Limpeza',
        href: '/limpeza',
        icon: Brush,
    },
    {
        title: 'Moradores',
        href: '/residents',
        icon: UserRoundCheck,
    },
];

const footerNavItems: NavItem[] = [
    // {
    //     title: 'Github Repo',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: Folder,
    // },
    // {
    //     title: 'Documentation',
    //     href: 'https://laravel.com/docs/starter-kits#vue',
    //     icon: BookOpen,
    // },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
