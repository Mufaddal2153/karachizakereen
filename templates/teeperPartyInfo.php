<div class="panel panel-default">
    <div class="panel-body">
        <?php echo $data ?>
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php // echo $data; ?>
                <label>Party Name:</label>
                <?php // echo CHtml::dropDownList('party_id','',$aParties, array('class' => 'form-control chzn-select','prompt' => 'Choose Party')); ?>
            </div>

            <div class="col-sm-4 form-group">
                <label>Registered Mohalla:</label>
                <?php // echo CHtml::dropDownList('mohalla_id','',$aMohalla, array('class' => 'form-control mohalla','prompt' => 'Choose Mohalla')); ?>
            </div>

            <div class="col-sm-4">
                <label>Registered Since:</label>
                <input type="text" class="form-control date registered" value="" data-date-format="yyyy" data-provide="datepicker" name="registered" />
            </div>
        </div>

    </div>
</div>