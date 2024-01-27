
<h1>Event Management</h1>
<h2>Event Management</h2>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="event_table">
        <thead>
            <tr>
                <th class="text-center">Event Name</th>
                <th class="text-center">Event Date</th>
                <th class="text-center">Multiple?</th>
                <th class="text-center">Action</th>
				<th class="text-center">Save</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event) {?>
                <tr>
                    <td class="hidden">
                        <input type="hidden" class="form-control id" value="<?php echo $event['id']; ?>" name="" />
                    </td>
                    <td>
                        <input type="text" class="form-control name" value="<?php echo $event['title']; ?>" name="" />
                    </td>
                    <td>
                        <input type="text" class="form-control date datepicker" value="<?php echo $event['date']; ?>" data-date-format="dd-mm-yyyy" data-provide="datepicker" name="" />
                    </td>
                    <td>
                        <input type="checkbox" class="form-control multiple"<?php echo ($event['is_multiple'] == 1) ? ' checked="checked"' : ''; ?> name="" />
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-md btn-primary" id="event_delete">Remove</button>
                    </td>
        			<td class="text-center">
                        <button type="button" name="submit_event" id="event_update" class="btn btn-success" value="create">Update</button>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td>
                    <input type="text" class="form-control name"  name="target[title]" />
                </td>
                <td>
                    <input type="text" class="form-control date datepicker"  data-date-format="yyyy-mm-dd" data-provide="datepicker" name="target[date]" />
                </td>
                <td>
                    <input type="checkbox" class="form-control multiple"  value="1" name="target[is_multiple]" />
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-md btn-primary" id="remove_schedule">Remove</button>
                </td>
				<td class="text-center">
				    <button type="button" name="submit_event" id="event_submit" class="btn btn-success event_submit" value="create">Save</button>
                </td>
            </tr>
        </tbody>
        <tfoot class="hidden">
            <tr class="add">
                <td>
                    <input type="text" class="form-control name" name="target[title]" />
                </td>
                <td>
                    <input type="text" class="form-control date datepicker" data-date-format="yyyy-mm-dd" data-provide="datepicker" name="target[date]" />
                </td>
                <td>
                    <input type="checkbox" class="form-control multiple" name="target[is_multiple]" />
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-md btn-primary" id="remove_schedule">Remove</button>
                </td>
    			<td class="text-center">
                    <button type="button" name="submit_event" id="event_submit" class="btn btn-success" value="create">Save</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="panel panel-default form-horizontal">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-5 col-md-2">
                <button type="button" onclick="location.href='<?php echo CURR_DIR.'adminindex'?>';" class="btn btn-warning">Back</button>
            </div>
            <div class="col-xs-2 col-md-8">

            </div>
            <div class="col-xs-5 col-md-2 text-right">
                <button type="button" class="btn btn-info" id="add_event">Add New Row</button>
            </div>
        </div>
    </div>
</div>