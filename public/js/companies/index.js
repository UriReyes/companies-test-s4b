$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $("#toggleLogo").click(function (e) {
        e.preventDefault();
        $(".logo").toggle(50);
        if ($("#iconBtn").hasClass("fa-eye")) {
            $("#toggleLogo").attr("data-original-title", "Ocultar");
            $("#iconBtn").removeClass("fa-eye");
            $("#iconBtn").addClass("fa-eye-slash");
        } else {
            $("#toggleLogo").attr("data-original-title", "Mostrar");
            $("#iconBtn").removeClass("fa-eye-slash");
            $("#iconBtn").addClass("fa-eye");
        }
    });

    renderDataTable();
});

const renderDataTable = () => {
    $(document).ready(function () {
        $("#tblCompanies").DataTable({
            scrollX: true,
            language: {
                decimal: "",
                emptyTable: "No hay registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando 0 to 0 of 0 registros",
                infoFiltered: "(Filtrado de _MAX_ total registros)",
                infoPostFix: "",
                thousands: ",",
                lengthMenu: "Mostrar _MENU_ registros",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                search: "Buscar:",
                zeroRecords: "Sin resultados encontrados",
                paginate: {
                    first: "Primero",
                    last: "Ultimo",
                    next: ">",
                    previous: "<",
                },
            },
        });
    });
};

function Delete(url) {
    Swal.fire({
        title: "¿Esta seguro de borrar?",
        text: "¡Este contenido no se puede recuperar!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#169E6C",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, borrar!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: url,
                success: function (data) {
                    if (data.success) {
                        toastr.options = {
                            closeButton: true,
                            debug: false,
                            newestOnTop: false,
                            progressBar: true,
                            positionClass: "toast-top-right",
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: "1000",
                            hideDuration: "1000",
                            timeOut: "2000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };
                        //toastr.options.toastClass = 'toast-style';
                        toastr.success(
                            data.success,
                            "Eliminación de compañías, espere se está recargando la página"
                        );
                        //dataTable.ajax.reload();
                        setTimeout(() => {
                            location.reload();
                        }, 1900);
                    } else {
                        Swal.fire("Ha sucedido un error", data.error, "error");
                    }
                },
            });
        }
    });
}
