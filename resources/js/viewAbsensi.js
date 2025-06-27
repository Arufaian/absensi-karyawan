import Alpine from "alpinejs";
import api from "./axios";
import { getToken } from "./utils";

Alpine.data("viewAbsensi", () => {
    return {
        absensiData: [],
        currentPage: 1,
        lastPage: 1,
        perPage: 10,

        async fetchAbsensi() {
            const token = getToken();
            try {
                const response = await api.get("/api/me/attendances", {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                    params: {
                        page: this.currentPage,
                        per_page: this.perPage,
                    },
                });

                const result = response.data.data;
                this.absensiData = result.data;
                this.currentPage = result.current_page;
                this.lastPage = result.last_page;
            } catch (error) {
                console.error("Gagal ambil data absensi:", error);
            }
        },

        goToPage(page) {
            if (page >= 1 && page <= this.lastPage) {
                this.currentPage = page;
                this.fetchAbsensi();
            }
        },

        nextPage() {
            this.goToPage(this.currentPage + 1);
        },

        prevPage() {
            this.goToPage(this.currentPage - 1);
        },

        init() {
            this.fetchAbsensi();
        },
    };
});
