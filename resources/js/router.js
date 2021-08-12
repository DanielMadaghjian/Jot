import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import ContactsCreate from "./views/ContactsCreate";
import ContactsShow from "./views/ContactsShow";
import ContactsEdit from "./views/ContactsEdit";
import ContactsIndex from "./views/ContactsIndex";
import Home from "./views/Home";
import PostCreate from "./views/PostCreate";
import PostIndex from "./views/PostIndex";
import PostShow from "./views/PostShow";
import PostEdit from "./views/PostEdit";
import PostIndexTutor from "./views/PostIndexTutor";

import BirthdaysIndex from "./views/BirthdaysIndex";

import Logout from "./Actions/Logout";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { 
            path: '/', component:ExampleComponent, 
            meta: {title: 'Welcome' }
        },
        { 
            path: '/home', component:Home, 
            meta: {title: 'Home' }
        },
        { 
            path: '/contacts', component:ContactsIndex, 
            meta: {title: 'Contacts' }
        },
        { 
            path: '/contacts/create', component:ContactsCreate, 
            meta: {title: 'Add New Contact' }
        },
        { 
            path: '/contacts/:id', component:ContactsShow ,
            meta: {title: 'Details for Contact' }
        },
        { 
            path: '/contacts/:id/edit', component:ContactsEdit, 
            meta: {title: 'Edit Contact' }
        },

        { 
            path: '/birthdays', component:BirthdaysIndex ,
            meta: {title: 'This Months Birthdays' }
        },
        { 
            path: '/posts', component:PostIndex ,
            meta: {title: 'Posts' }
        },
        { 
            path: '/postsTutor', component:PostIndexTutor ,
            meta: {title: 'Posts Tutor' }
        },
        { 
            path: '/posts/create', component:PostCreate ,
            meta: {title: 'Add New Post' }
        },
        { 
            path: '/posts/:id', component:PostShow ,
            meta: {title: 'Details for Post' }
        },
        { 
            path: '/posts/:id/edit', component:PostEdit, 
            meta: {title: 'Edit Post' }
        },
        { 
            path: '/logout', component:Logout 
            
        },
    ],
    mode: 'history'
});