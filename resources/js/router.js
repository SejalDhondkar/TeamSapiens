import VueRouter from 'vue-router'

// Pages
import Home from './Home'
import Register from './auth/Register'
import Login from './auth/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import RolesIndex from './roles/Index'
import RolesCreate from './roles/Create'
import RolesEdit from './roles/Edit'

import HospitalDataEdit from './pages/user/DataEdit'
import HospitalList from './HospitalList'
import HospitalView from './HospitalView'
import DoctorList from './DoctorList'

import HospitalPatientList from './pages/user/Patients'

// Routes
const routes = [{
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/hospitals',
        name: 'hospitals',
        component: HospitalList,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/hospital/:id/view',
        name: 'hospital.view',
        component: HospitalView,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/doctors',
        name: 'doctors',
        component: DoctorList,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    {
        path: '/hospital/:id/edit',
        name: 'user.dataedit',
        component: HospitalDataEdit,
        meta: {
            auth: true
        }
    },
    {
        path: '/hospital/patients/list',
        name: 'hospital.patientlist',
        component: HospitalPatientList,
        meta: {
            auth: true
        }
    },
    // ADMIN ROUTES
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: AdminDashboard,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/roles',
        name: 'roles.index',
        component: RolesIndex,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/roles/create',
        name: 'roles.create',
        component: RolesCreate,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },
    {
        path: '/roles/:id/edit',
        name: 'roles.edit',
        component: RolesEdit,
        meta: {
            auth: { roles: 1, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },


]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router