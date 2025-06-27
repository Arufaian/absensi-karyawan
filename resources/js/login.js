import api from "./axios";

function loginForm() {
    return {
        email: "",
        password: "",
        error: "",

        async submit() {
            this.error = "";

            try {
                const response = await api.post("/api/login", {
                    email: this.email,
                    password: this.password,
                });

                // Simpan token ke localStorage
                localStorage.setItem("token", response.data.token);

                // Arahkan ke dashboard
                window.location.href = "/dashboard";
            } catch (error) {
                this.error =
                    error.response?.data?.message ||
                    "Login gagal, silakan coba lagi";
                console.error(this.error);
            }
        },
    };
}

export default loginForm;
