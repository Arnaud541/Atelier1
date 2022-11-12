const private = document.getElementById("private");
console.log(private);
const public = document.getElementById("public");
const btn = document.querySelector(".submit");
const parentNode = document.querySelector(".mode");

function enableButton() {
  if (public.checked) {
    if (document.getElementsByClassName("users")) {
      document.getElementsByClassName("users").remove();
    }
  }

  if (private.checked) {
    alert("test");
    let node = document.createElement("input");
    node.type = "text";
    node.placeholder = "Ajouter des utilisateurs...";
    node.name = "users";
    node.classList.add("users");

    parentNode.insertBefore(node, btn);
  }
}

private.addEventListener("click", enableButton);
public.addEventListener("click", enableButton);
