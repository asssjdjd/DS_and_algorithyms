import { AlgorithmGroup,AlgorithmId } from "./AlgorithmEnums.js";
import {validateBigSorting} from "./impl/ValidateBigSorting.js"
import {validateCountingSort} from "./impl/ValidateCountingSort.js"

// validate input dữ liệu
export async function validate(data) {
    // kiểm tra có chứa ký tự hoa ký tự thường không.
    let lines = data.trim().split(/\r?\n/);

    const validationResults = lines.map((line,index) => {
        const isAllNumeric = /^\d+$/.test(line.trim()); // kiểm tra có toàn số không
        const hasAlpha = /[a-zA-Z]/.test(line); // có chữ thường không 
        const hasSpecialChar = /[^a-zA-Z0-9\s]/.test(line); // có ký tự đặc biệt hay không.

        // Trả về một object đại diện cho trạng thái của dòng đó.
        return {
            lineNumber : index + 1,
            content : line,
            isNumeric : isAllNumeric,
            hasAlpha : hasAlpha,
            isValidSpecial : !hasSpecialChar,
        };
    });

    return validationResults;
};

export async function validateDetail(algorithm,data) {
    let validate;
    // triển khai tính đa hình 
    if(algorithm === AlgorithmId.BIG_SORTING) {
        validate = await validateBigSorting(data);
    }else if(algorithm === AlgorithmId.COUNTING_SORT) {
        validate = await validateCountingSort(data);
    }
    return validate;
}