$(document).ready(function () {
    var counter = 2;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="item_name' + counter + '" id="item_name' + counter + '" value=""/></td>';
        cols += '<td><input type="text" class="form-control" name="qty' + counter + '" id="qty' + counter + '" value=""/></td>';
        cols += '<td><input type="text" class="form-control" name="price' + counter + '" id="price' + counter + '" value="" oninput="getTotal(' + counter + ')"/></td>';

        cols += '<td><label id="total' + counter + '"></label></td>';
       
        /*cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';*/
        cols += '<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
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
