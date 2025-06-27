Alpine.data("dashboard", function () {
    return {
        // ... data yang sudah ada ...

        // ... method yang sudah ada ...

        async getMonthlyAttendance() {
            const token = localStorage.getItem("token");

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
                console.log(this.monthlyAttendance);
            } catch (error) {
                console.log("gagal ambil data kehadiran bulanan:", error);
            }
        },

        // Fungsi untuk menghitung summary
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

        // ... method lainnya ...
    };
});
