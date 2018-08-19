/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./admin-bootstrap');
require('./forms/bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
import {
    Escapes,
    EscapeBuilder,
    UpcomingEscapes,
    Escape,
    EscapeTypeForm,
    Builder,
    EscapeTypeGeneralInfo,
    EscapeTypePhotoGallery,
    EscapeTypeFeatures,
    EscapeTypeTestimonials,
    EscapeTypeItinerary,
    EscapeTypeTags,
    EscapeTypeTeachers,
    Reservations,
    Settings,
    PastEscapes,
    BrochureUpload,
    EscapeItinerary,
    EscapePackingList,
    EscapeReadingList
} from './components/admin/escapes/bootstrap';
import {
    Press,
    PressList,
    EditPress
} from './components/admin/press/bootstrap';
import {
    Blog,
    BlogForm,
    BlogList,
    BlogCategories
} from './components/admin/blog/bootstrap';
import {
    Testimonials,
    TestimonialsList,
    TestimonialForm
} from './components/admin/testimonials/bootstrap';
import {Team, TeamForm} from './components/admin/team/bootstrap';
import NotFound from './components/admin/not-found.vue';
import Dashboard from './components/admin/dashboard.vue';
import Leads from './components/admin/leads/leads.vue';

Vue.use(VueRouter);

const routes = [
    {path: '/', component: Dashboard, name: 'dashboard'},
    {
        path: '/escapes',
        component: Escapes,
        children: [
            {path: '', component: UpcomingEscapes, name: 'upcoming-escapes'},
            {path: 'past', component: PastEscapes, name: 'past-escapes'},
            {
                path: 'builder',
                component: Builder,
                children: [
                    {path: '', component: EscapeBuilder, name: 'escape-builder'},
                    {
                        path: 'type/:id?',
                        component: EscapeTypeForm,
                        props: true,
                        children: [
                            {
                                path: 'general-info',
                                component: EscapeTypeGeneralInfo,
                                name: 'general-info'
                            },
                            {
                                path: 'photo-gallery',
                                component: EscapeTypePhotoGallery,
                                name: 'photo-gallery'
                            },
                            {
                                path: 'features',
                                component: EscapeTypeFeatures,
                                name: 'features',
                                props: true
                            },
                            {
                                path: 'testimonials',
                                component: EscapeTypeTestimonials,
                                name: 'testimonial-select',
                                props: true
                            },
                            {
                                path: 'itinerary',
                                component: EscapeTypeItinerary,
                                name: 'itinerary'
                            },
                            {
                                path: 'teachers',
                                component: EscapeTypeTeachers,
                                name: 'teachers'
                            },
                            {path: 'tags', component: EscapeTypeTags, name: 'tags'}
                        ]
                    }
                ]
            },
            {
                path: 'new',
                redirect: {name: 'settings', params: {id: 'new'}},
                name: 'escape-new'
            },
            {
                path: ':id',
                component: Escape,
                children: [
                    {
                        path: '',
                        redirect: {name: 'reservations'}
                    },
                    {
                        path: 'reservations',
                        component: Reservations,
                        name: 'reservations'
                    },
                    {
                        path: 'settings',
                        component: Settings,
                        name: 'settings'
                    },
                    {
                        path: 'brochure',
                        component: BrochureUpload,
                        name: 'escape-brochure'
                    },
                    {
                        path: 'itinerary',
                        component: EscapeItinerary,
                        name: 'escape-itinerary'
                    },
                    {
                        path: 'packing-list',
                        component: EscapePackingList,
                        name: 'escape-packing-list'
                    },
                    {
                        path: 'reading-list',
                        component: EscapeReadingList,
                        name: 'escape-reading-list'
                    }
                ]
            }
        ]
    },
    {
        path: '/blog',
        component: Blog,
        children: [
            {path: 'list', component: BlogList, name: 'blog-list'},
            {path: 'post/:id?', component: BlogForm, name: 'edit-post'},
            {path: 'categories', component: BlogCategories, name: 'post-categories'}
        ]
    },
    {path: '/leads', component: Leads, name: 'leads'},
    {path: '/team', component: Team, name: 'team'},
    {path: '/team/:id?', component: TeamForm, name: 'edit-team'},
    {
        path: '/press',
        component: Press,
        children: [
            {path: '', component: PressList, name: 'press-list'},
            {path: ':id?', component: EditPress, name: 'edit-press'},
        ]
    },
    {
        path: '/testimonials',
        component: Testimonials,
        children: [
            {path: '', component: TestimonialsList, name: 'testimonials'},
            {path: ':id?', component: TestimonialForm, name: 'edit-testimonial'}
        ]
    },
    {path: '*', component: NotFound}
];

const router = new VueRouter({routes});

import Admin from './components/admin/admin.vue';

const app = new Vue({
    components: {
        Admin
    },
    router
}).$mount('#admin');