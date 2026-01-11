export async function validateSearchMissingNumber(data) {
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
        }else if(data.length != 2) {  // validate số lượng dòng
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Dữ liệu phải gồm 2 dòng!"
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

