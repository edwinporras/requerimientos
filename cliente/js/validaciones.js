$(document).ready(function () {

    const formulario = document.getElementById('formulario');
    const inputs = document.querySelectorAll('#formulario input, textarea');

    const expresiones = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        servicios: /^.{4,50}$/, // 4 a 50 digitos.
        descripcion: /^.{1,1000}$/, // 1 a 1000 digitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,14}$/ // 7 a 14 numeros.
    }
    
    const campos = {
        usuario: false,
        nombre: false,
        servicios: false,
        correo: false,
        telefono: false,
        descripcion: false
    }
    
    const validarFormulario = (e) => {
        switch (e.target.name) {

            case "nombre":
                validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
            
            case "correo":
                validarCampo(expresiones.correo, e.target, 'correo');
            break;
            case "telefono":
                validarCampo(expresiones.telefono, e.target, 'telefono');
            break;
            // case "descripcion":
            //     validarCampo(expresiones.descripcion, e.target, 'descripcion'); 
            // break;
            // case "nombre_servicio":
            //     validarCampo(expresiones.servicios, e.target, 'nombre_servicio'); 
            // break;
            default:
                break;
        }
    }

    const validarCampo = (expresion, input, campo) => {
        if(expresion.test(input.value)){
            document.getElementById(`group_${campo}`).classList.remove('formulario__group-incorrecto');
            document.getElementById(`group_${campo}`).classList.add('formulario__group-correcto');
            document.querySelector(`#group_${campo} i`).classList.add('fa-check-circle');
            document.querySelector(`#group_${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#group_${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
        } else {
            document.getElementById(`group_${campo}`).classList.add('formulario__group-incorrecto');
            document.getElementById(`group_${campo}`).classList.remove('formulario__group-correcto');
            document.querySelector(`#group_${campo} i`).classList.add('fa-times-circle');
            document.querySelector(`#group_${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#group_${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo] = false;
        }
    }

    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    $('#registrarNuevo').click(function(event){
        event.preventDefault();
        if (($('#nombre').val()=="")&&($('#correo').val()=="")&&($('#telefono').val()=="")) {
            swal({
                title: "Por favor complete los campos",
                text: "Ningun campo debe estar vacio",
                icon: "error",
                button: "Ok",
              });
        }else if ($('#nombre').val()=="") {
              swal({
                title: "Por favor complete los campos",
                text: "Debes agregar el Nombre",
                icon: "warning",
                button: "Ok",
              });
            //alertify.alert("Debes agregar el nombre");
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
            return false;
        }else if ($('#correo').val()=="") {
            swal({
                title: "Por favor complete los campos",
                text: "Debes agregar el Correo",
                icon: "warning",
                button: "Ok",
              });
            //alertify.alert("Debes agregar el correo");
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
            return false;
        }else if ($('#telefono').val()=="") {
            swal({
                title: "Por favor complete los campos",
                text: "Debes agregar el Telefono",
                icon: "warning",
                button: "Ok",
              });
            //alertify.alert("Debes agregar el telefono");
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
            return false;
        }
        // else if ($('#descripcion').val()=="") {
        //     swal({
        //         title: "Por favor complete los campos",
        //         text: "Debes agregar la Descripcion",
        //         icon: "warning",
        //         button: "Ok",
        //       });
        //     //alertify.alert("Debes agregar el descripcion");
        //     document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        //     return false;
        // }
        // else if ($('#nombre_servicio').val()=="") {
        //     swal({
        //         title: "Por favor complete los campos",
        //         text: "Debes seleccionar alguno de los servicios",
        //         icon: "warning",
        //         button: "Ok",
        //       });
        //     //alertify.alert("Seleccione alguno de los servicios");
        //     document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        //     return false;
        // }
        // else if ($('#terminos').val()=="") {
        //     alertify.alert("Debes agregar el terminos");
        //     return false;
        // }  
        cadena = "nombre=" + $('#nombre').val() +
                "&correo=" + $('#correo').val() +
                "&telefono=" + $('#telefono').val(); 
                // +
                // "&descripcion=" + $('#descripcion').val() +
                // "&nombre_servicio=" + $('#nombre_servicio').val();
        const terminos = document.getElementById('terminos');
        if(campos.nombre && campos.correo && campos.telefono && terminos.checked ){
        $.ajax({
            type:"POST",
            url:"php/conexion.php",
            data:cadena,
            success:function (r) {
                if (r) {
                    $('#formulario')[0].reset();
                    alertify.success("Agregado con exito!!!");
                        document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');

                       
                
                        document.querySelectorAll('.formulario__group-correcto').forEach((icono) => {
                            icono.classList.remove('formulario__group-correcto');
                        });
                }else{
                    alertify.error("Fallo al agregar!!!");
                    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
                }
            },
            error:function(rs){
                if (rs) {
                    alertify.error("Fallo al agregar 1");
                }else{
                    alertify.error("Fallo al agregar 2");
                }
            }
        });
    }else{
        alertify.warning("Tienes que aceptar los terminos y condiciones"); 
    }
    });
});