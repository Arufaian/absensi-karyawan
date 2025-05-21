import axios from "axios";

const api = axios.create({
    baseURL: "http://127.0.0.1:8001",
    withCredentials: true,
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
    },
});

api.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response.status === 401) {
            window.location.href = "/login";
        }

        return Promise.reject(error);
    }
);

export default api;
