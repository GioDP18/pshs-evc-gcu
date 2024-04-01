import { createRouter, createWebHistory } from "vue-router";
import store from "../State/index.js";
import isAuthenticated from "../Middleware/isAuthenticated";
import LoginView from "../Components/Views/LoginView.vue";
import RegistrationView from "../Components/Views/RegistrationView.vue";
import AboutPage from "../Components/Views/AboutPage.vue";

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
import FieldClientMonitoringForm from "../Components/Pages/Staff/FillForm/FieldClientMonitoringForm.vue";
import FieldParentQuestionnaire from "../Components/Pages/Staff/FillForm/FieldParentQuestionnaire.vue";
import FieldCumulativeRecord from "../Components/Pages/Staff/FillForm/FieldCumulativeRecord.vue";
//Requests
import RequestIntakeInterview from "../Components/Pages/Staff/Requests/RequestIntakeInterview.vue";
import RequestGuidanceAdmission from "../Components/Pages/Staff/Requests/RequestGuidanceAdmission.vue";
import RequestGuidanceCall from "../Components/Pages/Staff/Requests/RequestGuidanceCall.vue";
import RequestClientMonitoring from "../Components/Pages/Staff/Requests/RequestClientMonitoring.vue";
import RequestParentQuestionnaire from "../Components/Pages/Staff/Requests/RequestParentQuestionnaire.vue";
import RequestReferralForm from "../Components/Pages/Staff/Requests/RequestReferralForm.vue";
import RequestCumulativeRecord from "../Components/Pages/Staff/Requests/RequestCumulativeRecord.vue";

//---------------------------------Student---------------------------------
import StudentView from "../Components/Views/StudentView.vue";
import StudentHome from "../Components/Pages/Student/StudentHome.vue";
import StudentCalendar from "../Components/Pages/Student/StudentCalendar.vue";
import StudentProfilePage from "../Components/Pages/Student/StudentProfilePage.vue";
//Forms
import StudentCummulativeRecord from "../Components/Pages/Student/Forms/StudentCummulativeRecord.vue";
import StudentClientMonitoring from "../Components/Pages/Student/Forms/StudentClientMonitoring.vue";
//Fields
import FillClientMonitoring from "../Components/Pages/Student/FillForm/FillClientMonitoringForm.vue";
//Assignments
import AssignmentCumulative from "../Components/Pages/Student/Assignments/StudentAssignmentCummulativeRecord.vue";
import AssignmentClientMonitoring from "../Components/Pages/Student/Assignments/StudentAssignmentClientMonitoring.vue";

//---------------------------------Parents and Teachers---------------------------------
import ParentsTeacherView from "../Components/Views/ParentsTeacherView.vue";
import ParentsTeacherHome from "../Components/Pages/ParentsTeacher/ParentsTeacherHome.vue";
import ParentsTeacherCalendar from "../Components/Pages/ParentsTeacher/ParentsTeacherCalendar.vue";
import ParentsTeacherProfilePage from "../Components/Pages/ParentsTeacher/ParentsTeacherProfilePage.vue";
//Forms
import ParentsTeacherParentQuestionnaire from "../Components/Pages/ParentsTeacher/Forms/ParentsTeacherParentQuestionnaire.vue";
import ParentsTeacherReferralForm from "../Components/Pages/ParentsTeacher/Forms/ParentsTeacherReferralForm.vue";
//Fields
import FillReferral from "../Components/Pages/ParentsTeacher/FillForm/FillReferralForm.vue";
//Assignments
// import AssignmentParentQuestionnaire from "../Components/Pages/ParentsTeacher/Assignments/PTAssignmentParentQuestionnaire.vue";
import AssignmentReferralForm from "../Components/Pages/ParentsTeacher/Assignments/PTAssignmentReferral.vue";

import ConfirmEmail from "../Components/Views/ConfirmEmail.vue";
import VerifiedEmail from "../Components/Views/VerifiedEmail.vue";
import VerifyEmail from "../Components/Views/VerifyEmail.vue";
import NotVerifiedEmail from "../Components/Views/NotVerifiedEmail.vue";
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
        path: "/about",
        component: AboutPage,
        name: "about",
    },
    {
        path: "/verify-email",
        component: VerifyEmail,
        name: "verify-email",
    },
    {
        path: "/staff",
        component: StaffView,
        meta: { requiresAuth: true },
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
            {
                path: "fieldClientMonitoring",
                component: FieldClientMonitoringForm,
                name: "staff-fieldClientMonitoring",
            },
            {
                path: "fieldParentQuestionnaire",
                component: FieldParentQuestionnaire,
                name: "staff-fieldParentQuestionnaire",
            },
            {
                path: "fieldCumulativeRecord",
                component: FieldCumulativeRecord,
                name: "staff-fieldCumulativeRecord",
            },
            //REQUESTS
            {
                path: "requestIntakeInterview",
                component: RequestIntakeInterview,
                name: "staff-requestIntakeInterview",
            },
            {
                path: "requestGuidanceAdmission",
                component: RequestGuidanceAdmission,
                name: "staff-requestGuidanceAdmission",
            },
            {
                path: "requestClientMonitoring",
                component: RequestClientMonitoring,
                name: "staff-requestClientMonitoring",
            },
            {
                path: "requestGuidanceCall",
                component: RequestGuidanceCall,
                name: "staff-requestGuidanceCall",
            },
            {
                path: "requestParentQuestionnaire",
                component: RequestParentQuestionnaire,
                name: "staff-requestParentQuestionnaire",
            },
            {
                path: "requestReferralForm",
                component: RequestReferralForm,
                name: "staff-requestReferralForm",
            },
            {
                path: "requestCumulativeRecord",
                component: RequestCumulativeRecord,
                name: "staff-requestCumulativeRecord",
            },
        ],
    },
    {
        path: "/student",
        component: StudentView,
        meta: { requiresAuth: true },
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
            // {
            //     path: "fillCumulativeRecord",
            //     component: FillCumulativeRecord,
            //     name: "student-fillCumulativeRecord",
            // },
            {
                path: "fillClientMonitoring",
                component: FillClientMonitoring,
                name: "student-fillClientMonitoring",
            },
            // ASSIGNMENTS
            {
                path: "assignmentCumulative",
                component: AssignmentCumulative,
                name: "student-assignmentCumulative",
            },
            {
                path: "assignmentClientMonitoring",
                component: AssignmentClientMonitoring,
                name: "student-assignmentClientMonitoring",
            },
        ],
    },
    {
        path: "/parentsTeacher",
        component: ParentsTeacherView,
        meta: { requiresAuth: true },
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
                path: "fillReferral",
                component: FillReferral,
                name: "parentsTeacher-fillReferral",
            },
            //ASSIGNMENTS
            {
                path: "assReferral",
                component: AssignmentReferralForm,
                name: "parentsTeacher-assReferral",
            },
        ],
    },
    {
        path: "/confirmEmail",
        component: ConfirmEmail,
        name: "ConfirmEmail",
    },
    {
        path: "/verifiedEmail",
        component: VerifiedEmail,
        name: "verifiedEmail",
    },
    {
        path: "/notVerifiedEmail",
        component: NotVerifiedEmail,
        name: "notVerifiedEmail",
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

router.beforeEach(async (to, from, next) => {
    if (to.meta.requiresAuth) {
        const authenticated = await isAuthenticated();

        if (!authenticated) {
            console.log("Unauthorized");
            store.commit(
                "setWarning",
                "Please Login your credentials to continue!"
            );
            next({ name: "login" });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
