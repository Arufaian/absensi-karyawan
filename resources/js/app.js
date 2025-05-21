import "./bootstrap";
import "./themeController";
import Alpine from "alpinejs";
import loginForm from "./login";
import "./dashboard";
import "./leaveForm";

window.Alpine = Alpine;

Alpine.data("loginForm", loginForm);

Alpine.start();
