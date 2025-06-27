import "./bootstrap";
import "./themeController";
import Alpine from "alpinejs";
import loginForm from "./login";
import "./globalState";
import "./dashboard";
import "./utils";

window.Alpine = Alpine;
Alpine.data("loginForm", loginForm);

// Dynamic import module spesifik per halaman
const path = window.location.pathname;

const pageModules = {
    "/dashboard/pengajuan-cuti": () => import("./leaveForm"),
    "/dashboard/pengajuan-izin": () => import("./permissionForm"),
    "/dashboard/absensi": () => import("./viewAbsensi"),
};

const initPage = pageModules[path];

if (initPage) {
    initPage().then(() => Alpine.start());
} else {
    Alpine.start();
}
