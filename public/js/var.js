notificacion = function (mensaje,tipo = 'info',dlay = true){
    // Available types 'warning', 'info', 'success', 'error'
    Lobibox.notify(tipo, {
        size: 'mini',
        icon: false,
        delayIndicator: dlay,
        msg: mensaje,
        sound: false
    });
};

/**
 * Función que usa la api Messagebox
 * @param msg STRING: texto que aparece en el cuadro
 * @param done FUNCTION: función que ejecuta si respuesta es afirmativa
 * @param fail FUNCTION: función que ejecuta si respuesta es negativa
 */
messagebox = function(msg, done, fail = null) {
  $.MessageBox({
		buttonDone  : "Si",
		buttonFail  : "No",
		message   : msg
  }).done(done)
    .fail((fail === null ? function() {} : fail));
}

validar = function(t, marca = true, visible = true) {
    let flag = 1;
    $(t).find('*[required]').each(function(){
        if($(this).is(":visible")) {
            if($(this).is(":invalid") || $(this).val() == "") {
                flag = 0;
            }
        }
    });
    return flag;
};

// php artisan config:clear
// php artisan cache:clear
// php artisan migrate:fresh
// php artisan tinker
// php artisan r:l
// php artisan make:migration create_xx_table --create=xxs
// php artisan make:model Xx
// php artisan migrate
