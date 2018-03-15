<?php

    class Kyos_summary_volumes {

        function __construct() {
            include_once('kyos_model.php');
            $this->kyos_model = new Kyos_model();

            $this->index();
        }

        function index() {
            $rows = $this->kyos_model->summary_volumes();
            include_once('kyos_view_summary.php');
        }
    }

    $a = new Kyos_summary_volumes();