// const BASE_URL = "http://localhost:8000/server";

export async function postInputData(BASE_URL,algo_id,data) {
    
    // payload : dữ liệu từ người dùng gửi đi
    const payload = {
        'algorithym_id' :algo_id,
        'data' : data,
    };

    try {
        const POST_INPUT_DATA_URL = "/Controller/Post/PostInputData.php";
        // gửi đến server để thực hiện
        const response = await fetch(BASE_URL + POST_INPUT_DATA_URL, {
            method : "POST",
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(payload)
        });
        
        // nhận dữ liệu từ server trả về
        const data = await response.json();
        return data;

    }catch (e) {
        alert("Có lỗi xảy ra khi xử lý thuật toán!");
    }
}
