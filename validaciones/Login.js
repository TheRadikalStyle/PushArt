
/*Primer evento al entrar en la pagina*/
$(document).on("mobileinit", function() {
    var llave = true;
    $(document).bind("pageinit", function() {
        // process the form
        if (llave === true) {
            $('#frm_login').submit(function(event) {
                event.preventDefault();

                $('.form-group').removeClass('has-error'); // remove the error class
                $('.help-block').remove(); // remove the error text

                //var formData = new window.FormData($('#frm_login')[0]);

                var formData = {
                    'password': $('input[name=password_txt]').val(),
                    'correo': $('input[name=usuario_txt]').val()
                };

                // process the form
                $.ajax({
                    type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    dataType: 'json', // what type of data do we expect back from the server
                    url: 'validaciones/LoginVal.php', // the url where we want to POST
                    data: formData,
                    encode: true,
                    beforeSend: function() {

                        $("#popup_content").html("<div align='center'>Verificando Datos...</div><div><img class='loading_circle' src='Imagen/loading.gif'/></div>");
                        $("#popup_button").click();

                    },
                    success: function(data) {

                        // log data to the console so we can see
                        console.log(data);

                        // here we will handle errors and validation messages
                        if (!data.success) {

                            // handle errors for name ---------------
                            if (data.errors.password) {
                                $("#popup_content").html("<div>Se te olvido la contraseña :(</div>");
                                $("#popup_button").click();

                                $('#pass').addClass('has-error'); // add the error class to show red input
                                $('#pass').append('<div class="help-block">' + data.errors.password + '</div>'); // add the actual error message under our input

                            }

                            // handle errors for email ---------------
                            if (data.errors.correo) {
                                $("#popup_content").html("<div>Oye ¿y el Usuario?</div>");
                                $("#popup_button").click();

                                $('#usa').addClass('has-error'); // add the error class to show red input
                                $('#usa').append('<div class="help-block">' + data.errors.correo + '</div>'); // add the actual error message under our input

                            }

                            if (data.errors.UsuarioFail) {
                                 $("#popup_content").html("<div>el Usuario?</div>");
                                $("#popup_button").click();
                            }

                        } else {
                            // ALL GOOD! just show the success message!
                            location.href = "Home.html";
                            // usually after form submission, you'll want to redirect
                            // window.location = '/thank-you'; // redirect a user to another page
                        }

                    },
                    error: function() {
                        $("#popup_content").html("<div>Ocurrio un problema al intentar logearte, intentalo de nuevo mas tarde o revisa tu conexion a internet</div>");
                        $("#popup_button").click();
                    }

                });

            });
            llave = false;
        }
    });



});



