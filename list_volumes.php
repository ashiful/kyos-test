<?php

    class Kyos_list_volumes {

        function __construct() {
            include_once('kyos_model.php');
            $this->kyos_model = new Kyos_model();

            $this->index();
        }

        function index() {
            if  ( isset($_REQUEST['id']) ) {
                $id = $_REQUEST['id'];
            }
            if  ( isset($_REQUEST['granularity']) ) {
                $granularity = $_REQUEST['granularity'];
            }
            $rows = $this->kyos_model->list_volumes($id);
            include_once('kyos_view_volumes.php');
        }
    }

    $a = new Kyos_list_volumes();