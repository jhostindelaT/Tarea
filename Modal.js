function AbrirModal() {
    $("#ModalEditar").modal("show");

    
}

function Alerta() {
    $("#alerta").Toast("show");
    $('.modal-body').load('hola', function () {
        $('#myModal').modal({ show: true });
    });
    
}

