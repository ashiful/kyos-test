<?php

    class Kyos_controller {

        function __construct() {
            include_once('kyos_model.php');
            $this->kyos_model = new Kyos_model();

            $this->index();
        }

        function index() {
            $params = array();
            if  ( isset($_REQUEST['entity']) ) {
                $params['entity'] = $_REQUEST['entity'];
            }
            if  ( isset($_REQUEST['commodity']) ) {
                $params['commodity'] = $_REQUEST['commodity'];
            }
            if  ( isset($_REQUEST['start_date']) ) {
                $params['start_date'] = $_REQUEST['start_date'];
            }
            if  ( isset($_REQUEST['end_date']) ) {
                $params['end_date'] = $_REQUEST['end_date'];
            }
            $rows = $this->kyos_model->list_rows($params);
            include_once('kyos_view.php');
        }
    }

    $a = new Kyos_controller();