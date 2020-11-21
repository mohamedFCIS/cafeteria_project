



function choseTea() {
    document.getElementById("Tea").style.display = 'block';
}
function chosemilk() {
    document.getElementById("Milk").style.display = 'block';
}
function chosecofe() {
    document.getElementById("Cofe").style.display = 'block';
}
function chose7elba() {
    document.getElementById("Helba").style.display = 'block';
}

document.getElementById("teaNum").addEventListener("click", function () {
    let tea_Num = parseInt(document.getElementById("teaNum").value)
    document.getElementById("teaPrice").innerHTML = tea_Num * 5;
});
document.getElementById("milkNum").addEventListener("click", function () {
    let milk_Num = parseInt(document.getElementById("milkNum").value)
    document.getElementById("milkPrice").innerHTML = milk_Num * 10;
});
document.getElementById("cofeNum").addEventListener("click", function () {
    let cofe_Num = parseInt(document.getElementById("cofeNum").value)
    document.getElementById("cofePrice").innerHTML = cofe_Num * 8;
});
document.getElementById("helbaNum").addEventListener("click", function () {
    let helb_Num = parseInt(document.getElementById("helbaNum").value)
    document.getElementById("helbaPrice").innerHTML = helb_Num * 6;
});