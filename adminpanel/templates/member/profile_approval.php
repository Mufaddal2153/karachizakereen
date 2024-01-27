<form id="approve-profile" class="form-horizontal" method="post" action="">
    <div id="page-inner">
        <h3 class="page-header">
            <i class="fa fa-file-text"></i>
            Member Profile
            <button type="submit" name="approval_id" value="<?php echo $oNewCompany['id'] ?>" class="btn btn-success pull-right"><i class="glyphicon glyphicon-check"></i> Approve</a>
        </h3>
        <?php if (isset($flash['errors']) && $flash['errors']) : ?>
            <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
        <?php endif; ?>
        <div class="panel-group" id="prev-accordion" role="tablist">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data=parent="prev-accordion" href="#previous-info">
                            <i class="fa fa-plus"></i>
                            PREVIOUS MEMBER INFORMATION
                        </a>
                    </h4> 
                </div>
                <div id="previous-info" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        <div class="middle-container">  
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        COMPANY INFORMATION
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Company Name:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'name'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">Email:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'email'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Street Address:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 0,'street_address'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">Country:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static">PAKISTAN</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">City:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php $city_id = getAddressField($aAddresses, 0,'city_id'); echo (isset($aCities[$city_id])?$aCities[$city_id]:''); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">Postal Code:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 0,'postal_code'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Telephone:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 0,'telephone'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">Fax:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 0,'fax'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Trading Zones:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'trading_zones'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">COUNTRIES IN WHICH YOU HAVE SUBSDIARIES:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'countries'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Tax No:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'tax_number'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">Employees No:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'employee_no'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Company Resgistration No:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'registration_number'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label font">Website:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getModelField($oCompany,'website'); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Different Billing Address</h4>
                                        <hr />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="street_address">STREET ADDRESS:*</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 1,'street_address'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="city2">CITY :*</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php $city_id = getAddressField($aAddresses, 1,'city_id'); echo (isset($aCities[$city_id])?$aCities[$city_id]:''); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label" for="postal_code">POSTAL CODE :</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 1,'postal_code'); ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="telephone">TELEPHONE :*<br />(including country and city code)</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 1,'telephone'); ?></label>
                                        </div>
                                        <label class="col-sm-2 control-label" for="fax">FAX :</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static"><?php echo getAddressField($aAddresses, 1,'fax'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($aContactTypes as $aType): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <?php echo strtoupper($aType['name']); ?>
                                        </h4> 
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label font">Name:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-static"><?php echo getAddressField($aContacts, $aType['id'],'title') . ' ' .getAddressField($aContacts, $aType['id'],'first_name') . ' ' .getAddressField($aContacts, $aType['id'],'last_name'); ?></label>
                                            </div>
                                            <label class="col-sm-2 control-label font">Email Address:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-static"><?php echo getAddressField($aContacts, $aType['id'],'email'); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label font">Telephone</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-static"><?php echo getAddressField($aContacts, $aType['id'],'telephone'); ?></label>
                                            </div>
                                            <label class="col-sm-2 control-label font">Fax:</label>
                                            <div class="col-sm-4">
                                                <label class="form-control-static"><?php echo getAddressField($aContacts, $aType['id'],'fax'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div> 
                    </div> 
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">
                        UPDATED MEMBER INFORMATION
                    </h2> 
                </div>
                <div class="panel-body">
                    <div class="middle-container">  
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    COMPANY INFOMRATION
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label font">Company Name:</label>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="name" required="" aria-required="true" value="<?php echo getModelField($oNewCompany,'name'); ?>">
                                    </div>
                                    <label class="col-sm-2 control-label font">Email:</label>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="email" required="" aria-required="true" value="<?php echo getModelField($oNewCompany,'email');?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-2 control-label font">Street Address:</label>
                                        <div class="col-sm-4">
                                             <input type="text" class="form-control" name="address[0][street_address]" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 0,'street_address'); ?>">
                                        </div>
                                        <label class="col-sm-2 control-label font">Country:</label>
                                        <div class="col-sm-4">
                                            <label class="form-control-static">Pakistan</label>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label font">City:</label>
                                    <div class="col-sm-4">
                                        <?php echo CHtml::dropDownList('address[0][city_id]',getAddressField($aNewAddresses, 0,'city_id'),$aCities, array('data-rel'=>'0','class' => 'form-control city-select','prompt' => 'Select Option','required' => '')); ?>
                                    </div>
                                    <label class="col-sm-2 control-label font">Postal Code:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="address[0][postal_code]" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 0,'postal_code'); ?>">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label font">Telephone:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="address[0][telephone]" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 0,'telephone'); ?>">
                                    </div>
                                    <label class="col-sm-2 control-label font">Fax:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="address[0][fax]" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 0,'fax'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="trading_zones">TRADING ZONES:* <br />(Africa, Europe, Asia) </label>
                                    <div class="col-sm-4">
                                        <?php echo CHtml::dropDownList('trading_zones[]', getModelField($oNewCompany,'trading_zones', true), $aContinents, array('multiple'=>'', 'class' => 'form-control chzn-select','data-placeholder' => 'Select Options')); ?>
                                     </div>
                                    <label class="col-sm-2 control-label" for="countries">COUNTRIES IN WHICH YOU HAVE SUBSDIARIES</label>
                                    <div class="col-sm-4">
                                        <?php echo CHtml::dropDownList('subsidiary_countries[]', getModelField($oNewCompany,'countries', true), $aCountries, array('multiple'=>'', 'class' => 'form-control chzn-select', 'data-placeholder' => 'Select Options')); ?>
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label font">Tax No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="tax_number" required="" aria-required="true" value="<?php echo getModelField($oNewCompany,'tax_number'); ?>">
                                    </div>
                                    <label class="col-sm-2 control-label font">Employees No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee_no" required="" aria-required="true" value="<?php echo getModelField($oNewCompany,'employee_no'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label font">Company Resgistration No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="registration_number" required="" aria-required="true" value="<?php echo getModelField($oNewCompany,'registration_number'); ?>">
                                    </div>
                                    <label class="col-sm-2 control-label font">Website:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="website" required="" aria-required="true" value="<?php echo getModelField($oNewCompany,'website'); ?>">
                                        <input type="hidden" name="id" value="<?php echo $oNewCompany['company_id']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="col-sm-5 input-control radio small-check">
                                        <input type="radio" name="address_type" class="address_type" value="0" checked="checked" />
                                        <span class="caption">Same As Company Address</span>
                                    </label>
                                    <label class="col-sm-5 input-control radio small-check" style="margin-left: 35px;">
                                        <input type="radio" name="address_type" class="address_type" value="1" />
                                        <span class="caption">Different Address (Please Insert Below Full Billing Address)</span>
                                    </label>
                                </div>
                                <div id="secondary_address" class="hide">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="street_address">STREET ADDRESS:*</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="address[1][street_address]" id="street_address2" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 1,'street_address'); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="city2">CITY :*</label>
                                        <div class="col-sm-4">
                                            <?php echo CHtml::dropDownList('address[1][city_id]',getAddressField($aNewAddresses, 1,'city_id'),$aCities, array('data-rel'=>'1','class' => 'form-control city-select','prompt' => '')); ?>
                                        </div>
                                        <label class="col-sm-2 control-label" for="postal_code">POSTAL CODE :</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control ignore" name="address[1][postal_code]" id="postal_code2" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 1,'postal_code'); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="telephone">TELEPHONE :*<br />(including country and city code)</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="address[1][telephone]" id="telephone2" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 1,'telephone'); ?>" />
                                        </div>
                                        <label class="col-sm-2 control-label" for="fax">FAX :</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control ignore" name="address[1][fax]" id="fax2" required="" aria-required="true" value="<?php echo getAddressField($aNewAddresses, 1,'fax'); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach($aContactTypes as $aType): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <?php echo strtoupper($aType['name']); ?>
                                        <?php if($isMainContact != $aType['id']): ?>
                                            <button type="button" data-id="<?php echo $aType['id'] ?>" class="btn btn-success pull-right contact-toggle"><i class="glyphicon glyphicon-plus"></i></button> 
                                        <?php endif; ?>
                                    </h4> 
                                </div>
                                <div id="contact-block-<?php echo $aType['id'] ?>" class="panel-body <?php if($isMainContact != $aType['id']): ?>keycontact hide<?php endif; ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Title:</label>
                                        <div class="col-sm-1">
                                            <?php echo CHtml::dropDownList('contact['.$aType['id'].'][title]',getAddressField($aNewContacts, $aType['id'],'title'),$aTitles, array('class' => 'form-control')); ?>
                                        </div>
                                        <label class="col-sm-1 control-label font">First Name:</label>
                                        <div class="col-sm-3">
                                             <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][first_name]" required="" aria-required="true" value="<?php echo getAddressField($aNewContacts, $aType['id'],'first_name'); ?>">
                                        </div>
                                        <label class="col-sm-1 control-label font">Last Name:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][last_name]" required="" aria-required="true" value="<?php echo getAddressField($aNewContacts, $aType['id'],'last_name'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Email Address:</label>
                                        <div class="col-sm-4">
                                             <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][email]" required="" aria-required="true" value="<?php echo getAddressField($aNewContacts, $aType['id'],'email'); ?>">
                                        </div>
                                        <label class="col-sm-2 control-label font">Telephone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][telephone]" required="" aria-required="true" value="<?php echo getAddressField($aNewContacts, $aType['id'],'telephone'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label font">Fax:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][fax]" required="" aria-required="true" value="<?php echo getAddressField($aNewContacts, $aType['id'],'fax'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</form>                        