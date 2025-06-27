// resources/js/globalState.js
import Alpine from "alpinejs";

Alpine.store("globalState", {
    loadingCount: 0,
    get isLoading() {
        return this.loadingCount > 0;
    },
    startLoading() {
        this.loadingCount++;
    },
    stopLoading() {
        this.loadingCount = Math.max(0, this.loadingCount - 1);
    },
});
