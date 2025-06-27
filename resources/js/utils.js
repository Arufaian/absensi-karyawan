import Alpine from "alpinejs";

export async function withGlobalLoading(callback) {
    const store = Alpine.store("globalState");
    store.startLoading();
    try {
        return await callback();
    } finally {
        store.stopLoading();
    }
}

export function getToken() {
    return localStorage.getItem("token");
}
