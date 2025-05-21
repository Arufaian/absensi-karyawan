import api from "./axios";

function loginForm() {
    return {
        email: "",
        password: "",
        error: "",

        async submit() {
            this.error = "";
            try {
                // dapatkan csrf cookie
                await api.get("/sanctum/csrf-cookie");

                const response = await api.post("/api/login", {
                    email: this.email,
                    password: this.password,
                });

                localStorage.setItem("token", response.data.token);

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
