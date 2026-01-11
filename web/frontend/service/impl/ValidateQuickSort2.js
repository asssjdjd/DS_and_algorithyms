
// không cần phải vaidate thêm cho function này
export async function validateQuickSort2(data) {
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