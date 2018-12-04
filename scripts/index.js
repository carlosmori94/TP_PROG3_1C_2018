var path = '/comanda/backend';
var idMesa;
$( document ).ready(function() {
    $('.background').css('display', 'none');
    $('.private-portal').css('display', 'flex');
});

function logIn() {
    const email = $('.input-email').val();
    const password = $('.input-password').val();
    
    if(email != '' && password != ''){
        $.ajax({
            url: path + '/usuarios/login',
            data : {
                email : email,
                password: password
            },
            dataType: 'json',
            type: 'POST',
            success: function(res){
                if(res){
                    localStorage.setItem('user', JSON.stringify(res));
                    $('.background').css('display', 'none');
                    $('.private-portal').css('display', 'flex');
                }else{
                    alert("No existen dicha combinacion de credenciales");
                }
            },
            error: function(err){
                alert("Error en login, intente nuevamente mas tarde")
            }
        })
    }
    else{
        alert("Ingrese credenciales")
    }
}

function hacerPedido(idMesa){
    $("#form-pedido").css('display' , '');
    idMesa = idMesa;
}
function esconderForm(e){
    e.preventDefault();
    $("#form-pedido").css('display' , 'none');
}
function altaPedido(e){
    e.preventDefault();
    $.ajax({
        url: path + '/encuesta/alta',
        data : {
            idMesa : idMesa,
        },
        dataType: 'json',
        type: 'POST',
        success: function(res){
            debugger;
        },
        error: function(err){
            alert("error");
        }
    })
}