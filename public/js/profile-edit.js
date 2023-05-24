function showEdit() {
    var x = document.getElementById('profile-edit');
    x.classList.toggle("hide");
  }

function changeEdit() {
    var saveButton = document.getElementById('savebutton');
    var outButton = document.getElementById('outbutton')
    var x = document.getElementsByClassName('detail-desc2');
    var y = document.getElementsByClassName('detail-input');
    saveButton.classList.toggle("hidden");
    outButton.classList.toggle("hidden")
    for (i = 0; i < x.length; i ++ ){
        x[i].classList.toggle("hidden");
    }
    for (j = 0; j < y.length; j ++ ){
        y[j].classList.toggle("hidden")
    }
    var z = document.getElementById('edit-button');
    if (x[0].classList.value === "detail-desc2"){
        z.innerHTML = "Edit Profile"
    }
    else {
        z.innerHTML = "Cancel Edit"
    }
}
