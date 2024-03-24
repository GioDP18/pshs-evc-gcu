import { createRouter, createWebHistory } from "vue-router";
import LoginView from "../Components/Views/LoginView.vue";
import RegistrationView from "../Components/Views/RegistrationView.vue";

//Staff
import StaffView from "../Components/Views/StaffView.vue";
import Home from "../Components/Pages/Staff/Home.vue";
import ProfilePage from "../Components/Pages/Staff/ProfilePage.vue";
import Calendar from "../Components/Pages/Staff/Calendar.vue";
//Forms
import IntakeInterviewForm from "../Components/Pages/Staff/Forms/IntakeInterviewForm.vue";
import GuidanceAdmissionSlip from "../Components/Pages/Staff/Forms/GuidanceAdmissionSlip.vue";
import GuidanceCallSlip from "../Components/Pages/Staff/Forms/GuidanceCallSlip.vue";
import ParentQuestionnaireForm from "../Components/Pages/Staff/Forms/ParentQuestionnaireForm.vue";
import ReferralForm from "../Components/Pages/Staff/Forms/ReferralForm.vue";
import CumulativeRecordForm from "../Components/Pages/Staff/Forms/CumulativeRecordForm.vue";
import ClientMonitoringForm from "../Components/Pages/Staff/Forms/ClientMonitoringForm.vue";
//Fields
import FieldIntakeInterviewForm from "../Components/Pages/Staff/FillForm/FieldIntakeInterviewForm.vue";
import FieldGuidanceAdmissionSlip from "../Components/Pages/Staff/FillForm/FieldGuidanceAdmissionSlip.vue";

// Student
import StudentView from "../Components/Views/StudentView.vue";
import StudentHome from "../Components/Pages/Student/StudentHome.vue";
import StudentCalendar from "../Components/Pages/Student/StudentCalendar.vue";
import StudentRequestCummulative from "../Components/Pages/Student/StudentRequestCummulative.vue";
import StudentRequestClient from "../Components/Pages/Student/StudentRequestClient.vue";
import StudentProfilePage from "../Components/Pages/Student/StudentProfilePage.vue";
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
            {
                path: "parentQuestionnaireForm",
                component: ParentQuestionnaireForm,
                name: "staff-parentQuestionnaireForm",
            },
            {
                path: "referralForm",
                component: ReferralForm,
                name: "staff-referralForm",
            },
            {
                path: "cumulativeRecordForm",
                component: CumulativeRecordForm,
                name: "staff-cumulativeRecordForm",
            },
            {
                path: "clientMonitoringForm",
                component: ClientMonitoringForm,
                name: "staff-clientMonitoringForm",
            },
            {
                path: "fieldIntakeInterview",
                component: FieldIntakeInterviewForm,
                name: "staff-fieldIntakeInterview",
            },
            {
                path: "fieldGuidanceAdmission",
                component: FieldGuidanceAdmissionSlip,
                name: "staff-fieldGuidanceAdmission",
            },
            {
                path: "profilePage",
                component: ProfilePage,
                name: "staff-profilePage",
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
                path: "studentCalendar",
                component: StudentCalendar,
                name: "student-studentCalendar",
            },
            {
                path: "studentRequestCummulative",
                component: StudentRequestCummulative,
                name: "student-requestFormCummulative",
            },
            {
                path: "studentRequestClient",
                component: StudentRequestClient,
                name: "student-requestFormClient",
            },
            {
                path: "studentProfilePage",
                component: StudentProfilePage,
                name: "student-studentProfilePage",
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
