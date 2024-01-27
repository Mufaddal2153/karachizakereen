<html>
<head>
    <link href="../../../assets/css/print.css" rel="stylesheet" type='text/css' />
    <META http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
</head>
<body>
    <div id="header">   
        <div id="logo">
            <img src="../../../assets/images/logomember.png" />
        </div>        
    </div>
    <div class="invoiceno">
        Invoice No: <span class="fontinc">SI- </span><?php echo $aDetails->slip_number.'/'.date("m/Y", strtotime($aDetails->created_at));?><br>
        Dated: <?php echo date("d/m/Y", strtotime($aDetails->created_at)); ?>
    </div>
    <div class="customername">
        <?php /* ATTN: <?php echo $aDetails->title.' '.$aDetails->contact_name;?><br> */ ?>
        M/s. <?php echo $aDetails->name ?><br />
        <?php echo $aDetails->street_address; ?>,<br>
        <?php echo $aDetails->city_name;?>
    </div>
    <div class="chargednotice">
        BEING AMOUNT <span class="fontinc">CHARGED</span> ON A/C OF <span class="fontinc">ANNUAL FEES</span>/CONTRIBUTION<br> FOR GSI PAKISTAN
    </div>
    <div class="dpanel80">
        <table class="invoicetable">
        <tr>
            <th>S.NO.</th>
            <th>DESCRIPTION</th>
            <th>AMOUNT</th>
        </tr>
        <?php if($aDetails->entrance_package_amount!=0): ?>
        <tr>
            <td>1</td>
            <td>ONE TIME ENTRANCE FEES</td>
            <td><?php echo $aDetails->entrance_package_amount; ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td>2</td>
            <td><?php echo $aDetails->package; ?></td>
            <td><?php echo $aDetails->package_amount; ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>TOTAL AMOUNT</td>
            <td><?php echo $a=($aDetails->package_amount + $aDetails->entrance_package_amount); ?></td>
        </tr>
        </table>
    </div>

    <div class="chargednotice">
        AMOUNT IN WORDS: ------<?php echo convert_number_to_words($a); ?> ONLY------                
    </div>

    <div class="accountant">
                -----------------<br>
                Accountant
    </div>
    <div class="bankfooter">
        GS1 Pakistan (Guarantee) Ltd- Office No. C-V, 3rd Floor,<br>
        Azaniab Court, Campbell Street - 74200 Karachi<br>
        Phone: +9221-32628213/32215844 - Website: http://www.gs1pk.org - Email:info@gs1pk.org
    </div>
    <div class="bdet">
        Bank Details :-<br>
        GS1 Pakistan (Guarantee) Ltd<br>
        Habib Metropolitan Bank Ltd.<br>
        Paper Market Branch<br>
        New Challi, Karachi<br>
        A/c No. 20311-714-182748<br>
        NTN: 3338081-3
    </div>
    <?php if(isset($_GET['print'])) { ?>
    <script>
        window.print();
    </script>

    <?php }?>
</body>
</html>