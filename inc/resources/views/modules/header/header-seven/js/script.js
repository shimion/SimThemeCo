function showhide() {
    var div = document.getElementById("collapsibleNavbar");
    if (div.style.display !== "block") {
        div.style.display = "block";
        div.className = "navbar-collapse collapse in";
    }
    else {
        div.style.display = "none";
        div.className = "navbar-collapse collapse";
    }
}