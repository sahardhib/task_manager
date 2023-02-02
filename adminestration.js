var selectedRow = null;
//show alert
function showAlert(message,className){
    const div = document.createElement("div");
    div.className = `alert alert-${className}`;

    div.appendChild(document.createTextNode(message));
    const container = document.querySelector(" .container");
    const main = document.querySelector(" .main");
    container.insertBefore(div,main);
    setTimeout(() =>document.querySelector(".alert").remove(), 3000);

}
  function clearField(){
    document.querySelector("#name").value ="" ;
    document.querySelector("#id").value ="" ;
    document.querySelector("#email").value ="" ;
    document.querySelector("#password").value ="" ;
   
  }
  document.querySelector("#student-form").addEventListener("submit", (e) =>{
    e.preventDefault();

    const name = document.querySelector("#name").value;
    const id = document.querySelector("#id").value;
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;
   


    if(name== "" || id == "" || email == "" || password == "") {
        showAlert("please fill in all fields" , "danger");
    }
    else {
        if(selectedRow == null){
            const list = document.querySelector("#companies-list");
            const row = document.createElement("tr");

            row.innerHTML = `
              <td>${name}</td>
              <td>${id}</td>
              <td>${email}</td>
              <td>${password}</td>
              
              <td>
              <a href="#" class="btn btn-warning btn-sm edit"> edit</a>
              <a href="#" class="btn btn-danger delete">delete</a>
                        
            `;
            list.appendChild(row);
            selectedRow = null;
            showAlert("admin add","success");
        }
        else {
            selectedRow.children[0].textContent = name;
            selectedRow.children[1].textContent = id;
            selectedRow.children[2].textContent = password;
            selectedRow.children[3].textContent = email;
            selectedRow = null;
            showAlert("companie info edited","info");
        }
        clearField();
    }
  });

    document.querySelector("#companies-list").addEventListener("click", (e) =>{
        target = e.target;
        if (target.classList.contains("edit")){
            selectedRow= target.parentElement.parentElement;
            document.querySelector("#name").value = selectedRow.children[0].textContent;
            document.querySelector("#id").value = selectedRow.children[1].textContent;
            document.querySelector("#password").value = selectedRow.children[2].textContent;
            document.querySelector("#email").value = selectedRow.children[3].textContent;
        }
    });










document.querySelector("#companies-list").addEventListener("click", (e) =>{
    target = e.target;
    if(target.classList.contains("delete")){
        target.parentElement.parentElement.remove();
        showAlert("admin data delete","danger")
    }
});


