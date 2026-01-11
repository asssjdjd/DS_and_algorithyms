import { AlgorithmGroup,AlgorithmId } from "./AlgorithmEnums.js";
import {validateBigSorting} from "./impl/ValidateBigSorting.js"
import {validateCountingSort} from "./impl/ValidateCountingSort.js"
import { validateInsertionSort1 } from "./impl/ValidateInsertionSort1.js";
import { validateInsertionSort2 } from "./impl/ValidateInsertionSort2.js";


// validate input dữ liệu và trả về các trường
export async function validate(data) {
    // kiểm tra có chứa ký tự hoa ký tự thường không.
    let lines = data.trim().split(/\r?\n/);

    const validationResults = lines.map((line,index) => {

        const tokens = line.split(/\s+/).filter(Boolean);

        const isAllNumeric = /^\d+$/.test(line.trim()); // kiểm tra có toàn số không
        const hasAlpha = /[a-zA-Z]/.test(line); // có chữ thường không 
        // const hasSpecialChar = /[^a-zA-Z0-9\s]/.test(line); 
        const hasSpecialChar = /[^a-zA-Z0-9\s\-]/.test(line); // có ký tự đặc biệt hay không.
        const countNumbers = tokens.length; // Đếm số lượng số trong 1 dòng

        // Kiểm tra có số âm không
        const hasNegative = tokens.some(token => {
            return !isNaN(token) && Number(token) < 0;
        });

        // Trả về một object đại diện cho trạng thái của dòng đó.
        return {
            lineNumber : index + 1,
            content : line,
            isNumeric : isAllNumeric,
            hasAlpha : hasAlpha,
            isValidSpecial : !hasSpecialChar,

            // Các trường mới thêm
            numberCount: countNumbers, // Số lượng số (VD: "1 2 3" => 3)
            hasNegative: hasNegative,   // True nếu có số âm (VD: "-5")
        };
    });

    return validationResults;
};

// validate thực sự
export async function validateDetail(algorithm,data) {
    let validate;
    // triển khai tính đa hình trong js
    if(algorithm === AlgorithmId.BIG_SORTING) {
        validate = await validateBigSorting(data);
    }else if(algorithm === AlgorithmId.COUNTING_SORT) {
        validate = await validateCountingSort(data);
    }else if(algorithm === AlgorithmId.INSERTION_SORT_1) {
        validate = await validateInsertionSort1(data);
    }else if(algorithm === AlgorithmId.INSERTION_SORT_2) {
        validate = await validateInsertionSort2(data);
    }
    return validate;
}