

export async function loadIntroduce(BASE_URL) {
  try {
    const GET_INTRODUCE_URL = "/service/get/GetIntroduceData.php";

    const response = await fetch(BASE_URL + GET_INTRODUCE_URL);

    const data = await response.json();

    return data;

  } catch (e) {
    console.error("Lỗi khi lấy danh sách:", e);
  }
}
