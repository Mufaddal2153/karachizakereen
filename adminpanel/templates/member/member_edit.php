<div id="page-inner">
        <h3 class="page-header">
            <i class="fa fa-pencil-square"></i>
            Edit Company
        </h3>
<form class="form-horizontal" role="form" method="post" id="company_form" action="<?php echo HTTP_SERVER; ?>member/edited">
        <div class="panel panel-default">
            <div class="panel-heading">
                COMPANY INFORMATION 
            </div>
            <div class="panel-body">
                <div class="form-block">
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="company_name">COMPANY NAME:*</label>
                            <div class="col-sm-4">
                                <input type="text" name="company" class="form-control company_name new_company" value="<?php echo $aCompany->name;  ?>" required="" aria-required="true">
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="street_address">STREET ADDRESS:*</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $aAddress1->street_address;  ?>"  name="address[0][street_address]" required="" aria-required="true">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="country">COUNTRY :*</label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('address[0][country]',$aAddress1->country,$aCountries, array('class' => 'form-control chzn-select','prompt' => '')); ?>
                             </div>
                            <label class="col-sm-2 control-label" for="city">CITY :*</label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('address[0][city]',$aAddress1->city_id,$aCities, array('class' => 'form-control chzn-select','prompt' => '')); ?>
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="email">EMAIL :</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" value="<?php echo $aCompany->email;  ?>" name="email" required="" aria-required="true">
                            </div>
                            <label class="col-sm-2 control-label" for="postal_code">POSTAL CODE :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="address[0][postal_code]" value="<?php echo $aAddress1->postal_code;  ?>" required="" aria-required="true">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="telephone">TELEPHONE :*</br>(including country and city code)</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="address[0][telephone]" value="<?php echo $aAddress1->telephone;  ?>" required="" aria-required="true">
                            </div>
                            <label class="col-sm-2 control-label" for="fax">FAX :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="address[0][fax]"  value="<?php echo $aAddress1->fax;  ?>"required="" aria-required="true">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="trading_zones">TRADING ZONES:* </br>(Africa, Europe, Asia) </label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('trading_zones[]',explode(',',$aCompany->trading_zones),$aContinents, array('multiple'=>'', 'class' => 'form-control chzn-select','data-placeholder' => 'Select Options')); ?>
                             </div>
                            <label class="col-sm-2 control-label" for="countries">COUNTRIES IN WHICH YOU HAVE SUBSDIARIES</label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('subsidiary_countries[]',explode(',',$aCompany->countries),$aCountries, array('multiple'=>'', 'class' => 'form-control chzn-select', 'data-placeholder' => 'Select Options')); ?>
                             </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="tax_number">TAX NO#:* </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tax_number" value="<?php echo $aCompany->tax_number;  ?>" id="tax_number" required="" aria-required="true">
                             </div>
                            <label class="col-sm-2 control-label" for="employee_no">EMPLOYEES NO#:* </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="employee_no" id="employee_no" value="<?php echo $aCompany->employee_no;  ?>" required="" aria-required="true">
                             </div>
                        
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="registration_number">COMPANY REGISTRATION NO#:* </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="registration_number" value="<?php echo $aCompany->registration_number;  ?>"   id="registration_number" required="" aria-required="true">
                             </div>
                            <label class="col-sm-2 control-label" for="website">WEBSITE:* </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="website" id="website" value="<?php echo $aCompany->website;  ?>"  required="" aria-required="true">
                             </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" style="margin-left: 35px;">INVOICE/CORRESPONDENCE ADDRESS (PLEASE TICK WHERE APPROPRIATE)</label>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-5 input-control radio small-check" style="margin-left: 35px;">
                            <input type="radio" name="address_type" class="address_type" value="0">
                            <span class="caption">Same As Company Address</span>
                        </label>
                        <label class=" col-sm-5 input-control radio small-check" style="margin-left: 35px;">
                            <input type="radio" name="address_type" class="address_type" value="1">
                            <span class="caption">Different Address (Please Insert Below Full Billing Address)</span>
                        </label>
                    </div>
                    <div id="secondary_address" class="hide">
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="street_address">STREET ADDRESS:*</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $aAddress2?$aAddress2->street_address:'';  ?>" name="address[1][street_address]" required="" aria-required="true">
                                </div>
                  
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="country">COUNTRY :*</label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('address[1][country]',$aAddress2?$aAddress2->country:'',$aCountries, array('class' => 'form-control select-chzn','prompt' => '')); ?>
                             </div>
                      
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label" for="city">CITY :*</label>
                            <div class="col-sm-4">
                                <?php echo CHtml::dropDownList('address[1][city]',$aAddress2?$aAddress2->city_id:'',$aCities, array('class' => 'form-control select-chzn','prompt' => '')); ?>
                            </div>
                   
                                <label class="col-sm-2 control-label" for="postal_code">POSTAL CODE :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="address[1][postal_code]" value="<?php echo $aAddress2?$aAddress2->postal_code:'';  ?>" required="" aria-required="true">
                                </div>
                            </div>
                
                        <div class="form-group col-sm-12">
                                <label class="col-sm-2 control-label" for="telephone">TELEPHONE :*</br>(including country and city code)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="address[1][telephone]" value="<?php echo $aAddress2?$aAddress2->telephone:'';  ?>" required="" aria-required="true">
                                </div>
                                <label class="col-sm-2 control-label" for="fax">FAX :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="address[1][fax]" value="<?php echo $aAddress2?$aAddress2->fax:'';  ?>" required="" aria-required="true">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
</div> 
        <div class="panel panel-default">
            <div class="panel-heading">
                CONTACT PERSONS INFORMATION
            </div>
            <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                CHIEF EXECUTIVE/MANAGING DIRECTOR/PROPRIETOR
                            </div>
                            <div class="panel-body">
                                <div class="form-block">
                                    <label class="col-sm-2 control-label" for="contact_1_title">TITLE:*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="contact[1][title]" value="<?php echo $aContact1->title;  ?>" id="contact_1_title" required="" aria-required="true" placeholder="TITLE:*">
                                    </div>
                                </div>
                                <div class="form-block">
                                    <label class="col-sm-2 control-label" for="telephone">FIRST NAME::*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="contact[1][first_name]" required="" value="<?php echo $aContact1->first_name;  ?>" aria-required="true" placeholder="FIRST NAME:*">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="contact[1][last_name]" required="" value="<?php echo $aContact1->last_name;  ?>" aria-required="true" placeholder="LAST NAME:*">
                                    </div>
                                </div>
                                
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="contact[1][email]" value="<?php echo $aContact1->email;  ?>" required="" aria-required="true" placeholder="EMAIL ADDRESS:*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[1][telephone]" value="<?php echo $aContact1->telephone;  ?>" required="" aria-required="true" placeholder="TELEPHONE:*">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[1][fax]" value="<?php echo $aContact1->fax;  ?>" required="" aria-required="true" placeholder="FAX:*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                KEY CONTACT
                            </div>
                            <div class="panel-body">
                                <div class="form-block">
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[2][title]" required="" value="<?php echo $aContact2->title;  ?>" aria-required="true" placeholder="TITLE:*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[2][first_name]" required="" value="<?php echo $aContact2->first_name;  ?>" aria-required="true" placeholder="FIRST NAME:*">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[2][last_name]" required="" value="<?php echo $aContact2->last_name;  ?>" aria-required="true" placeholder="LAST NAME:*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[2][email]" value="<?php echo $aContact2->email;  ?>" required="" aria-required="true" placeholder="EMAIL ADDRESS:*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[2][telephone]" value="<?php echo $aContact2->telephone;  ?>" required="" aria-required="true" placeholder="TELEPHONE:*">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[2][fax]" value="<?php echo $aContact2->fax;  ?>" required="" aria-required="true" placeholder="FAX:*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                ACCOUNTS CONTACT 
                            </div>
                            <div class="panel-body">
                                <div class="form-block">
                                        <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[3][title]" value="<?php echo $aContact3->title;  ?>" required="" aria-required="true" placeholder="TITLE:*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[3][first_name]" required="" value="<?php echo $aContact3->first_name;  ?>" aria-required="true" placeholder="FIRST NAME:*">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="contact[3][last_name]" required="" value="<?php echo $aContact3->last_name;  ?>" aria-required="true" placeholder="LAST NAME:*">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <div class="form-group col-sm-6">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="contact[3][email]" value="<?php echo $aContact3->email;  ?>" required="" aria-required="true" placeholder="EMAIL ADDRESS:*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <div class="form-group col-sm-6">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="contact[3][telephone]" value="<?php echo $aContact3->telephone;  ?>" required="" aria-required="true" placeholder="TELEPHONE:*">
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="contact[3][fax]" value="<?php echo $aContact3->fax;  ?>" required="" aria-required="true" placeholder="FAX:*">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $aContact3->id;?>" name="contact[3][id]">
                                        <input type="hidden" value="<?php echo $aContact1->id;?>" name="contact[1][id]">
                                        <input type="hidden" value="<?php echo $aContact2->id;?>" name="contact[2][id]">
                                        <input type="hidden" value="<?php echo $aAddress1->id;?>" name="address[0][id]">
                                        <input type="hidden" value="<?php echo $aAddress2?$aAddress2->id:'';?>" name="address[1][id]">
                                        <input type="hidden" value="<?php echo $aCompany->id;?>" name="id">

                                    <button type="submit" class="btn btn-success pull-right">Edit<i class="glyphicon glyphicon-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
</form>
</div>