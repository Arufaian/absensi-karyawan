import Alpine from "alpinejs";
import api from "./axios";

Alpine.data("leaveForm", () => {
    return {
        leave: {
            start_date: "",
            end_date: "",
            reason: "",
        },

        submitting: false,
        successMessage: "",
        errorMessage: "",

        async submitLeave() {
            this.submitting = true;
            this.successMessage = "";
            this.errorMessage = "";

            const token = localStorage.getItem("token");

            console.log(this.leave);

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

                this.leave = { start_date: "", end_date: "", reason: "" };
            } catch (error) {
                this.errorMessage = "gagal menambahkan cuti";
            } finally {
                this.submitting = false;
            }
        },
    };
});
