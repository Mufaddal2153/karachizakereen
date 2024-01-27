<div id="page-inner">
    <h3 class="page-header">
        <i class="fa fa-pencil-square"></i>
        <?php echo $sHeading ?>
    </h3>
    <?php if (isset($flash['errors']) && $flash['errors']) : ?>
        <div class="alert alert-danger fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['errors']; ?></div>
    <?php endif; ?>
    <?php if (isset($flash['success']) && $flash['success']) : ?>
        <div class="alert alert-success fade in"><a class='close' data-dismiss='alert'>x</a><?php echo $flash['success']; ?></div>
    <?php endif; ?>
    <form class="form-horizontal" role="form" method="post" id="company_form" action="">
        <div class="panel panel-default">
            <div class="panel-heading">
                COMPANY INFORMATION 
            </div>
            <div class="panel-body">
                <div class="form-block">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="company_name">COMPANY NAME:*</label>
                        <div class="col-sm-4">
                            <?php if(isset($aCompanies) || !isset($isEdit)) : ?>
                                <div id="select_company">
                                    <?php echo CHtml::dropDownList('company_id','',$aCompanies, array('class' => 'select_company form-control chzn-select company_name required','required'=>'required','prompt' => 'Select Option')); ?>
                                </div>
                                <input type="text" name="company" class="form-control company_name new_company hide ignore" required="" aria-required="true" />
                            <?php else: ?>
                                <input type="text" name="company" class="form-control company_name new_company" required="" aria-required="true" value="<?php echo getModelField($oCompany,'name'); ?>" />
                                <?php if(isset($isEdit)): ?>
                                    <input type="hidden" name="address[0][id]" value="<?php echo getAddressField($aAddress, 0,'id'); ?>" />
                                    <input type="hidden" name="address[1][id]" value="<?php echo getAddressField($aAddress, 1,'id'); ?>" />
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" id="isNew" value="0" />
                        <?php if(isset($aCompanies) || !isset($isEdit)) : ?>
                            <div class="col-sm-4">
                                <button type="button" id="add_company" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> ADD </button>
                            </div> 
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="street_address">STREET ADDRESS:*</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="address[0][street_address]" id="address1" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 0,'street_address'); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="country">COUNTRY :*</label>
                        <div class="col-sm-4">
                            <div class="form-control-static" for="country">PAKISTAN</div>
                        </div>
                        <label class="col-sm-2 control-label" for="city1">CITY :*</label>
                        <div class="col-sm-4">
                            <?php echo CHtml::dropDownList('address[0][city]',getAddressField($aAddress, 0,'city_id'),$aCities, array('data-rel'=>'0','class' => 'form-control city-select','prompt' => 'Select Option','required' => '')); ?>
                            <input type="hidden" name="address[0][city_name]" id="city_name_0" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">EMAIL :</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" id="email" required="" aria-required="true" value="<?php echo getModelField($oCompany,'email'); ?>" />
                        </div>
                        <label class="col-sm-2 control-label" for="postal_code">POSTAL CODE :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control ignore" name="address[0][postal_code]" id="postal_code1" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 0,'postal_code'); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="telephone">TELEPHONE :*<br />(including country and city code)</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="address[0][telephone]" id="telephone1" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 0,'telephone'); ?>" />
                        </div>
                        <label class="col-sm-2 control-label" for="fax">FAX :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control ignore" name="address[0][fax]" id="fax1" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 0,'fax'); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="trading_zones">TRADING ZONES:* <br />(Africa, Europe, Asia) </label>
                        <div class="col-sm-4">
                            <?php echo CHtml::dropDownList('trading_zones[]', getModelField($oCompany,'trading_zones', true), $aContinents, array('multiple'=>'', 'class' => 'form-control chzn-select','data-placeholder' => 'Select Options','required' => true)); ?>
                         </div>
                        <label class="col-sm-2 control-label" for="countries">COUNTRIES IN WHICH YOU HAVE SUBSDIARIES</label>
                        <div class="col-sm-4">
                            <?php echo CHtml::dropDownList('subsidiary_countries[]', getModelField($oCompany,'countries', true), $aCountries, array('multiple'=>'', 'class' => 'form-control chzn-select', 'data-placeholder' => 'Select Options')); ?>
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tax_number">TAX NO#:* </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="tax_number" id="tax_number" required="" aria-required="true" value="<?php echo getModelField($oCompany,'tax_number'); ?>" />
                         </div>
                        <label class="col-sm-2 control-label" for="employee_no">EMPLOYEES NO#:* </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="employee_no" id="employee_no" required="" aria-required="true" value="<?php echo getModelField($oCompany,'employee_no'); ?>" />
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="registration_number">COMPANY REGISTRATION NO#: </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="registration_number" id="registration_number" value="<?php echo getModelField($oCompany,'registration_number'); ?>" />
                         </div>
                        <label class="col-sm-2 control-label" for="website">WEBSITE: </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="website" id="website" style="text-transform: lowercase" value="<?php echo getModelField($oCompany,'website'); ?>" />
                         </div>
                    </div>
                    <div class="col-sm-12">
                        <hr />
                        <label class="control-label">INVOICE/CORRESPONDENCE ADDRESS (PLEASE TICK WHERE APPROPRIATE)</label>
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
                                <input type="text" class="form-control" name="address[1][street_address]" id="street_address2" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 1,'street_address'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="city2">CITY :*</label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('address[1][city]',getAddressField($aAddress, 1,'city_id'),$aCities, array('data-rel'=>'1','class' => 'form-control city-select','prompt' => '')); ?>
                                <input type="hidden" name="address[1][city_name]" id="city_name_1" />
                            </div>
                            <label class="col-sm-2 control-label" for="postal_code">POSTAL CODE :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control ignore" name="address[1][postal_code]" id="postal_code2" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 1,'postal_code'); ?>" />
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label class="col-sm-2 control-label" for="telephone">TELEPHONE :*<br />(including country and city code)</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="address[1][telephone]" id="telephone2" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 1,'telephone'); ?>" />
                            </div>
                            <label class="col-sm-2 control-label" for="fax">FAX :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control ignore" name="address[1][fax]" id="fax2" required="" aria-required="true" value="<?php echo getAddressField($aAddress, 1,'fax'); ?>" />
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                CONTACT PERSONS INFORMATION
            </div>
            <div class="panel-body">
                <?php foreach($aContactTypes as $aType): ?>
                    <?php if(isset($isEdit)): ?>
                        <input type="hidden" name="contact[<?php echo $aType['id'] ?>][id]" value="<?php echo getAddressField($aContacts, $aType['id'],'id'); ?>" />
                    <?php endif; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo strtoupper($aType['name']); ?>
                            <?php if($isMainContact != $aType['id']): ?>
                                <button type="button" data-id="<?php echo $aType['id'] ?>" class="btn btn-success pull-right contact-toggle"><i class="glyphicon glyphicon-plus"></i></button> 
                            <?php endif; ?>
                        </div>
                        <div id="contact-block-<?php echo $aType['id'] ?>" class="panel-body <?php if($isMainContact != $aType['id']): ?>keycontact hide<?php endif; ?>">
                            <div class="form-block">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="title_<?php echo $aType['id'] ?>">TITLE:* </label>
                                    <div class="col-sm-4">
                                        <?php echo CHtml::dropDownList('contact[' . $aType['id'] . '][title]',getAddressField($aContacts, $aType['id'],'title'),
                                        array('Mr.' => 'Mr.','Mrs.' => 'Mrs.','Ms.' => 'Ms.'),
                                        array('class' => 'form-control','prompt' => 'select option','required' => true,'id' => 'title_' . $aType['id'],'aria-required' => true)); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="first_name_<?php echo $aType['id'] ?>">FIRST NAME:* </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control name" name="contact[<?php echo $aType['id'] ?>][first_name]" id="first_name_<?php echo $aType['id'] ?>" required="" aria-required="true" placeholder="FIRST NAME:*" value="<?php echo getAddressField($aContacts, $aType['id'],'first_name'); ?>" />
                                    </div>
                                    <label class="col-sm-2 control-label" for="last_name_<?php echo $aType['id'] ?>">LAST NAME:* </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][last_name]" id="last_name_<?php echo $aType['id'] ?>" required="" aria-required="true" placeholder="LAST NAME:*" value="<?php echo getAddressField($aContacts, $aType['id'],'last_name'); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email_<?php echo $aType['id'] ?>">EMAIL ADDRESS:* </label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" style="text-transform: lowercase" name="contact[<?php echo $aType['id'] ?>][email]" id="email_<?php echo $aType['id'] ?>" required="" aria-required="true" placeholder="EMAIL ADDRESS:*" value="<?php echo getAddressField($aContacts, $aType['id'],'email'); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="ctelephone_<?php echo $aType['id'] ?>">TELEPHONE:* </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][telephone]" id="ctelephone_<?php echo $aType['id'] ?>" required="" aria-required="true" placeholder="TELEPHONE:*" value="<?php echo getAddressField($aContacts, $aType['id'],'telephone'); ?>" />
                                    </div>
                                    <label class="col-sm-2 control-label" for="cfax_<?php echo $aType['id'] ?>">FAX: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="contact[<?php echo $aType['id'] ?>][fax]" id="cfax_<?php echo $aType['id'] ?>" placeholder="FAX:" value="<?php echo getAddressField($aContacts, $aType['id'],'fax'); ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <?php if(!isset($isEdit)): ?>
                    <button type="button" id="nextStep" class="btn btn-primary">Next Step <i class="glyphicon glyphicon-chevron-right"></i></button>
                <?php else: ?>
                    <button type="submit" id="submit-company" class="btn btn-primary">Submit</button>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>