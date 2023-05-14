function toggleMenu() {
  var menu = document.getElementById("profile-menu");
  menu.classList.toggle("hidden");
}

function signOut() {
  var form = document.createElement("form");
  form.method = "POST";
  form.name = "logout";
  form.action = "auth.php";

  var logoutInput = document.createElement("input");
  logoutInput.type = "hidden";
  logoutInput.name = "logout";
  logoutInput.value = "true";

  form.appendChild(logoutInput);
  document.body.appendChild(form);
  form.submit();
}
