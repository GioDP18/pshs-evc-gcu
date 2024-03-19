import { createRouter, createWebHistory } from "vue-router";
import LoginView from "../Components/Views/LoginView.vue";
import RegistrationView from "../Components/Views/RegistrationView.vue";

//Staff
import StaffView from "../Components/Views/StaffView.vue";
import Home from "../Components/Pages/Staff/Home.vue";
import IntakeInterviewForm from "../Components/Pages/Staff/IntakeInterviewForm.vue";
import GuidanceAdmissionSlip from "../Components/Pages/Staff/GuidanceAdmissionSlip.vue";
import GuidanceCallSlip from "../Components/Pages/Staff/GuidanceCallSlip.vue";
import Calendar from "../Components/Pages/Staff/Calendar.vue";

// Student
import StudentView from "../Components/Views/StudentView.vue";
import StudentHome from "../Components/Pages/Student/StudentHome.vue";
import RequestForm from "../Components/Pages/Student/RequestForm.vue";
import NotFound from "../Components/404.vue";

const routes = [
    {
        path: "/",
        component: LoginView,
        name: "login",
    },
    {
        path: "/register",
        component: RegistrationView,
        name: "register",
    },
    {
        path: "/staff",
        component: StaffView,
        children: [
            {
                path: "home",
                component: Home,
                name: "staff-home",
            },
            {
                path: "calendar",
                component: Calendar,
                name: "staff-calendar",
            },
            {
                path: "intakeInterviewForm",
                component: IntakeInterviewForm,
                name: "staff-intakeInterviewForm",
            },
            {
                path: "guidanceAdmissionSlip",
                component: GuidanceAdmissionSlip,
                name: "staff-guidanceAdmissionSlip",
            },
            {
                path: "guidanceCallSlip",
                component: GuidanceCallSlip,
                name: "staff-guidanceCallSlip",
            },
        ],
    },
    {
        path: "/student",
        component: StudentView,
        children: [
            {
                path: "home",
                component: StudentHome,
                name: "student-home",
            },
            {
                path: "requestForm",
                component: RequestForm,
                name: "student-requestForm",
            },
        ],
    },
    {
        path: "/:path(.*)",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
