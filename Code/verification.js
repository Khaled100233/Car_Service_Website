let verifyCarYear = () => {
    let inputS = document.getElementById('carY').value;
    if(inputS == ""){
        document.getElementById('carY').classList.remove('is-valid');
        document.getElementById('carY').classList.remove('is-invalid');
        console.log("what");
        return;
    }
    let input = Number(inputS);
    if(!Number.isInteger(input) || inputS.length < 4 || inputS.length > 4 || input > new Date().getFullYear()){
        if(!document.getElementById('carY').classList.contains('is-invalid')){
            if(document.getElementById('carY').classList.contains('is-valid')){
                document.getElementById('carY').classList.remove('is-valid');
            }
            document.getElementById('carY').classList.add('is-invalid');
        }
        return;
    }
    if(document.getElementById('carY').classList.contains('is-invalid')){
        document.getElementById('carY').classList.remove('is-invalid');
    }
    document.getElementById('carY').classList.add('is-valid');
}

let adminVerifyAddPrice = () => {
    var input = document.getElementById('inputPrice').value;
    if(input == ""){
        document.getElementById('inputPrice').classList.remove('is-valid');
        document.getElementById('inputPrice').classList.remove('is-invalid');
        return;
    }
    input = Number(input);
    if(!Number.isInteger(input) || input < 0){
        if(!document.getElementById('inputPrice').classList.contains('is-invalid')){
            if(document.getElementById('inputPrice').classList.contains('is-valid')){
                document.getElementById('inputPrice').classList.remove('is-valid');
            }
            document.getElementById('inputPrice').classList.add('is-invalid');
            document.getElementById("buybtn").setAttribute("disabled","true");
        }
        return;
    }
    if(document.getElementById('inputPrice').classList.contains('is-invalid')){
        document.getElementById('inputPrice').classList.remove('is-invalid');
    }
    document.getElementById('inputPrice').classList.add('is-valid');
    document.getElementById("buybtn").removeAttribute("disabled");

}