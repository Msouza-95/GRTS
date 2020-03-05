$("#listagem").click(function () {
    $("#table_id_div").show();
    $("#add_id").hide();
    $("#update_id").hide();
    $("#alter_id").hide();
});

$("#adicionar").click(function () {
    $("#table_id_div").hide();
    $("#add_id").show();
    $("#update_id").hide();
    $("#alter_id").hide();
});

$("#update").click(function () {
    $("#table_id_div").hide();
    $("#add_id").hide();
    $("#update_id").show();
    $("#alter_id").hide();
});

$("#alter_id_2").click(function () {
    $("#table_id_div").hide();
    $("#add_id").hide();
    $("#update_id").hide();
    $("#alter_id").show();
});