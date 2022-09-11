function total() {
    var forms = document.getElementById('prx-form');
    forms.elements['ta'].value=forms.elements['sp'].value*forms.elements['qpb'].value;  
   
}

function bold() {
    var forms = document.getElementById('prx-form');
    forms.elements['bal'].value=forms.elements['ap'].value-forms.elements['ta'].value;   
}

function discount() {
    var forms = document.getElementById('product-form');
    forms.elements['dp'].value=(forms.elements['mp'].value)-(forms.elements['mp'].value*(forms.elements['pdis'].value/100));
}
