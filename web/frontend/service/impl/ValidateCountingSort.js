export async function validateCountingSort(data) {
    const validates = data.map((line,index) => {
        if(line.isValidSpecial == false) {  // validate ký tự đặc biệt 
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Input chứa ký tự đặc biệt"
            }
        }else if(line.hasAlpha == true) {  // validate chữ cái
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Input chứa chữ cái"
            }
        }else if(data.length >= 2) {  // validate số lượng dòng
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Dữ liệu chỉ gồm một mảng!"
            }
        }else if(line.hasNegative === true) {
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Thuật toán CountingSort không được có số âm!"
            }
        }else {
            return {
                "index"  : index,
                "isValid" : true,
                "data" : line.content,
            } 
        }
    })
    return validates;
}