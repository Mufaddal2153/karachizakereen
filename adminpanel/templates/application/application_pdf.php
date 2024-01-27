
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="50%">
                <img width="147" height="75" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/logo2.png"/>
            </td>
            <td align="right">
                <br />
                <br />
                <br />
                <u style="font-size:50px;">GS1 Pakistan Company Prefix Application</u>
            </td>
        </tr>
    </table>
    <h4 align="left">
        <img width="60" height="24" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/heading-icon.png" align="left" hspace="12"/>
        I- Company Information (in CAPITAL LETTERS)
    </h4>
    <div style="padding: 0 20px 0 20px;text-transform:uppercase;">
        <table border="1" cellspacing="0" cellpadding="5" width="100%" algin="center">
            <tr>
                <td colspan="6" valign="top">COMPANY NAME:<br /><?php echo getModelField($oModel,'name'); ?></td>
            </tr>
            <tr>
                <td colspan="6" valign="top">STREET ADDRESS:<br /><?php echo getAddressField($aAddress, 0,'street_address'); ?></td>
            </tr>
            <tr>
                <td colspan="2" valign="top">CITY:<br /><?php echo getAddressField($aAddress, 0,'city_name'); ?></td>
                <td colspan="2" valign="top">POST CODE:<br /><?php echo getAddressField($aAddress, 0,'postal_code'); ?></td>
                <td colspan="2" valign="top">COUNTRY:<br />Pakistan</td>
            </tr>
            <tr>
                <td colspan="2" valign="top">TEL (including country and city codes):<br /><?php echo getAddressField($aAddress, 0,'telephone'); ?></td>
                <td colspan="2" valign="top">FAX:<br /><?php echo getAddressField($aAddress, 0,'fax'); ?></td>
                <td colspan="2" valign="top">EMAIL:<br /><?php echo getModelField($oModel,'email'); ?></td>
            </tr>
            <tr>
                <td  colspan="2" valign="top">TRADING ZONES <em>(Africa, Europe, Asia…):</em><br /><?php echo getModelField($oModel,'trading_zones'); ?></td>
                <td  colspan="4" valign="top">Countries in which you have subsidiaries or a parent company:<br /><?php echo join(',',$aCountries); ?></td>
            </tr>
            <tr>
                <td valign="top">TAX No.:<br /><?php echo getModelField($oModel,'tax_number'); ?></td>
                <td colspan="2" valign="top">EMPLOYEES NUMBER:<br /><?php echo getModelField($oModel,'employee_number'); ?></td>
                <td colspan="2" valign="top">COMPANY REGISTRATION No.:<?php echo getModelField($oModel,'registration_number'); ?></td>
                <td valign="top">WEBSITE:<br /><?php echo getModelField($oModel,'website'); ?></td>
            </tr>
        </table>
    </div>
    <div style="padding: 0 20px 0 20px;">
        INVOICE/CORRESPONDENCE ADDRESS <small>(please tick where appropriate)</small>
    </div>
    <div style="padding: 0 20px 0 20px;text-transform:uppercase;">
        <table border="1" cellspacing="0" cellpadding="5" width="100%" algin="center">
            <tr>
                <td valign="top"><img src="<?php echo HTTP_MAIN_SERVER ?>assets/img/checkbox-<?php if(isset($aAddress[0]) && isset($aAddress[1]) && $aAddress[0]['street_address'] == $aAddress[1]['street_address']): ?>checked<?php else: ?>unchecked<?php endif; ?>.png" /> Same as Company Address</td>
                <td valign="top"><img src="<?php echo HTTP_MAIN_SERVER ?>assets/img/checkbox-<?php if(isset($aAddress[0]) && (!isset($aAddress[1]) || $aAddress[0]['street_address'] != $aAddress[1]['street_address'])): ?>checked<?php else: ?>unchecked<?php endif; ?>.png" /> Different Address (please insert below full billing address):</td>
            </tr>
            <tr>
                <td colspan="2"><?php if(isset($aAddress[0]) && isset($aAddress[1]) && $aAddress[0]['street_address'] != $aAddress[1]['street_address']): ?><?php echo $aAddress[1]['street_address'] ?>, <?php echo $aAddress[1]['city_name'] ?>, <?php echo $aAddress[1]['postal_code'] ?>; Tel: <?php echo $aAddress[1]['telephone'] ?> Fax: <?php echo $aAddress[1]['fax'] ?><?php endif; ?></td>
            </tr>
        </table>
    </div>
    <h4 align="left">
        <img width="60" height="24" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/heading-icon.png" align="left" />
        <strong>II- Contact Persons Information (in CAPITAL LETTERS)</strong>
    </h4>
        <?php foreach ($aContactTypes as $i => $aType) : ?>
        <div style="padding: 0 20px 0 20px;text-transform:uppercase;">
            <table border="1" cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td width="30%" valign="top" align="center"><strong><?php echo strtoupper(trim($aType['name'])) ?>:</strong></td>
                    <td width="15%" valign="top">MR/MRS:<br /><?php echo getAddressField($aContacts, $aType['id'],'title') ?></td>
                    <td width="28%" valign="top">FIRST NAME:<br /><?php echo getAddressField($aContacts, $aType['id'],'first_name') ?></td>
                    <td width="27%" valign="top">LAST NAME:<br /><?php echo getAddressField($aContacts, $aType['id'],'last_name') ?></td>
                </tr>   
                <tr>
                    <td width="30%"></td>
                    <td width="70%" colspan="3" valign="top">EMAIL: <?php echo getAddressField($aContacts, $aType['id'],'email') ?></td>
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td width="43%" colspan="2" valign="top">TELEPHONE: <?php echo getAddressField($aContacts, $aType['id'],'telephone') ?></td>
                    <td width="27%" valign="top">FAX: <?php echo getAddressField($aContacts, $aType['id'],'fax') ?></td>
                </tr>
            </table>
        </div>
        <?php endforeach; ?>
        <br />
        <br />
        <br />
        <br />
    <h4 align="left">
        <img width="60" height="24" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/heading-icon.png" align="left"/>
        III- Product Information
    </h4>
        <strong>1. Product category that best identifies your business.<em> (Please Check One)</em></strong><br />
        <div style="padding: 0 20px;">
            <table border="0" cellspacing="0" cellpadding="5" width="100%">
                <tr><?php $j=0;for($i=0;$i<$iCategories;$i++): ?><?php if($j == 0 || $j == $iHalf): ?><td width="300" valign="top"><?php endif; ?><?php if(isset($aProductCategories[$i])): ?><img src="<?php echo HTTP_MAIN_SERVER ?>assets/img/checkbox-<?php if($oModel['product_category_id'] && in_array($aProductCategories[$i]['id'], explode(',',$oModel['product_category_id']))):?>checked<?php else: ?>unchecked<?php endif; ?>.png" /> <?php echo $aProductCategories[$i]['name']; ?><?php if(($j+1) != $iHalf): ?><br /><?php endif; ?><?php endif; ?>
                        <?php $j++;
                        if($j == $iHalf || ($i+1) == $iCategories): ?>
                            <?php if(($i+1) == $iCategories): ?>
                                Not Specified <?php if($oModel['product_category_id'] == 0): ?><u><?php echo $oModel['product_category'] ?></u><?php else: ?>____________________<?php endif; ?>
                            <?php endif; ?></td>
                        <?php endif; ?>
                    <?php endfor; ?></tr>
            </table>
        </div>
        <strong>2. PLEASE INDICATE WHAT TYPE OF PRODUCT YOU NEED TO BARCODE</strong> (multiple choices are possible)<br />
        <div style="padding: 0 20px;">
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <?php foreach ($aProductTypes as $id => $sName) : ?>
                        <td width="200" valign="top">
                            <img src="<?php echo HTTP_MAIN_SERVER ?>assets/img/checkbox-<?php if($oModel['company_type_id'] && in_array($id, explode(',',$oModel['company_type_id']))):?>checked<?php else: ?>unchecked<?php endif; ?>.png" /> <?php echo $sName; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
        <strong>3. PLEASE INDICATE BELOW THE NUMBER OF GLOBAL TRADE ITEM NUMBERS (GTIN’s) YOU REQUIRE</strong><br />
        <div style="padding: 0px;margin:0px;">
            <table border="1" cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <?php foreach($aPackages as $aPackage): ?>
                        <?php if($aPackage['type_id'] != 1): ?>
                            <td><img src="<?php echo HTTP_MAIN_SERVER ?>assets/img/checkbox-<?php if($oModel['package_id'] && in_array($aPackage['id'], explode(',',$oModel['package_id']))):?>checked<?php else: ?>unchecked<?php endif; ?>.png" /> <?php echo $aPackage['name']; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    <h4>
        <img width="60" height="24" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/heading-icon.png" align="left"/>
        IV- Fees Structure &amp; Bank Details
    </h4>
    <div style="padding: 0 20px;">
        <table>
            <tr>
                <td>
                    Any Individual/Firm/Company applying for the GTIN-13/GLN or GTIN-8 barcode numbers will be required to pay following Entrance and Annual Fees along with
                    the GS1 Pakistan Standard Application Form duly completed. These fees are exclusive of prevailing taxes.
                    <br />
                    <strong>Entrance Fee</strong> <br/>
                    <div style="padding: 0 10px;">
                        <table border="1" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="2" valign="top">
                                        <strong>Entrance Fee Schedule for GTIN-13s / GLN</strong>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">  For 1 GTIN-13s / GLN  </td>
                                <td valign="top">
                                        N/A
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        For 10 GTIN-13s <strong>(50% of Normal Entrance Fee)</strong>
                                </td>
                                <td valign="top">
                                        Rs. 15,000
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        Above 10 GTIN-13s
                                </td>
                                <td valign="top">
                                        Rs. 30,000
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="font-size:35px">
                        <strong>
                            (Members availing 50% rate for Entrance Fee will be required to pay the balance amount of Rs. 15,000/= when applying for Additional Numbers)
                        </strong>
                    </div><br />
                    <strong>Annual Fee</strong><br />
                    <div style="padding: 0 10px;">
                        <table border="1" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="2" valign="top">
                                        <strong>Annual Fee Schedule for GTIN-13s</strong>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        1 GTIN-13s / GLN
                                </td>
                                <td valign="top">
                                        Rs. 5,000
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        10 GTIN-13s
                                </td>
                                <td valign="top">
                                        Rs. 5,000
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        100 GTIN-13s
                                </td>
                                <td valign="top">
                                        Rs. 8,000
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        300 GTIN-13s
                                </td>
                                <td valign="top">
                                        Rs. 10,000
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        500 GTIN-13s
                                </td>
                                <td valign="top">
                                        Rs. 15,000
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                        1,000 GTIN-13s
                                </td>
                                <td valign="top">
                                        Rs. 20,000
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="color:red;text-align:center;">
                        <strong> (<u>ANNUAL FEE ARE DUE FROM ONE CALENDER YEAR OF THE ALLOCATION MONTH</u>)</strong>
                    </div>
                      <br/>
                        As of from the <strong>second year</strong>, companies are requested to pay the annual renewal fee. For example, if you request 300 GTIN-13s, you will need
                        to pay Rs. 40,000 (Entrance + Annual Fees) for the first year and Rs.10,000 in subsequent years.
                      <br/>
                      <br/>
                        <strong>GTIN-8s </strong>
                        <br/>
                        GTIN-8 numbers encoded in EAN-8 barcode symbols are used on very small retail items (e.g. cigarettes, cosmetics, etc.) where is there is insufficient space
                        on the label or package to include an EAN-13 barcode.
              <br/>  <br/>
                        <strong>Annual Fee:</strong>
                        Per GTIN-8s: Rs 2,500.
                        <br/>
                        Please indicate here the number of GTIN-8s you require: <?php if($oModel['package_type_id'] == 1): ?><u><?php echo $oModel['package_qty'] ?></u><?php else: ?>___________<?php endif; ?>
                      <br/>
                      <br/>
                      <br/>
                    <div style="padding: 0 50px;">
                        <table>
                            <tr>
                                <td><strong>GS1 Pakistan (Guarantee) Ltd</strong>
                                    <br />
                                    Habib Metropolitan Bank Ltd.
                                    <br />
                                    Paper Market Branch
                                    <br />
                                    New Challi, Karachi
                                    <br />
                                    A/c No. 20311-714-182748
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br />
                        <u>(If you pay by bank transfer, please transfer the required amount exclusive of local bank charges.) </u>
                </td>
            </tr>
        </table>
    </div>
    <br />
    <h4 align="left">
        <img width="60" height="24" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/heading-icon.png" align="left" hspace="12"/>
        V- Contacts
    </h4>
        <br />
        <br />&nbsp;
        <br />
        <br />
    <div style="padding: 0 20px">
        <table>
            <tr>
                <td>Please send “proof of payment” with your completed Application to <a href="mailto:shahid@gs1pk.org">shahid@gs1pk.org</a>, state the reason for payment as:
                        “<strong>GS1 Pakistan (Guarantee) Ltd.</strong>” and include the NAME OF YOUR COMPANY.
                    <br />
                    <br />
                    <br />
                    <div style="padding: 0 30px">
                        <table>
                            <tr>
                                <td><strong><u>ATTN: Accounts Department </u></strong>
                                    <br />
                                    <br /><strong>GS1 Pakistan (Guarantee) Ltd.</strong>
                                    <br />
                                    Azzainab Court, Campbell Street
                                    <br />
                                    Karachi-74200
                                    <br />
                                    Ph#: 021-32215844/32628213/32621886
                                    <br />
                                    <a href="mailto:info@gs1pk.org">info@gs1pk.org</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                        I/We ____________________________ agree to abide by the Terms and Conditions (encl.) of the GS1 Company Prefix License.
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <table border="0" width="100%">
                        <tr>
                            <td width="25%">
                                <div>_____________________</div>
                                <div align="center">Authorised Signature</div>
                            </td>
                            <td width="50%">&nbsp;</td>
                            <td width="25%" align="right">
                                <div>_____________________</div>
                                <div align="center">Date</div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>       
    </div>
    <br />
    <h4 align="left">
        <img width="60" height="24" src="<?php echo HTTP_MAIN_SERVER ?>assets/img/heading-icon.png" align="left" hspace="12"/>
        VI- GS1 Company Prefix License and GS1 Pakistan Membership - Terms and Conditions
    </h4>
    <div style="padding:0 20px;font-size:30px;">
        <table border="0" cellspacing="0" cellpadding="10" width="100%">
            <tr>
                <td width="50%" valign="top">
                    <strong>1. Grant of License</strong>
                    <br />
                        GS1 Pakistan grants You a non-exclusive non-transferable license to use the GS1 company prefix in connection with the supply and sale of
                        your products.
                    <br /><br />
                        <strong>2. Term </strong>
                    <br />
                        The License and these terms and conditions come into effect for You on the date on which GS1 Pakistan notifies You of its acceptance of
                        your GS1 Company Prefix License and GS1 Pakistan Membership and continues until terminated as provided in clause 9.
                    <br />
                    <br />
                        <strong>3. Fees</strong><br />
                    <div style="padding: 0 20px">
                        a   You must pay the Membership Fee to GS1 annually within 30 days of the date of GS1’s invoice.
                    <br /><br />
                        b   GS1 may, from time to time, increase the Membership Fee.
                    <br />
                        c   Where products bearing the GS1 identification numbers issued to You are already in the marketplace at the time the License is terminated,
                        notwithstanding such termination, You will remain liable for a fee equivalent to the then current Membership Fee for the period that You
                        continue to distribute those Products.
                     </div>
                        <br/>
                        <strong>4. Your Conduct</strong><br />
                    <div style="padding: 0 20px">
                        a You must not at any time during the term of the Membership and License, or after its termination, do or omit to do anything whereby GS1’s
                        goodwill or reputation may be prejudicially affected or brought into disrepute.
                    <br />
                        b You must comply with the technical standards set out in the GS1 Pakistan manuals/guidelines and such other directions as GS1 may give
                        from time to time.
                    </div><br />
                        <strong>5. Use of the GS1 Numbers</strong><br />
                    <div style="padding: 0 20px">
                        a You must only use the GS1 numbers issued to You in connection with the manufacture, sale and identification of Your Products;
                    <br />
                        b You must not alter the GS1 numbers licensed to You in any way;
                    <br />
                        c You must not transfer, share, sell, lease, sub-license or sub-divide the GS1 numbers and permit them to be used by anyone else;
                    <br />
                        d You must recognise GS1 Pakistan’s title to the GS1 numbers and related intellectual property and must not at any time do or allow to be
                        done any act or thing which may in any way impair GS1’s rights in regards to GS1 numbers or related intellectual property.
                   </div>
                        <br/>
                        <strong>6. Indemnity</strong>
                    <br />
                        You agree to indemnify GS1 Pakistan against all claims, suits, losses, damages or costs suffered or incurred by GS1 Pakistan as a result of
                        Your conduct, Your use of the GS1 Numbers and any breach of these terms and conditions by You (except to the extent caused by GS1’s
                        negligence or wilful misconduct).
                    <br /><br />
                        <strong>7.Limitation of Liability</strong><br />
                    <div style="padding: 0 20px">
                        a To the full extent permitted by law, GS1 Pakistan excludes all liability in connection with this License for any indirect or
                        consequential loss or damage, including lost profits and revenue;
                    <br />
                        b To the full extent permitted by law, GS1 Pakistan’s total liability to You for loss or damage of any kind arising out of this License
                        which is not excluded by clause 7.a is limited, for any and all claims, to the total License Fee paid during the 12 month period prior to
                        the relevant liability accruing.
                    </div>
                </td>
                <td width="50%" valign="top">
                        <strong>8. Warranty Disclaimer</strong>
                    <br />
                        GS1 Pakistan makes no warranties, express or implied, and GS1 specifically disclaims any warranty of merchantability or fitness for a
                        particular purpose. GS1 Pakistan does not guarantee that the GS1 Numbers will meet “all requirements” of Your business.
                    <br /><br />
                        <strong>
                            9. Termination
                        </strong><br />
                        <div style="padding: 0 20px">
                        GS1 Pakistan may terminate the License immediately by giving notice if:
                    <br />
                        a You fail to pay the Membership Fee by its due date:
                    <br />
                        b You commit a breach of Your obligations under these terms and conditions;
                    <br />
                        c You are declared bankrupt, go into liquidation, have a receiver or other controller appointed, or (being a company) are wound up
                        otherwise than for the purpose of a reconstruction;
                    <br />
                        d Either GS1 Paksitan or You may terminate this Membership Agreement and License in any other circumstances by giving six months written
                        notice to the other party.
                    <br />
                        e Termination of this Membership Agreement and License does not relieve either GS1 or You from liability arising from any prior breach of
                        the terms of this Agreement.
                    </div><br />
                        <strong>10. Consequences of Termination</strong><br />
                    <div style="padding: 0 20px">
                        a On termination of the Membership Agreement, your rights under this Agreement terminate and You must:<br />
                    <div style="padding: 0 20px">
                        (i) Immediately cease applying the GS1 Numbers and Bar Codes to any of your Products manufactured or sold by You after the termination
                        date; and
                    <br />
                        (ii) Within 30 days, pay to GS1 Pakistan all amounts due to GS1 Pakistan under this License at the termination date.
                    </div>
                        b You are not entitled to any rebate or refund of the Membership Fee or any other fees or charges paid under this License, unless this
                        License expressly states otherwise.
                    <br />
                        c The termination or expiry of this Agreement does not affect those provisions, which by their nature survive termination, including clause
                        6 and 7.
                    </div><br />
                        <strong>11. General Provisions</strong><br />
                    <div style="padding: 0 20px">
                        a All notices and other communications in connection with this Membership Agreement and License must be in writing and take effect from the
                        time they are received unless a later time is specified.
                    <br />
                        b Notices for You will be sent to the address specified on your Membership application (or such other address as You may notify GS1
                        Pakistan of from time to time).
                    <br />
                        c This Membership Agreement and License is governed by the law in force in Pakistan. Each party submits to the non-exclusive jurisdiction
                        of the courts of that place.
                    </div>
                </td>
            </tr>
        </table>
    </div>
