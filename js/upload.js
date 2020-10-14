let photo = document.querySelector("#photo");
let label = document.querySelector("label");
photo.addEventListener("change",(e) => {
    if(e.target.value == ""){
        label.textContent = "ADD COVER ART";
    }else if(e.target.value.length > 0){
        label.textContent = "SELECTED !";
    }
});