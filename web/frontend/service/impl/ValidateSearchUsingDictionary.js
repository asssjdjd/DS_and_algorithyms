export async function validateSearchUsingDictionary(data) {
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
        }else if(line.numberCount != 1 && index == 0) { // dòng đầu chỉ có 1 số thôi
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Dòng đầu chỉ được có một số!"
            }
        }else if(index == 1){ // kiểm tra kích thước có phù hợp không
            const declaredSize = parseInt(data[0].content);
            const actualSize = line.numberCount;

            if (declaredSize !== actualSize) {
                return {
                    "index": index,
                    "isValid": false,
                    "message": `Kích thước mảng khác với khai báo (Khai báo: ${declaredSize}, Thực tế: ${actualSize})`
                }
            }

            // Nếu khớp thì trả về hợp lệ
            return {
                "index": index,
                "isValid": true,
                "data": line.content,
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

