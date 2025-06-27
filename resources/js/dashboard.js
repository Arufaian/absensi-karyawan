import Alpine from "alpinejs";
import api from "./axios";
import { getToken, withGlobalLoading } from "./utils";

Alpine.data("dashboard", function () {
    return {
        // user: {},
        user: {
            name: "",
            email: "",
            phone: "",
            password: "",
            password_confirmation: "",
        },
        attendance: {},
        statusAttendance: {},
        leave: {},
        permission: {},
        monthlyAttendance: [],
        leaveQuota: {},

        attendanceSummary: {
            hadir: 0,
            terlambat: 0,
            cuti: 0,
            izin: 0,
            alpa: 0,
        },

        successMessage: "",

        async fetchUser() {
            const token = getToken();
            withGlobalLoading(async () => {
                try {
                    const response = await api.get("/api/me", {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });

                    this.user = response.data;
                    console.log(this.user);
                } catch (error) {
                    console.error("Gagal ambil data user:", error);
                }
            });
        },

        get initials() {
            return this.user.name ? this.getInitialsRegex(this.user.name) : "";
        },

        getInitialsRegex(name) {
            const matches = name.match(/\b(\w)/g);
            return matches ? matches.join("").toUpperCase() : "";
        },

        async getStatusAttendanceToday() {
            const token = getToken();

            withGlobalLoading(async () => {
                try {
                    const response = await api.get(
                        "api/me/get-status-attendance",
                        {
                            headers: {
                                Authorization: `Bearer ${token}`,
                            },
                        }
                    );

                    this.statusAttendance = response.data.data;
                } catch (error) {
                    console.error("Gagal ambil status kehadiran:", error);
                }
            });
        },

        async getMonthlyAttendance() {
            const token = getToken();

            withGlobalLoading(async () => {
                try {
                    const response = await api.get(
                        "/api/me/get-monthly-attendance",
                        {
                            headers: {
                                Authorization: `Bearer ${token}`,
                            },
                        }
                    );

                    this.monthlyAttendance = response.data.data;
                    this.calculateAttendanceSummary(); // Panggil fungsi hitung summary
                } catch (error) {
                    console.error(
                        `Gagal mengambil data absen bulan ini ${error}`
                    );
                }
            });
        },

        calculateAttendanceSummary() {
            // Reset counter
            this.attendanceSummary = {
                hadir: 0,
                terlambat: 0,
                cuti: 0,
                izin: 0,
                alpa: 0,
            };

            // Hitung setiap status
            this.monthlyAttendance.forEach((item) => {
                if (this.attendanceSummary.hasOwnProperty(item.status)) {
                    this.attendanceSummary[item.status]++;
                }
            });
        },

        async getLeave() {
            const token = getToken();
            withGlobalLoading(async () => {
                try {
                    const response = await api.get("/api/me/leaves", {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });

                    this.leave = response.data.data;
                } catch (error) {
                    console.error("gagal ambil data cuti:", error);
                }
            });
        },

        async fetchLeaveQuota() {
            const token = getToken();

            try {
                const response = await api.get("/api/me/leave-quota", {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.leaveQuota = response.data.data;
            } catch (error) {
                console.error("gagal mendapatkan data quota cuti" + error);
            }
        },

        async submitProfile() {
            const token = getToken();

            try {
                const payload = {
                    name: this.user.name,
                    email: this.user.email,
                    nomor_telepon: this.user.phone,
                };

                // Kirim password hanya jika diisi
                if (this.user.password) {
                    payload.password = this.user.password;
                    payload.password_confirmation =
                        this.user.password_confirmation;
                }

                const response = await api.patch("/api/me", payload, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.successMessage = response.data.message;

                setTimeout(() => {
                    this.successMessage = "";
                }, 5000);

                // Optionally kosongkan password field setelah berhasil
                this.user.password = "";
                this.user.password_confirmation = "";
            } catch (error) {
                this.errorMessage = "Gagal memperbarui data.";
                console.error(error);
            }
        },

        async logout() {
            const token = getToken();

            withGlobalLoading(async () => {
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
                    localStorage.removeItem("token");
                    window.location.href = "/login";
                } catch (error) {
                    console.error("Gagal logout", error);
                }
            });
        },

        init() {
            const token = getToken;
            if (!token) {
                window.location.href = "/login";
            }

            this.fetchUser();
            this.getStatusAttendanceToday();
            this.getLeave();
            this.getMonthlyAttendance();
            this.fetchLeaveQuota();
        },
    };
});
