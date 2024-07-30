<!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Information </h1>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Main content -->
        <section class="content">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
              <div class="product_image">
              <img alt="..." onerror="this.src='<?php echo base_url();?>assets/dist/img/qr.png'" src="<?php echo base_url().$product_info->product_image;?>" height="500" width="450" />
              </div>
            </div>
            <div class="col-md-8 col-sm-6 col-12">
              <div class="card-header with-border">
                <h3 class="card-title"><b><?php echo $product_info->product_name;?></b></h3>
                <h4 class="card-title float-right">MRP <?php echo number_format((float)$product_info->product_unit_mrp, 2, '.', '')." &#x9f3;"; ?> 
              </h4>
              </div>
              <br/>
             
              <h4>Description</h4>
              <p><b>Category:</b> <?php echo $product_info->product_category_name; ?></p>
              <p><b>Barcode:</b> <?php echo $product_info->product_code; ?></p>
              <p><b>SKU:</b> <?php echo $product_info->product_sn; ?></p>
              <p><b>Manufacturer/Brand:</b> <?php echo $product_info->man_name; ?></p>
              <p><b>Model:</b> <?php echo $product_info->product_model; ?></p>
              <p><b>Unit Purchase Price:</b> <?php echo number_format((float)$product_info->product_unit_price, 2, '.', '')." &#x9f3;"; ?></p>
              <p><b>Unit Sales Price:</b> <?php echo number_format((float)$product_info->product_unit_mrp, 2, '.', '')." &#x9f3;"; ?></p>
              <!-- <p><b>Special Unit MRP:</b> <?php echo number_format((float)$product_info->product_unit_special_mrp, 2, '.', '')." &#x9f3;"; ?></p> -->
              <p><b>VAT:</b> <?php echo number_format((float)$product_info->product_vat_per, 2, '.', '')." %"; ?></p>
              <p><b>Discount:</b> <?php echo number_format((float)$product_info->product_discount_per, 2, '.', '')." %"; ?></p>
              <p><b>Product In Stock:</b> <?php echo $product_info->product_stock; ?> <?php echo $product_info->unit_name; ?></p>
              <p><b>Details:</b></p>
              <p><?php echo $product_info->product_description; ?></p>
            </div>
          </div>
            
            <div class="col-sm-8">
              
            </div>
          </div>
      </div>
    </section>
    <!-- /.content -->

