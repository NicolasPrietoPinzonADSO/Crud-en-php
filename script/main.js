const form = document.getElementById('form')
const btnEnviar =document.getElementById('enviar');
const Deletras =[document.getElementById('nombre'),document.getElementById('apellido')]
const nombre = document.getElementById('nombre')
const apellido = document.getElementById('apellido') 
const correo = document.getElementById('email') 
const cedula = document.getElementById('cedula')

const soloNumeros = (e) => {
    //consoLe.log(e)
    // validamos que eL keyCode corresponda a Las tecLas de Los numeros 
    if ((e.keyCode < 48 || e.keyCode > 57) && e.keyCode) {
        e. preventDefault()
     }  
 }
 const validarCorreo = correo => {
    // Validamos que eL campo tenga soLo un y un punto
    // eL @ no puede ser eL primer caracter deL correo
    // y eL punto debe it posicionando aL menos un cardcter despuds de La @ 
    return /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo)
    
 }
const soloLetras = (e) => {
    //consoLe.log(e)
    const key = e.keyCode || e.which;
    const tecla = String.fromCharCode(key).toLowerCase(); 
    const letras = "áéíóúabcdefghijklmnnopqrstuvwxyz"; 
    const especiales = ['8', '32', '37', '39', '46'];
    let tecla_especial = false

    for (const i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        e.preventDefault()
    }
}
const enviarFormulario = form => {
    form.submit()
}
    const validacion = (e) => {        
        e.preventDefault();

        if (nombre.value == '' || nombre.value == null) {
            alert('ingrese un nombre')
            nombre.focus()
            return false;
        }
        if (apellido.value == '' || apellido.value == null) {
            alert('ingrese un apellido')
            apellido.focus()
            return false;
        }
        if (!validarCorreo(correo.value)) {
            alert("Por favor, escribe un correo electronico valido"); 
            correo. focus();
            return false;
        }
        if (cc.value < 8 || cc == "") {
            alert("Por favor, escribe un documento valido"); 
            correo. focus();
            return false;
        }

        enviarFormulario(form);
    };    
cedula.addEventListener('keypress',soloNumeros)        ;
Deletras.forEach((item)=> item.addEventListener('keypress',soloLetras))
btnEnviar.addEventListener('click',validacion)