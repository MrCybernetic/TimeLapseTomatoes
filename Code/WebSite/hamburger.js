let toggled = false;

function toggle() {
    toggled = !toggled;
    if (toggled) {
        document.getElementById("nav_menu").style.transform = "translateX(0)";
        document.getElementById("nav_menu").style.position = "relative";
        document.getElementById("Hamburger").innerHTML = '<ion-icon name="close-outline" size="large"></ion-icon>'
    } else {
        document.getElementById("nav_menu").style.transform = "translate(-200%)";
        document.getElementById("nav_menu").style.position = "absolute";
        document.getElementById("Hamburger").innerHTML = '<ion-icon name="menu-outline" size="large"></ion-icon>'
    }
    
    console.log("click");
}