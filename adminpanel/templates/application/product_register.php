<?php 
if(isset($aProductCategories)) : ?>
    <div id="page-inner">
        <h3 class="page-header">
            <i class="fa fa-pencil-square"></i>
            Product Application Form
        </h3>
        <?php if (isset($flash['errors']) && $flash['errors']) : ?>
            <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
        <?php endif; ?>
        <?php if (isset($flash['success']) && $flash['success']) : ?>
            <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
        <?php endif; ?>
        <form class="form-horizontal" role="form" method="post" id="application-form" action="<?php echo HTTP_SERVER . 'application/submit' ?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    PRODUCT INFORMATION 
                </div>
                <div class="panel-body">
                    <div class="form-block">
                            <div class="checktext">
                                1. PRODUCT CATEGORY THAT BEST IDENTIFIES YOUR BUSINESS.
                            </div>
                            <div class="checkboxes">
                                <div class="checkboxdiv">
                                    <label class="input-control radio">
                                        <input type="radio" <?php if((isset($aVal['product_category_id']) && $aVal['product_category_id']) || (isset($aVal['category']) && $aVal['category'])): ?>checked="checked"<?php endif; ?> name="category" value="1" class="category-select pull-left" />
                                        <div class="col-xs-11">
                                            <?php echo CHtml::dropDownList('category_id[]', ((isset($aVal['product_category_id']) && $aVal['product_category_id'])?explode(',', $aVal['product_category_id']):''), $aProductCategories, array('multiple'=>'','class' => 'form-control chzn-select','prompt' => '','required'=>'required')); ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </label>
                                    </br>
                                    <label class="input-control radio">
                                        <input type="radio" name="category" class="category-select pull-left" <?php if((isset($aVal['product_category_id']) && !$aVal['product_category_id']) || (isset($aVal['category']) && !$aVal['category'])): ?>checked="checked"<?php endif; ?> value="0" />
                                        <div class="col-xs-11">
                                            <span class="caption" id="other">OTHER</span>
                                            <input type="text" class="<?php if(($iApplication != null && $aVal['product_category_id'] != 0) || ($iApplication == null || (isset($aVal['category']) && $aVal['category'] != 0))): ?>hide<?php endif; ?> input3" id="category_name" name="product_category" required="required" value="<?php echo ((isset($aVal['product_category']) && $aVal['product_category'])?$aVal['product_category']:''); ?>" />
                                        </div>
                                        <div class="clearfix"></div>
                                    </label>
                                </div>
                            </div>
                            <div class="checktext">2. INDICATE WHAT TYPE OF PRODUCT YOU NEED TO BARCODE
                            </div>
                                <div class="checktext">
                                    <?php echo CHtml::dropDownList('company_type_id[]',((isset($aVal['company_type_id']) && $aVal['company_type_id'])?(is_array($aVal['company_type_id'])?$aVal['company_type_id']:explode(',', $aVal['company_type_id'])):''),$aProductTypes, array('multiple'=>'','class' => 'form-control chzn-select','prompt' => '', 'required'=>'required')); ?>
                                    <input type="hidden" id="company_type" name="company_type" value="<?php echo ((isset($aVal['company_type']) && $aVal['company_type'])?$aVal['company_type']:'') ?>" />
                                </div>   
                            <div class="clearfix"></div>
                            <!-- <div class="checktext">3. PLEASE INDICATE BELOW THE NUMBER OF GLOBAL TRADE ITEM NUMBERS(GTIN'S) YOU REQUIRE
                            </div> -->
                            <!-- <div class="checkboxes2">
                            <?php /*foreach ($aPackages as $package): ?>
                                <div class="checkboxdiv2">
                                    <label class="input-control radio small-check">
                                        <input type="radio" name="package">
                                        <span class="caption"><?php echo $package['name'] ?></span>
                                    </label><br>
                                </div>
                            <?php endforeach*/ ?>
                            </div> -->
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                     FEES STRUCTURE
                </div>
                <div class="panel-body">
    <!--                 <div class="checktext">Any Individual/Firm/Company applying for the GTIN-13/GI N or GTIN-8 barcode numbers will be required to pay following Entrance and Annual Fees along with the GS1 Pakistan Standard Application Form duly completed. These fees are exclusive of prevailing taxes.</div>
     -->                <div class="clearfix"></div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     ANNUAL FEE
                                </div>
                                <div class="panel-body">
                                    <div class="panel-heading bold">4- ANNUAL FEE SCHEDULE FOR GTIN-13S and GTIN-8S</div>
                                    <div class="form-block">
                                            <div class="gtn13s">
                                            <?php foreach ($aPackages as $i=>$package): $is8S = false; ?>
                                                <div class="row13s">
                                                    <div class="col1">
                                                        <label class="input-control radio small-check">
                                                            <input type="radio" name="package_id" data-amount="<?php echo $package['amount'] ?>" data-type="<?php echo $package['type_id']; ?>" required="required" class="annual_fee2" value="<?php echo $package['id'] ?>" <?php if((isset($aVal['package_id']) && $aVal['package_id'] == $package['id'])): ?>checked="checked"<?php endif; ?>>
                                                            <?php if(strpos($package['name'], '8') !== false) : $is8S = true; ?>
                                                                <input type="number" step="1" min="1" class="small-input" name="package_qty" id="inputnumb" value="<?php echo ((isset($aVal['package_qty']) && $aVal['package_qty'])?$aVal['package_qty']:'') ?>" />
                                                            <?php endif ?>
                                                            <span class="caption"><?php echo $package['name'] ?></span>
                                                        </label><br>
                                                    </div>
                                                    <div class="col2">
                                                            RS. <span class="annual_amount" <?php echo $is8S ? 'id=calc' : '' ?> ><?php echo number_format($package['amount']) ?></span>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <input type="hidden" id="entrance_id" name="entrance_package_id" value="<?php echo ((isset($aVal['entrance_package_id']) && $aVal['entrance_package_id'])?$aVal['entrance_package_id']:'0') ?>" />
                                            <input type="hidden" id="annual_amount" name="package_amount" value="<?php echo ((isset($aVal['package_amount']) && $aVal['package_amount'])?$aVal['package_amount']:'0') ?>" />
                                            <input type="hidden" id="entrance_amount" name="entrance_package_amount" value="<?php echo ((isset($aVal['entrance_package_amount']) && $aVal['entrance_package_amount'])?$aVal['entrance_package_amount']:'0') ?>" />
                                            <input type="hidden" id="package_name" name="package" value="<?php echo ((isset($aVal['package']) && $aVal['package'])?$aVal['package']:'') ?>" />
                                            <input type="hidden" name="gcp_type" value="" />
                                            <?php if($iApplication): ?>
                                                <input type="hidden" name="application_id" value="<?php echo $iApplication ?>" />
                                            <?php endif; ?>
                                            </div>
                                            <!-- <div class="notify">(ANNUAL FEE ARE DUE FROM ONE CALENDER YEAR OF THE ALLOCATION MONTH)</div> -->
                                           <!--  <div id="annualtext">
                                                As of from the <span class="bold">second year</span>, companies are requested to pay the annual renewal fee. For example, if you request 300 GTIN-13s, you will need to pay Rs. 40,000(Entrance + Annual Fees) for the first year and Rs.10,000 in subsequent years.
                                            </div> -->
                                                <div class="gtn13s">
                                                    
                                                </div>
                                            <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    ENTRANCE FEE
                                </div>
                                <div class="panel-body">
                                    <div class="panel-heading bold">5- ENTRANCE FEE SCHEDULE FOR GTIN-13s / GLN</div>
                                    <div class="gtn13">
                                        <div class="row13">
                                            <div class="col1">
                                                <label id="entrance_label">ABOVE 10 GTIN-13s
                                                </label><br>
                                            </div>
                                            <div class="col2">
                                                RS. <span id="entrance"><?php echo number_format((isset($aVal['entrance_package_amount']) && $aVal['entrance_package_amount'] ? 
                                                $aVal['entrance_package_amount'] : 0),0) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div id="memtext">
                                        (Members availing 50% rate for Entrance Fee will be required to pay the balance amount of Rs. 15,000/= when applying for Additional Numbers)
                                    </div> -->
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <?php if($iApplication == null): ?>
                                    <?php /* <a href="<?php echo HTTP_SERVER ?>application/new" class="pull-left btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a> */ ?>
                                    <button type="button" class="pull-left btn btn-default" onclick="window.history.back();"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                                <?php endif; ?>
                                <button type="submit" name="submit" class="pull-right btn btn-primary" value="submit"><i class="glyphicon glyphicon-share"></i> Submit </button>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </form>
    </div>
<?php endif; ?>