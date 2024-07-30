<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Detail View</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
            <div class="form-group row">
              <div class="col-sm-10">
                <label for="supplier_name" class="col-form-label">Product Code</label>
                 <input type="text" class="form-control" name="product_code" id="product_code" autocomplete="off">
              </div>
              <div class="col-sm-2">
                <label class="col-form-label">&nbsp;</label><br>
                 <button type="button" class="btn btn-info" onclick="productdetailBarcode()">Search</button>
              </div>
            </div>
          <a class="btn btn-warning btn-sm pull-right" href="#" onclick="printDiv('printableArea')" >Print</a>
        </div>
        <div class="card-body table-responsive">
          <div id="printableArea" style="margin-left:2px;">
                <div id="product_data">
               
                </div>
            
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

