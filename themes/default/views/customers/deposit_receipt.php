<style type="text/css">
    @media print {
    	.modal-dialog {
    		width: 98% !important;
    		height: 842px !important;
    		margin: 0 auto !important;
    		padding: 0 !important;
    	}
        #myModal .payment {
            display: none !important;
        }
        .modal-content{
        	border: none !important;
        }

        .modal-body {
        	height: 515px !important;
        	padding: 0 !important;
        	line-height: 95% !important;
        }
        .table tr td {
        	height: 5px !important;
        }
    }
</style>
<div class="modal-dialog modal-lg no-modal-header">
    <div class="modal-content">
    
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
			<button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('print'); ?>
            </button>
            <?php
		        if ($Settings->system_management == 'project') { ?>
		            <!-- <div class="text-center" style="margin-bottom:20px;">
		                <img src="<?= base_url() . 'assets/uploads/logos/' . $Settings->logo2; ?>"
		                     alt="<?= $Settings->site_name; ?>">
		            </div> -->
		    <?php } else { ?>
		            <?php if ($logo) { ?>
		                <!-- <div class="text-center" style="margin-bottom:20px;">
		                    <img src="<?= base_url() . 'assets/uploads/logos/' . $biller->logo; ?>"
		                         alt="<?= $biller->company != '-' ? $biller->company : $biller->name; ?>">
		                </div> -->
		            <?php } ?>
		    <?php } ?>
		    <?php for($i=0; $i<=1; $i++){?>
            <div class="clearfix"></div>
            <div class="row padding10">
                <div class="col-xs-12 text-center">
                	<div class="col-xs-3">
		                <div class="text-center" style="margin-bottom:20px;">
		                    <img src="<?= base_url() . 'assets/uploads/logos/' . $biller->logo; ?>"
		                         alt="<?= $biller->company != '-' ? $biller->company : $biller->name; ?>">
		                </div>
                	</div>
                	<div class="col-xs-6">
						<p style="font-size:20px;"><?php echo $biller->company;?></p>
	                    <?php if($biller->address){
	                    echo'<b>' . lang("address") . ": ". "</b>".$biller->address."</br>";}
	                    if($biller->phone){
	                    echo '<b>' . lang("tel") . ": " . "</b>" .$biller->phone."</br>";}
	                    if($biller->email){
	                    echo '<b>' . lang("email") . ": " ."</b>". $biller->email."</br>";}
	                    ?>
                    	<div class="clearfix"></div>
                    	</br>
                    	<p style="padding:0px; font-size:20px;">RECEIPT VOUCHER</p>
					</div>
					<div class="col-xs-3"></div>
                </div>
            </div>

            <div class="row" style="width: 90%; margin-left: 3%;">
                <div class="col-sm-5 col-xs-5" style="float:left;">
                	<b><p>Received From</p></b>
                	<p>Name: <?= $customer->company;?></p>
                    <p><?= lang("address"); ?>: <?= $customer->address;?></p>
					<p><?= lang("phone"); ?>: <?= $customer->phone; ?></p>
					
                </div>
				<div class="col-sm-5 col-xs-5 text-left" style="float:right;">
					<div class="pull-right">
					<b><p>Reference</p></b>
						<p><?= lang("receipt"); ?>: <?= $deposit->reference; ?></p>
					<p><?= lang("date"); ?>: <?= $this->erp->hrsd($deposit->date); ?></p>
					
					</div>
                </div>
            </div>
            <div class="well">
				<table class="table receipt table-responsive">
					<thead>
						<tr>
							<th><?= lang("no"); ?></th>
							<th><?= lang("date"); ?></th>
							<th><?= lang("reference"); ?></th>
							<th style="padding-left:10px;padding-right:10px;"><?= lang("amount"); ?> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$m_us = 0;
							echo '<tr class="item"><td class="text-center">#' . $no . "</td>";
							echo '<td class="text-center">' . $deposit->date. '</td>';
							echo '<td class="text-center">' . $deposit->reference. '</td>';						
							echo '<td class="text-center">' . ($this->erp->formatMoney($deposit->amount)) . '</td>';
							$no++;
						?>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td></td>
							<th class="text-center"><?= lang("total"); ?></th>
							<th class="text-center"><?=  $this->erp->formatMoney($deposit->amount); ?></th>
						</tr>
						
						<tr colspan="5">
							<table class="table table-striped" style="margin: 0; padding: 0">
							
								<tbody>
									<tr>
										<td style="width:150px;"><strong><?= lang("paid_by"); ?>:</strong></td>
										<td>
											<?php
														echo $deposit->paid_by;
													
												?>
										</td>
									</tr>
									<tr>
										<td>
											<strong><?= lang("note"); ?>:</strong>
										</td>
										<td><strong><?php echo $deposit->note; ?></strong></td>
									</tr>
								</tbody>
							
							</table>
						</tr>
					</tfoot>
				</table>
            </div>
			<p>Amount In Word: <?=$this->erp->convert_number_to_words($deposit->amount)?> US Dollar Only</p>
			
            <div style="clear: both;"></div>
            <div class="row">
				<div class="col-sm-4 col-xs-4 pull-left">
                    <p>&nbsp;</p>

                    <p style="border-bottom: 1px solid #666;">&nbsp;</p>

                    <p><?= lang("Customer`s_Signature"); ?></p>
                </div>
				<div class="col-sm-4 col-xs-4 pull-left">
                </div>
                <div class="col-sm-4 col-xs-4 pull-right">
                    <p>&nbsp;</p>

                    <p style="border-bottom: 1px solid #666;">&nbsp;</p>

                    <p><?= lang("Customer`s_Signature"); ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
        <?php }?>
        </div>
        
    </div>
</div>