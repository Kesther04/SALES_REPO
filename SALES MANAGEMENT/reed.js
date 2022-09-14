

function login(){
    var pass = document.getElementById('p-p-p');
    pass.setAttribute('type','text');
    document.getElementById('aaa').style.display="none";
    document.getElementById('bbb').style.display="block";
}


function lob(){
    var pass = document.getElementById('p-p-p');
    pass.setAttribute('type','password');
    document.getElementById('aaa').style.display="block";
    document.getElementById('bbb').style.display="none";
}

function record(){
    document.getElementById('p-a-t').style.display="block";
}