import { loadAlgorithmMenu } from "./get/GetAlgorithyms.js"
import { postInputData } from "./post/PostInputData.js";
import { postIntroduce } from "./post/PostAlgorithym.js";
import { validate,validateDetail} from './ValidateInputData.js';


const BASE_URL = "http://localhost:8000/server";
// Nhận dữ liệu và hiển thị lên giao diện cho người dùng (Main Events)
let currentAlgorithmId = null;

document.addEventListener('DOMContentLoaded', async () => {
    // Khởi tạo dữ liệu
     const groupSelect = document.getElementById("group_select");
     const algorithymSelect = document.getElementById("algo_select");

    // Nhận dữ liệu
    const algorithyms = await loadAlgorithmMenu(BASE_URL);
    const groups = algorithyms.map(item => item.group);
    const uniqueGroup = [...new Set(groups)];

    // Hiển thị các lựa chọn về nhóm thuật toán
    groupSelect.innerHTML = '<option value="">---- select-group ----</option>';
    uniqueGroup.map(option => {
        addOptionAlgorithyms(groupSelect,option)
    });

    // Hiển thị chi tiết các  thuật toán sau khi chọn nhóm thuật toán.
    groupSelect.addEventListener('change', (event) => {
        const selectedGroup = event.target.value;
        const algos = algorithyms.filter(item => item.group == selectedGroup);

        // Xóa các options khác
        cleanOptionAlgorithms(algorithymSelect);

        // Hiển thị thuật toán 
        algos.map(algo => addSelectedAlgorithyms(algorithymSelect,algo.id,algo.name))
    });

    // Khi người dùng lựa chọn thuật toán cụ thể ví dụ BigSorting
    algorithymSelect.addEventListener('change', async (event) => {
        currentAlgorithmId = event.target.value;
        // gửi thông tin thuật toán đã chọn để nhận introduce
        const dataIntroduce = await postIntroduce(BASE_URL,currentAlgorithmId);
        console.log(dataIntroduce);
        renderintroduce(dataIntroduce);
        // Reset kết quả cũ nếu cần
        console.log(`Đã chuyển sang thuật toán: ${currentAlgorithmId}`);
    });

    // handleInput(); // 2 cách triển khai 1 với promise 1 với callback
    setupRunButton();

});


// CÁC HÀM HỖ TRỢ
// Hiển thị hướng dẫn
function renderintroduce(data) {
    const introText = document.getElementById("intro_text");
    const noteText = document.getElementById("note_text");
    const note = document.getElementById("note");

    data = data.data_received;
    // xử lý 
    if(data.status !== "failed") {
        introText.innerText = data.intro;
        noteText.innerText = data.data;
        note.innerText = data.note;
    }else {
        introText.innerText = "Chưa định nghĩa thuật toán";
        noteText.innerText = "Chưa có thông tin input";
        note.innerText = "Không có lưu ý";
    }
}

// Hiển thị chọn nhóm thuật toán với người dùng .
// có thể update thêm tên thuật toán tiếng việt nếu rảnh ^ ^
function addOptionAlgorithyms (root, value) {
    const selectOption = document.createElement('option');
    selectOption.value = value;
    selectOption.textContent = value;
    root.appendChild(selectOption);
}

// dọn dữ liệu khi chọn thuật toán khác 
function cleanOptionAlgorithms(root) {
    const clearOption = root.querySelectorAll('option');
    clearOption.forEach(element => {
        element.remove();
    });
    const createOption = document.createElement('option');
    createOption.textContent = "---- select-here ----";
    root.appendChild(createOption);

}

// Hiển thị chọn giải thuật với người dùng
function addSelectedAlgorithyms(root, value, name) {
    const selectedAlgo = document.createElement('option');
    selectedAlgo.value = value;
    selectedAlgo.textContent = name;
    root.appendChild(selectedAlgo);
}


function setupRunButton() {
    const inputData = document.getElementById("input_data");
    const runBtn = document.querySelector(".code-header .btn-run");
    const messageInput = document.getElementById("message_input");
    // Đăng ký sự kiện 1 lần duy nhất
    runBtn.addEventListener('click', async () => {

        if (!currentAlgorithmId || currentAlgorithmId === "---- select-here ----") {
            alert("Vui lòng chọn thuật toán trước khi chạy!");
            return;
        }

        const raw = inputData.value;
        console.log(currentAlgorithmId);

        // validate dữ liệu
        const validates = await validate(raw); 
        const validateDetails = await validateDetail(currentAlgorithmId, validates);
        
        const checkValid = checkValidate(validateDetails);
        console.log(checkValid);
        // kiểm tra validate dữ liệu
        if(checkValid == true) {
            messageInput.innerText = ''; // xóa message
            
            const outputAndExplaint = await postInputData(BASE_URL,currentAlgorithmId,validateDetails);
            const output = getSortedNumberString(outputAndExplaint);
            const explaint = getCleanTextArray(outputAndExplaint);
            console.log(output);
            console.log(explaint);
            renderOutputAndExplaint(output,explaint);
            // console.log(outputAndExplaint);
            // console.log()
        }else {
            const message = validateDetails[0].message;
            console.log(message);
            // Hiển thị lỗi
            messageInput.innerText = message;
        }
    });
}

function renderOutputAndExplaint(output,explaint) {
    const outputDisplay = document.getElementById("output_display");
    const explanationBox = document.querySelector(".explanation-box");

    outputDisplay.innerText = output;
    const beforeLine =  document.querySelectorAll(".explanation-box p");
    
    // xóa các dòng trước
    beforeLine.forEach(element => {
        element.remove();
    });
    // chèn các dòng vào
    explaint.forEach(line => {
        const lineExplaint = document.createElement("p");
        lineExplaint.textContent = line;
        explanationBox.appendChild(lineExplaint);
    });
}

// duyệt qua tất cả 
function checkValidate(validateData) {
    let check = true;
    validateData.forEach(data => {
        if(data.isValid == false) {
            check = false;
        }
    });
    return check;
}

// Đặt promise để làm sự kiện có vẻ thằng hàng.
function waitForRunClick() {
    return new Promise((resolve) => {
        const runBtn = document.querySelector(".code-header .btn-run");
        const inputData = document.getElementById("input_data");
        runBtn.addEventListener('click', async () => {
            const raw = inputData.value;

            if (!currentAlgorithmId || currentAlgorithmId === "---- select-here ----") {
                alert("Vui lòng chọn thuật toán trước khi chạy!");
                return;
            }

            const validates = await validate(raw); 
            const validateDetails = await validateDetail(currentAlgorithmId, validates);
            resolve(validateDetails);

        }, { once: true });
    });
}

async function handleInput() {
    while(true) {
        const dataInput = await waitForRunClick(); 
        console.log("Dữ liệu nhận được:", dataInput);
    }
}
// Hàm lọc và sắp xếp chuỗi số
function getSortedNumberString(jsonResponse) {
    const rawNumbers = jsonResponse.data_received[0];
    
    // Sắp xếp các số. Lưu ý: Sử dụng BigInt nếu số quá lớn để tránh mất độ chính xác
    const sorted = [...rawNumbers].sort((a, b) => {
        return BigInt(a) > BigInt(b) ? 1 : -1;
    });

    return sorted.join(" "); // Nối thành chuỗi cách nhau bởi khoảng trắng
}

// Hàm tách văn bản dựa trên xuống dòng và làm sạch dữ liệu
function getCleanTextArray(jsonResponse) {
    const rawText = jsonResponse.data_received[1];

    // Sử dụng Regex /\r?\n/ để bắt cả trường hợp \r\n hoặc chỉ \n
    return rawText
        .split(/\r?\n/) 
        .map(line => line.trim()) // Loại bỏ khoảng trắng thừa đầu và cuối mỗi dòng
        .filter(line => line.length > 0); // Loại bỏ các dòng trống
}