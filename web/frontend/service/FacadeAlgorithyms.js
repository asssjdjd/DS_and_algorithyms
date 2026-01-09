import { loadAlgorithmMenu } from "./get/GetAlgorithyms.js"
import { loadIntroduce } from "./get/GetIntroduceData.js";
import { postInputData } from "./post/PostInputData.js";

const BASE_URL = "http://localhost:8000/server";

// Hiển thị chọn nhóm thuật toán với người dùng .

// có thể update thêm name nếu rảnh ^ ^
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

// Nhận dữ liệu và hiển thị lên giao diện cho người dùng
document.addEventListener('DOMContentLoaded', async () => {
    // initial data
     const groupSelect = document.getElementById("group_select");
     const algorithymSelect = document.getElementById("algo_select");

    // get data
    const algorithyms = await loadAlgorithmMenu(BASE_URL);
    const groups = algorithyms.map(item => item.group);
    const uniqueGroup = [...new Set(groups)];

    // check 
    console.log(algorithyms);
    console.log(groups,uniqueGroup);
   

    // render group select
    groupSelect.innerHTML = '<option value="">---- select-group ----</option>';
    uniqueGroup.map(option => {
        addOptionAlgorithyms(groupSelect,option)
    });

    // render select algorithyms after choose group algorithyms
    groupSelect.addEventListener('change', (event) => {
        const selectedGroup = event.target.value;
        const algos = algorithyms.filter(item => item.group == selectedGroup);
        cleanOptionAlgorithms(algorithymSelect);
        // Hiển thị thuật toán 
        algos.map(algo => addSelectedAlgorithyms(algorithymSelect,algo.id,algo.name))

        // check
        console.log(selectedGroup);
        console.log(algos);
    });

    // add another feature here ....
    algorithymSelect.addEventListener('change', (event) => {
        const test = event.target.value;
        console.log(test);
    });
   
    test();
    
});

const test =  async () => {
    const introduceDatas = await loadIntroduce(BASE_URL);
    const inputDatas = await postInputData(BASE_URL);
    console.log(introduceDatas);
    console.log(inputDatas);
}
