//Side bar
function openSubSide(id){
    //Mudando icone de open para opened 
    let    icons = document.getElementsByClassName(`open`)
    let submenus = document.getElementsByClassName(`sub-side-nav`)

    for(let i=0; i<icons.length; i++){
        icons[i].style.transform='rotate(0deg)'
    }
    for(let i=0; i<icons.length; i++){
        submenus[i].style.height='0px'
    }

    let  icon = document.getElementById(`openIcon_${id}`);
         icon.style.transform='rotate(90deg)';
    let submenu = document.getElementById(`subSide_${id}`);
        submenu.style.height='auto'
}
