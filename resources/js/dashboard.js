import Alpine from "alpinejs";
import api from "./axios";

Alpine.data("dashboard", function () {
    return {
        user: {},
        attendance: {},

        async fetchUser() {
            const token = localStorage.getItem("token");

            try {
                const response = await api.get("/api/me", {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.user = response.data;
            } catch (error) {
                console.error("Gagal ambil data user:", error);
            }
        },

        get initials() {
            return this.user.name ? this.getInitialsRegex(this.user.name) : "";
        },

        getInitialsRegex(name) {
            const matches = name.match(/\b(\w)/g);
            return matches ? matches.join("").toUpperCase() : "";
        },

        async fetchAttendanceToday() {
            const token = localStorage.getItem("token");
            try {
                const response = await api.get("/api/attendances/today", {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.attendance = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },

        async logout() {
            const token = localStorage.getItem("token");

            try {
                await api.post(
                    "/api/logout",
                    {},
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );
                console.log("berhasil");
                localStorage.removeItem("token");
                window.location.href = "/login";
            } catch (error) {
                console.error("Gagal logout", error);
            }
        },

        init() {
            const token = localStorage.getItem("token");
            if (!token) {
                window.location.href = "/login";
            }
            this.fetchUser();
            this.fetchAttendanceToday();
        },
    };
});
