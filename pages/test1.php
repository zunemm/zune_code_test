<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="row_add.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>Name</td>
            <td>Gmail</td>
            <td>Phone</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="name" class="form-control" />
            </td>
            <td class="col-sm-4">
                <input type="mail" name="mail"  class="form-control"/>
            </td>
            <td class="col-sm-3">
                <input type="text" name="phone"  class="form-control"/>
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>