$(document).on("mobileinit", function() {
    //var llave = true;
    
    $(document).bind("pageinit", function() {
        //Redirecciona a perfil
       $('#Muro2').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Muro.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
          $('#Perfil').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#contenidoo').load("Perfil.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
    
         $('#Pinturas').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Pinturas.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
       $('#Esculturas').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Esculturas.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
    
      $('#Digital').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Digital.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
     $('#Dibujos').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Dibujos.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
     $('#VerMas').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("VerMas.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
    $('#Mensajes').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Mensajes.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
    $('#Grupos').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("CargarGrupos.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
      $('#Fotografia').on('click', function () {
        $('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Fotografia.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
    });
    
    
        
 });
});