<!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
        $success_msg = $this->session->userdata('success');
        $error_msg = $this->session->userdata('error');
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('error');
      ?>

      <style type="text/css">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 2px;
    }
</style>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Sales Return Detail Invoice#: <?php echo $sales_info->sales_invoice_no; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $success_msg; ?>
          <?php echo $error_msg; ?>
      <div class="card">
        <div class="card-header">
          
          
        <a class="btn btn-info btn-xs" href="javascript:void(0)" onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</a>
        <!-- <a class="btn btn-success btn-xs" href="<?php echo base_url() . "print-sales-challan/". $sales_info->sales_invoice_id; ?>">
            <i class="fa fa-print"></i> Challan
        </a> -->
        </div>
        <div class="card-body table-responsive" id="printableArea">
          
          <div class="row">
                        <div class="col-md-12">
                          
                            <center>
                            <table width="70%" cellpadding="10">
                                <tr>
                                    <td align="right"> 
                                        <?php if ($client_info->header_image) { ?>
                                            <img src="<?php echo base_url().$client_info->header_image; ?>" height="100">
                                        <?php }else{ ?>
                                            <h3><?php echo $client_info->client_name; ?></h3>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h3><?php echo $client_info->client_name; ?></h3>
                                        <p style="font-size:16px;"><?php echo $client_info->client_address; ?> <br>Contact: <?php echo $client_info->client_mobile; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <h4>Sales Return Invoice</h4>
                                    </td>
                                </tr>
                            </table>
                            </center>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-4 col-sm-4">
                                    <label class="form-label">Invoice# : <?php echo $sales_info->sales_invoice_no; ?></label><br>
                                
                            </div>

                            <div class="col-4 col-sm-4">
                                    <label class="form-label">customer : <?php echo $sales_info->customer_name; ?> <br>
                                        Contact : <?php echo $sales_info->customer_mobile; ?><br>
                                        Address : <?php echo $sales_info->customer_address; ?></label>
                            </div>

                            <div class="col-4 col-sm-4">
                                    <label class="form-label">sales Date: <?php echo date("d/m/Y", strtotime($sales_info->sales_invoice_date)); ?></label><br>
                                    <label class="form-label">Return Date: <?php echo date("d/m/Y", strtotime($sales_info->sales_return_date)); ?></label><br>
                                   <label class="form-label">Payment Info: <?php echo $sales_info->sales_return_payment_type; ?> Payment. <?php echo $sales_info->sales_return_payment_info; ?></label>
                            </div>

                        </div>
                <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th width="500">Detail</th>
                            <th>Return Qty</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php if ($sales_item){ 
                    $x = 1;
                    foreach($sales_item as $item){
                        ?>
                        <tr>
                            <td><?php echo $x++; ?>.</td>
                            <td><?php echo $item->product_name; ?></td>
                            <td align="center"><?php echo $item->sales_return_quantity." ".$item->unit_name;?></td>
                            <td align="right"><?php echo number_format((float)$item->sales_return_rate, 2, '.', '');?></td>
                            <td align="right"><?php echo number_format((float)$item->sales_return_amount, 2, '.', '');?></td>
                        </tr>
                    <?php }}else{ echo "No data  found!";} ?>
                    
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2">
                                <center><label style="text-align:center;" for="details" class="col-form-label">sales Details</label></center>
                               <?php echo $sales_info->sales_invoice_detail;
                               if ($sales_info->sales_payment_info) {
                                         echo "<br>Payment Type: ".$sales_info->sales_payment_type."<br>Payment Info: ".$sales_info->sales_payment_info;
                                     }

                                ?>
                            </td>
                            <td colspan="2" align="right">Total Amount :</td>
                            <td align="right">
                                 <?php echo number_format((float)$sales_info->sales_return_total, 2, '.', ''); ?>
                            </td>
                        </tr>
                  
                        <tr>
                            <td colspan="2" align="right">Paid Amount :</td>
                            <td align="right">
                                 <?php  echo  number_format((float)$sales_info->sales_return_amount, 2, '.', ''); ?>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="5">
                                <b>In Word: <?php echo $in_word; ?> Only.</b>
                            </td>
                        </tr>
                       
                    </tfoot>
                </table>
            </div>
                 <p> <span class="pull-left">Entry By <?php echo $sales_info->user_name; ?></span> | 
                    <span class="pull-right">Entry Date-Time <?php echo date('d-m-Y h:i A',  strtotime($sales_info->sales_return_created_at)); ?></span>
                </p>
                <p> <span class="pull-left">Print By <?php echo $this->session->userdata('user_name'); ?></span>
                    <span class="pull-right">Print Date <?php echo date('d-m-Y'); ?></span>
                </p>
        </div>
      </div>
    </section>
    <!-- /.content -->

