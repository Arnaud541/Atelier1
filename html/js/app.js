const private = document.getElementById("private");
const public = document.getElementById("public");
const btn = document.querySelector(".submit");
const form = document.querySelector("form");

function enableButton() {
  if (public.checked) {
    if (document.querySelector(".users")) {
      document.querySelector(".users").remove();
    }
  }

  if (private.checked) {
    let node = document.createElement("input");
    node.type = "text";
    node.placeholder = "Ajouter des utilisateurs...";
    node.name = "users";
    node.classList.add("users");

    form.insertBefore(node, btn);
  }
}

private.addEventListener("click", enableButton);
public.addEventListener("click", enableButton);
