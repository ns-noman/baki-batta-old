<!-- Content Header (Page header) -->
<section class="content-header">
  <?php
  $success_msg = $this->session->userdata('success');
  $error_msg = $this->session->userdata('error');
  $this->session->unset_userdata('success');
  $this->session->unset_userdata('error');
  ?>
  
</section>
<?php
$privilege = $this->inventory_model->get_user_privilege($this->session->userdata('user_id'));
$privilege_set = array_column($privilege, 'menu_name');
?>
<?php  if($this->session->userdata('user_type') == "Client" or in_array('Dashboard', $privilege_set)){ ?>
<!-- Main content -->
<section class="content">
  <?php echo $success_msg; ?>
  <?php echo $error_msg; ?>
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo number_format($sales_total, 2, '.', ',');
          ;?></h3>
          <p>Today's Total Sales</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo base_url().'daily-sales-report'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?php echo number_format($purchase_total, 2, '.', ',');
          ;?></h3>
          <p>Today's Total Purchase</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo base_url().'daily-purchase-report'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo number_format($sales_collection, 2, '.', ',');
          ;?></h3>
          <p>Today's Sales Collection (Cash Sales + Due Invoice Receive)</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo base_url().'sales-ledger'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?php echo number_format($purchase_payment, 2, '.', ',');
          ;?></h3>
          <p>Today's Payment to Supplier/Vendor (Cash Purchase + Due Invoice Payment)</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo base_url().'purchase-ledger'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?php echo number_format($sales_due, 2, '.', ',');
          ;?></h3>
          <p>Today's Sales (Invoice) Due</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo base_url().'daily-sales-report'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo number_format($purchase_due, 2, '.', ',');
          ;?></h3>
          <p>Today's Purchase Due</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo base_url().'daily-purchase-report'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo number_format($total_expense, 2, '.', ',');
          ;?></h3>
          <p>Today's Total Expense</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo base_url().'expense-ledger'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?php echo count($low_stock);
          ;?></h3>
          <p>Low Stock Products</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo base_url().'low-stock-report'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <table class="table table-striped table-valign-middle">
            <thead>
              <tr class="bg-primary">
                <td align="center"><b>Today's Receive Information</b></td>
                <td align="center">Cash</td>
                <td align="center">Bank</td>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sales+Old Due Collection</td>
                <td align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Purchase return Amount</td>
                <td  align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Investment</td>
                <td align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Other Income</td>
                <td  align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Customer Advance</td>
                <td  align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
            </tbody>
            <tfoot>
            <tr style="border-bottom: 1px solid #000;">
              <td align="right"><b>Total</b></td>
              <td align="right"><b>0</b></td>
              <td align="right"><b>0</b></td>
            </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-striped table-valign-middle">
            <thead>
              <tr class="bg-info">
                <td align="center"><b>Today's Payment Information</b></td>
                <td align="center">Cash</td>
                <td align="center">Bank</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Purchase+Old Due Payment</td>
                <td align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Purchase return Amount</td>
                <td  align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Withdraw</td>
                <td align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Expense</td>
                <td  align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
              <tr>
                <td>Supplier Advance</td>
                <td  align="right">
                  0
                </td>
                <td align="right">
                  0
                </td>
              </tr>
            </tbody>
            <tfoot>
            <tr style="border-bottom: 1px solid #000;">
              <td align="right"><b>Total</b></td>
              <td align="right"><b>0</b></td>
              <td align="right"><b>0</b></td>
            </tr>
            </tfoot>
          </table>
        </div>
        
        
      </div>
    </div>
    
    
  </div>
  <div class="row">
    <div class="col-lg-8">
      <table class="table table-striped table-valign-middle">
        <thead>
          <tr class="bg-success">
            <td align="center"><b>Today's Cash flow overview</b></td>
            <td align="center">Cash</td>
            <td align="center">Bank</td>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="right"><b>Opening Balance</b></td>
            <td align="right">
              0
            </td>
            <td align="right">
              0
            </td>
          </tr>
          
          <tr>
            <td>Total Receive</td>
            <td align="right">
              0
            </td>
            <td align="right">
              0
            </td>
            
          </tr>
          
          <tr>
            <td>Total Payment</td>
            <td  align="right">
              0
            </td>
            <td  align="right">
              0
            </td>
          </tr>
          <tr>
            <td align="right"><b>Closing Balance</b></td>
            <td align="right"><b>0</b></td>
            <td align="right"><b>0</b></td>
          </tr>
        </tbody>
        <tfoot>
        <tr style="border-bottom: 1px solid #000;">
          <td align="right"><b>Total (Cash+Bank)</b></td>
          <td align="right" colspan="2"><b>0</b></td>
        </tr>
        </tfoot>
      </table>

      <table class="table table-striped table-valign-middle">
        <thead>
          <tr class="bg-orange">
            <td align="center" colspan="2"><b>Business overview</b></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
             Total Receivable Amount (Customer Due + Supplier Advance) 
            </td>
            <td align="right">
              0
            </td>
          </tr>
          
          <tr>
            <td>Total Payable Amount (Supplier Due + Direct Invest + Customer Advance)</td>
            <td align="right">
              0
            </td>
          </tr>
          
          <tr>
            <td>Total Stock Value</td>
            <td  align="right">
              0
            </td>
          </tr>
        </tbody>
        <tfoot>
        <tr style="border-bottom: 1px solid #000;">
          <td align="right"><b>Business Status {(Total Stock Value + Total Receivable) – Total Payable} </b></td>
          <td align="right"><b>0</b></td>
        </tr>
        </tfoot>
      </table>

      <div class="card card-success">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Weekly Sales & Purchase</h3>
            
          </div>
        </div>
        <div class="card-body chart-responsive">
          <div class="chart">
            <canvas id="reftchart" style="min-height: 300px; height: 300px; max-height: 700px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="card card-danger">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Expense of <?php echo date('M Y'); ?></h3>
          </div>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills flex-column">
            <?php if ($expense_head_info) {
            $first_day =  date('Y-m-1');
            $last_day =  date('Y-m-t');
            foreach ($expense_head_info as $expense) {
            $expamount = $this->inventory_model->get_monthly_expense($first_day, $last_day, $expense->expense_head_id);
            ?>
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link">
                <?php echo $expense->expense_head_name; ?>
                <span class="float-right text-success">
                <?php echo number_format($expamount->expense_transaction_amount, 2, '.', ','); ?></span>
              </a>
            </li>
            <?php }} ?>
          </ul>
        </div>
      </div>

      <div class="card card-info">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Last 6 Month Sales</h3>
          </div>
        </div>
        <div class="card-body chart-responsive">
          <div class="chart">
            <canvas id="doughnutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-warning">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Weekly Collection & Payment</h3>
            
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="collectionchart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>
<?php } ?>
<!-- /.content -->