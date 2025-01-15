$(document).ready(function () {
    const ruta = "sistemas_sm/public/admin/";

    ///////////////////////////////////////// Función para agregar y eliminar secciones
    $("#section_hrp").append($("#section_hrp1").html());
    $(".addsection").on("click", function () {
        $("#section_hrp").append($("#section_hrp1").html());
    });

    
    ///////////////////////////////////////// Función para cargar las clases y centros de costo
    calcularSumaHorasExtras();
    calcularSumaRecargos();
    calcularSumaPermisos();
    calcularSumaTotal();
    // Cargar clases
    $("#select_depart").on("change", function () {
        var id_depart = $("#select_depart").val();
        if (id_depart) {
            console.log(ruta + "horas_extras/clase/" + id_depart);
            $.ajax({
                url: "clase/" + id_depart,
                type: "GET",
                success: function (data) {
                    $("#select_clase").html(data);
                },
            });
        } else {
            alert("Debe seleccionar un departamento");
        }
    });
    // Cargar centros de costo
    $(document).on("change", "#select_clase", function () {
        var id_clase = $(this).val();
        if (id_clase) {
            $.ajax({
                url: "ccosto/" + id_clase,
                type: "GET",
                success: function (data) {
                    console.log(data);
                    $("#select_ccosto").html(data);
                },
            });
        } else {
            alert("Debe seleccionar una clase");
        }
    });

    ///////////////////////////////////////// Función para calcular la suma de horas extras
    function calcularSumaHorasExtras() {
        var ex_diur_ord = parseFloat($("#ex_diur_ord").val()) || 0;
        var ex_noct_ord = parseFloat($("#ex_noct_ord").val()) || 0;
        var ex_diur_festdomin = parseFloat($("#ex_diur_festdomin").val()) || 0;
        var ex_noct_festdomin = parseFloat($("#ex_noct_festdomin").val()) || 0;

        var suma =
            ex_diur_ord + ex_noct_ord + ex_diur_festdomin + ex_noct_festdomin;
        $("#suma_horasextras").val(suma);
        calcularSumaTotal();
    }
    // Ver cambios en los inputs de horas extras
    $(".suma_horasExtras").on("input", function () {
        calcularSumaHorasExtras();
    });

    /////////////////////////////////////////// Función para calcular la suma de recargos
    function calcularSumaRecargos() {
        var recargo_noct = parseFloat($("#recargo_noct").val()) || 0;
        var recargo_diur_fest = parseFloat($("#recargo_diur_fest").val()) || 0;
        var recargo_noct_fest = parseFloat($("#recargo_noct_fest").val()) || 0;
        var recargo_ord_fest_noct =
            parseFloat($("#recargo_ord_fest_noct").val()) || 0;

        var suma =
            recargo_noct +
            recargo_diur_fest +
            recargo_noct_fest +
            recargo_ord_fest_noct;
        $("#suma_recargos").val(suma);
        calcularSumaTotal();
    }
    // Ver cambios en los inputs de recargos
    $(".suma_recargos").on("input", function () {
        calcularSumaRecargos();
    });

    /////////////////////////////////////////// Función para calcular la suma de permisos
    function calcularSumaPermisos() {
        const suma_permisos = parseFloat($("#permisos").val()) || 0;
        $("#suma_permisos").val(suma_permisos);
        calcularSumaTotal();
    }
    // Ver cambios en los inputs de permisos
    $(".suma_permisos").on("input", function () {
        calcularSumaPermisos();
    });

    /////////////////////////////////////////// Función para calcular la suma total
    function calcularSumaTotal() {
        const suma_horasextras = parseFloat($("#suma_horasextras").val()) || 0;
        const suma_recargos = parseFloat($("#suma_recargos").val()) || 0;
        const suma_permisos = parseFloat($("#suma_permisos").val()) || 0;

        const suma = suma_horasextras + suma_recargos - suma_permisos;
        console.log(suma);
        $("#suma_total").val(suma);
    }
    // Escuchar cambios en los inputs de sumas
});
