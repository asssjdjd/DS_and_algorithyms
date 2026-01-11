export async function validateThePowerSum(data) {
    
    
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
        }else if(index == 1 && line.numberCount != 1){  // dòng thứ 2 chỉ có 1 số thôi
            return {
                "index" : index,
                "isValid" : false,
                "message" : "Dòng thứ 2 chỉ được có một số!"
            }
        }else if(index == 0) {
            const declaredSize = parseInt(data[0].content);
            if(declaredSize > 1000 || declaredSize < 1) {
                return {
                    "index" : index,
                    "isValid" : false,
                    "message" : "Thuật toán chỉ cho phép giá trị 1 <= X <= 1000 (dòng 1)"
                }
            }
            return {
                    "index" : index,
                    "isValid" : true,
                    "data" : line.content,
            }
        }else if(index == 1) {
            const declaredSize = parseInt(data[1].content);
            if(declaredSize > 10 || declaredSize < 2) {
                return {
                    "index" : index,
                    "isValid" : false,
                    "message" : "Thuật toán chỉ cho phép giá trị 2 <= N <= 10 (dòng 2)"
                }
            }
            return {
                    "index" : index,
                    "isValid" : true,
                    "data" : line.content,
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

