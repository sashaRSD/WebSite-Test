function ProverkaKolSim(form){
    let NameLength=document.getElementById('username').value.length;    
    let PassLength=document.getElementById('pass').value.length;
    let submitbutton=document.getElementById('submit');
    if (NameLength<3 || PassLength<5){
        submitbutton.disabled = true;
        return false;
    }
    else {
        submitbutton.disabled = false;
        return true;
    }
}