<?php

class Schedule extends Model{

	public static $table = 'schedule';

    protected $_fields = array(
        'id',
        'party_id',
        'event_id',
        'mohalla_id',
        'attended',
        'verified'
    );

}

?>