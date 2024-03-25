import { createRouter, createWebHistory } from "vue-router";
import LoginView from "../Components/Views/LoginView.vue";
import RegistrationView from "../Components/Views/RegistrationView.vue";

//---------------------------------Staff---------------------------------
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
import FieldGuidanceCallSlip from "../Components/Pages/Staff/FillForm/FieldGuidanceCallSlip.vue";
import FieldReferralForm from "../Components/Pages/Staff/FillForm/FieldReferralForm.vue";
import FieldGuidanceAdmission from "../Components/Pages/Staff/FillForm/FieldGuidanceAdmissionSlip.vue";

//---------------------------------Student---------------------------------
import StudentView from "../Components/Views/StudentView.vue";
import StudentHome from "../Components/Pages/Student/StudentHome.vue";
import StudentCalendar from "../Components/Pages/Student/StudentCalendar.vue";
import StudentProfilePage from "../Components/Pages/Student/StudentProfilePage.vue";
//Forms
import StudentCummulativeRecord from "../Components/Pages/Student/Forms/StudentCummulativeRecord.vue";
import StudentClientMonitoring from "../Components/Pages/Student/Forms/StudentClientMonitoring.vue";
//Fields

//---------------------------------Parents and Teachers---------------------------------
import ParentsTeacherView from "../Components/Views/ParentsTeacherView.vue";
import ParentsTeacherHome from "../Components/Pages/ParentsTeacher/ParentsTeacherHome.vue";
import ParentsTeacherCalendar from "../Components/Pages/ParentsTeacher/ParentsTeacherCalendar.vue";
import ParentsTeacherProfilePage from "../Components/Pages/ParentsTeacher/ParentsTeacherProfilePage.vue";
//Forms
import ParentsTeacherParentQuestionnaire from "../Components/Pages/ParentsTeacher/Forms/ParentsTeacherParentQuestionnaire.vue";
import ParentsTeacherReferralForm from "../Components/Pages/ParentsTeacher/Forms/ParentsTeacherReferralForm.vue";
//Fields
import ParentsTeacherRequestReferral from "../Components/Pages/ParentsTeacher/FillForm/ParentsTeacherRequestReferral.vue";

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
                path: "profilePage",
                component: ProfilePage,
                name: "staff-profilePage",
            },
            //FORMS
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
            //FIELDS
            {
                path: "fieldIntakeInterview",
                component: FieldIntakeInterviewForm,
                name: "staff-fieldIntakeInterview",
            },
            {
                path: "fieldGuidanceCall",
                component: FieldGuidanceCallSlip,
                name: "staff-fieldGuidanceCallSlip",
            },
            {
                path: "fieldReferralForm",
                component: FieldReferralForm,
                name: "staff-fieldReferralForm",
            },
            {
                path: "fieldGuidanceAdmission",
                component: FieldGuidanceAdmission,
                name: "staff-fieldGuidanceAdmission",
            },
        ],
    },
    {
        path: "/student",
        component: StudentView,
        children: [
            {
                path: "studentHome",
                component: StudentHome,
                name: "student-Home",
            },
            {
                path: "studentCalendar",
                component: StudentCalendar,
                name: "student-Calendar",
            },
            {
                path: "studentProfilePage",
                component: StudentProfilePage,
                name: "student-studentProfilePage",
            },
            //FORMS
            {
                path: "studentCummulativeRecord",
                component: StudentCummulativeRecord,
                name: "student-CummulativeRecord",
            },
            {
                path: "studentClientMonitoring",
                component: StudentClientMonitoring,
                name: "student-ClientMonitoring",
            },
            //FIELDS
        ],
    },
    {
        path: "/parentsTeacher",
        component: ParentsTeacherView,
        children: [
            {
                path: "parentsTeacherhome",
                component: ParentsTeacherHome,
                name: "parentsTeacher-Home",
            },
            {
                path: "parentsTeacherCalendar",
                component: ParentsTeacherCalendar,
                name: "parentsTeacher-Calendar",
            },
            {
                path: "parentsTeacherProfilePage",
                component: ParentsTeacherProfilePage,
                name: "student-ProfilePage",
            },
            //FORMS
            {
                path: "parentsTeacherParentQuestionnaire",
                component: ParentsTeacherParentQuestionnaire,
                name: "parentsTeacher-ParentQuestionnaire",
            },
            {
                path: "parentsTeacherReferralForm",
                component: ParentsTeacherReferralForm,
                name: "parentsTeacher-ReferralForm",
            },
            //FIELDS
            {
                path: "parentsTeacherRequestReferral",
                component: ParentsTeacherRequestReferral,
                name: "parentsTeacher-RequestReferral",
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
