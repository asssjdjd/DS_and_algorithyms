// Nhận dữ liệu từ Server.

// const BASE_URL = "http://localhost:8000/server";

export async function loadAlgorithmMenu(BASE_URL) {
    try {
        const GET_ALGORITHYMS_URL = "/service/get/GetAlgorithyms.php";
        const response = await fetch(BASE_URL + GET_ALGORITHYMS_URL);
        const data = await response.json();
        return data;
    } catch (e) {
        console.error("Lỗi khi lấy danh sách:", e);
    }
}

