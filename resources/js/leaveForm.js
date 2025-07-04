import Alpine from "alpinejs";
import api from "./axios";
import { getToken, withGlobalLoading } from "./utils";

Alpine.data("leaveForm", () => {
    return {
        leave: {
            start_date: "",
            end_date: "",
            reason: "",
        },

        leaveData: {},

        submitting: false,
        successMessage: "",
        errorMessage: "",

        async submitLeave() {
            this.submitting = true;
            this.successMessage = "";
            this.errorMessage = "";

            const token = getToken();

            try {
                const response = await api.post("/api/leaves", this.leave, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                this.successMessage = response.data.message;
                setTimeout(() => {
                    this.successMessage = "";
                }, 5000);
                await this.getLeaveData();
                this.leave = { start_date: "", end_date: "", reason: "" };
            } catch (error) {
                console.error(error);
                this.errorMessage = "gagal menambahkan cuti";
            } finally {
                this.submitting = false;
            }
        },

        async getLeaveData() {
            const token = getToken();

            withGlobalLoading(async () => {
                try {
                    const response = await api.get("/api/me/leaves", {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });

                    this.leaveData = response.data.data;
                } catch (error) {
                    console.error("Gagal mendapat data cuti");
                }
            });
        },

        init() {
            this.getLeaveData();
        },
    };
});
