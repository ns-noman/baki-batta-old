<!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
        $success_msg = $this->session->userdata('success');
        $error_msg = $this->session->userdata('error');
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('error');
      ?>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Collection</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
       <form class="form-horizontal" action="<?php echo base_url();?>customer-invoice-payment-entry" method="post" enctype="multipart/form-data"  role="form" id="dueform">
      <div class="card">
        <div class="card-header">
          <h3 class="box-title"><?php echo $title; ?></h3>
          <div class="form-group row">
              
              <div class="col-sm-4">
                <label for="payment_date" class="col-form-label">Date<i class="text-danger">*</i></label>
                <input type="text" name="payment_date" id="payment_date" class="form-control datepicker" placeholder="yyyy-mm-dd" value="<?php echo date('Y-m-d') ?>" required="" autocomplete="off">
              </div>
              <div class="col-sm-4">
              <label for="payment_note" class="col-form-label">Note</label>
                <textarea class="form-control" name="payment_note" id="payment_note" placeholder="Note" rows="2"></textarea>
            </div>
              <label for="payment_date" class="col-sm-4 col-form-label">Customer Advance Balance: <?php echo number_format($balance, 2, '.', ',');?></label>
            </div>
        </div>
        <div class="card-body table-responsive">
          <?php echo $success_msg; ?>
          <?php echo $error_msg; ?>
         
          <div class="row">
             <?php if ($bill_info){ ?>
              <input type="hidden" class="form-control" name="customer_id" value="<?php echo $customer_info->customer_id ;?>">
              <table class="table table-bordered table-hover dtable" id="due_bill">
                <thead>
                <tr>
                  <th width="30">SL.</th>
                  <th>Date</th>
                  <th>Invoice#</th>
                 <th>Total Amount</th>
                  <th>Paid Amount</th>
                  <th>Due Amount</th>
                  <th>Payment Amount</th>
                  <th>Adjust from Advance</th>
                  <th>Balance Due</th>
                  <th>Payment Method</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $x = 1;
                  $bill_total = 0;
                  $paid_total = 0;
                  $due_total = 0;
                  foreach($bill_info as $info){ 
                    $discount = $info->sales_invoice_discount+$info->sales_total_discount;
                    $net_payable = $info->sales_total_amount-$discount-$info->sales_invoice_return_total+$info->sales_total_vat;
                    $net_paid = $info->sales_amount_paid+$info->sales_advance_payment-$info->sales_invoice_return_amount;
                    $due = $net_payable-$net_paid;
                    if($due > 0){
                      $bill_total += $net_payable;
                      $paid_total += $net_paid;
                      $due_total += $due;
                    ?>
                  <tr>
                    <td><?php echo $x++; ?>.</td>
                    <td><?php echo date('d/m/Y', strtotime($info->sales_invoice_date));?></td>
                    <td>
                      <?php echo $info->sales_invoice_no;?>
                      <input type="hidden" class="form-control" name="bill_id[]" value="<?php echo $info->sales_invoice_id ;?>">
                      
                    </td>
                      <td align="right">
                      <?php echo number_format($net_payable, 2, '.', ',');?>
                      <input type="hidden" class="form-control bill_cal" name="net_payable[]" step="0.01" value="<?php echo number_format($net_payable, 2, '.', ',');?>" min="0" readonly>
                    </td>
                    <td align="right">
                      <?php echo number_format($net_paid, 2, '.', ',');?>
                      <input type="hidden" class="form-control bill_cal" name="net_paid[]" step="0.01" value="<?php echo number_format($net_paid, 2, '.', ',');?>" min="0" readonly>
                    </td>
                    <td align="right">
                       <?php echo number_format($due, 2, '.', ',');?>
                      <input type="hidden" class="form-control bill_cal" name="due_amount[]" step="0.01" value="<?php echo number_format($due, 2, '.', ',');?>" min="0" readonly>
                    </td>
                    <td align="right">
                     <input type="number" class="form-control bill_cal" name="payment_amount[]" step="0.01" value="0" min="0" max="<?php echo $due;?>">
                    </td>
                    <td align="right">
                     <input type="number" class="form-control bill_cal" name="advance_amount[]" step="0.01" value="0" min="0" max="<?php echo $due;?>" <?php if ($balance <= 0) { echo "readonly";} ?> >
                    </td>
                    <td align="right">
                     <input type="number" class="form-control bill_cal" name="balance_due[]" step="0.01" value="<?php echo number_format($due, 2, '.', ',');?>" min="0" readonly>
                    </td>
                    <td>
                     <select class="form-control" name="payment_method[]"> 
                      <option value="Cash">Cash</option>
                      <option value="Bank">Bank</option>
                     </select>
                    </td>
                  </tr>
                  
                  <?php }} ?>
                  </tbody>
                <tfoot>
                <tr style="font-weight:bold; text-align:right;">
                  <td colspan="3">Total</td>
                  <td><?php echo number_format($bill_total, 2, '.', ',');?></td>
                  <td><?php echo number_format($paid_total, 2, '.', ',');?></td>
                  <td><?php echo number_format($due_total, 2, '.', ',');?></td>
                  <td><input type="number" class="form-control bill_cal" name="payment_total" id="payment_total" step="0.01" value="0" min="0" readonly></td>
                  <td><input type="number" class="form-control bill_cal" name="advance_total" id="advance_total" step="0.01" value="o" min="0" readonly></td>
                  <td><input type="number" class="form-control bill_cal" name="balance_total" id="balance_total" step="0.01" value="<?php echo number_format($due_total, 2, '.', ',');?>" min="0" readonly></td>
                  
                </tr>
                 <!-- <tr>
                  <td colspan="3" align="right">Previous Balance</td>
                  <td colspan="2" align="right"><?php echo number_format($balance, 2, '.', ',');?></td>
                  <td colspan="3" align="right">Payment from Balance</td>
                  <td><input type="number" class="form-control" name="balance_payment" id="balance_payment" step="0.01" value="0" min="0"></td>


                </tr> -->
                </tfoot>
              </table>
                <?php }else{ echo "No data  found!";} ?>
          </div>
        </div>
        <div class="card-footer">
         <center><button type="submit" class="btn btn-primary">Save</button></center>
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->

