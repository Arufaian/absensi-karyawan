import Alpine from "alpinejs";
import api from "./axios";
import { getToken, withGlobalLoading } from "./utils";

Alpine.data("permissionForm", () => {
    return {
        inputPermission: {
            date: "",
            reason: "",
        },

        permissionData: {},
        submitting: false,
        successMessage: "",
        errorMessage: "",

        async submitPermission() {
            this.submitting = true;
            this.successMessage = "";
            this.errorMessage = "";

            const token = getToken();

            try {
                const response = await api.post(
                    "/api/permissions",
                    this.inputPermission,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    }
                );

                this.successMessage = response.data.message;
                setTimeout(() => {
                    this.successMessage = "";
                }, 5000);

                this.getPermission();

                this.inputPermission = {
                    date: "",
                    reason: "",
                };
            } catch (error) {
                this.errorMessage = "gagal menambahkan cuti";
            } finally {
                this.submitting = false;
            }
        },

        async getPermission() {
            const token = localStorage.getItem("token");

            withGlobalLoading(async () => {
                try {
                    const response = await api.get("api/me/permission", {
                        headers: {
                            Authorization: `Bearer ${token}`,
                        },
                    });
                    this.permissionData = response.data.data;
                } catch (error) {
                    console.error("Gagal mendapatkan data izin: " + error);
                }
            });
        },

        init() {
            this.getPermission();
        },
    };
});
