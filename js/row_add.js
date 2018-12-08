$(document).ready(function () {
    var counter = 2;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input required="required" type="text" class="form-control" name="item_name' + counter + '" id="item_name' + counter + '" value=""/></td>';
        cols += '<td><input required="required" type="text" class="form-control" name="qty' + counter + '" id="qty' + counter + '" value=""/></td>';
        cols += '<td><input required="required" type="text" class="form-control" name="price' + counter + '" id="price' + counter + '" value="" oninput="getTotal(' + counter + ')"/></td>';

        cols += '<td><label id="total' + counter + '"></label></td>';
       
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        /*cols += '<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>';*/
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });

    $("#addrow1").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input required="required" type="text" class="form-control" name="item_name_up' + counter + '" id="item_name_up' + counter + '" value=""/></td>';
        cols += '<td><input required="required" type="text" class="form-control" name="qty_up' + counter + '" id="qty_up' + counter + '" value=""/></td>';
        cols += '<td><input required="required" type="text" class="form-control" name="price_up' + counter + '" id="price_up' + counter + '" value="" oninput="getTotal(' + counter + ')"/></td>';

        cols += '<td><label id="total_up' + counter + '"></label></td>';
       
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        /*cols += '<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>';*/
        newRow.append(cols);
        $("table.order-list1").append(newRow);
        counter++;
    });





    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });

    $("table.order-list1").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
