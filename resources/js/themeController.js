document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const themeToggle = document.querySelector("#theme-toggle");

    themeToggle?.addEventListener("click", () => {
        const currentTheme = html.getAttribute("data-theme");
        const newTheme = currentTheme === "night" ? "light" : "night";
        html.setAttribute("data-theme", newTheme);
    });
});
