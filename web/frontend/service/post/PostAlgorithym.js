export async function postIntroduce(BASE_URL,algoId) {
    // contend
    const payload = {
        id : algoId,
    }
    try {
        const POST_ALGORITHYM_URL = "/service/post/PostAlgorithym.php";
        const response = await fetch(BASE_URL + POST_ALGORITHYM_URL, {
            method : "POST",
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(payload)
        }) ;

        const data = await response.json();
        return data;
    }catch (e) {
         alert("Có lỗi xảy ra khi xử lý thuật toán!");
    }  
}