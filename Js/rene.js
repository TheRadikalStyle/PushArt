$(document).on("mobileinit", function() {
    //var llave = true;
    $(document).bind("pageinit", function() {
        alert("Entre");
        $("#crear_archivo").on("click", function () {
             var html='<div class="modal fade" id="newproyect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
                 '<div class="modal-dialog">'+
                 '<div class="modal-content">'+
                 '<div class="modal-header">'+
                 '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>'+
                 '<h3 class="modal-title" id="myModalLabel">Crear proyecto</h3>'+
                 '</div>'+
                 '<div class="modal-body">'+
                 '<form class="form-horizontal" role="form">'+
                 '<div class="form-group form-group-lg">'+
                 '<label class="col-sm-2 control-label" for="formGroupInputLarge"><h5>Nombre: </h5></label>'+
                 '<div class="col-sm-10">'+
                 '<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Nombre del proyecto">'+
                 '</div>'+
                 '</div>'+
                 '</form>'+
                 '</div>'+
                 '<div class="modal-footer">'+
                 '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>'+
                 '<button type="button" class="btn btn-primary">Crear</button>'+
                 '</div>'+
                 '</div>'+
                 '</div>'+
                 '</div>';
                 $("#popup").html(html);
                $("#popup").popup("open");
        });
    });
});
