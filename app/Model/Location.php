<?php 

class Location extends AppModel {
    public $validate = array(
        'name' => array('rule' => 'notBlank')
    );
}