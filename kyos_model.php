<?php

    class Kyos_model {

        var $profiles = array();
        var $volumes = array();

        var $entities = array( 1 => 'Dutch'
                             , 2 => 'British'
                             , 3 => 'Macedonian'
                             , 4 => 'Arab');

        var $commodities = array( 1 => 'Power'
                                , 2 => 'Gas'
                                , 3 => 'Oil'
                                , 4 => 'Milk');

        function __construct() {
            $this->profiles[] = array( 'id' => 1
                                     , 'name' => 'Arab Oil'
                                     , 'start_date' => strtotime('01-09-2015 GMT')
                                     , 'end_date' => strtotime('31-12-2015 GMT')
                                     , 'entity' => 4
                                     , 'commodity' => 3);

            $this->profiles[] = array( 'id' => 2
                                     , 'name' => 'British Oil'
                                     , 'start_date' => strtotime('01-01-2015 GMT')
                                     , 'end_date' => strtotime('30-06-2016 GMT')
                                     , 'entity' => 2
                                     , 'commodity' => 3);

            $this->profiles[] = array( 'id' => 4
                                     , 'name' => 'Dutch Gas'
                                     , 'start_date' => strtotime('01-01-2013 GMT')
                                     , 'end_date' => strtotime('31-12-2014 GMT')
                                     , 'entity' => 1
                                     , 'commodity' => 2);

            $this->profiles[] = array( 'id' => 3
                                     , 'name' => 'British Power'
                                     , 'start_date' => strtotime('01-01-2015 GMT')
                                     , 'end_date' => strtotime('31-12-2015 GMT')
                                     , 'entity' => 2
                                     , 'commodity' => 1);

            $this->load_volumes();
        }

        public function load_volumes() {
            $handle = @fopen("volumes.csv", "r");
            if ($handle) {
                while (($line = fgets($handle) ) !== false) {
                    $volume = explode(';', $line );
                    $this->volumes[] = array( 'profile_id' => $volume[0]
                                            , 'datetime' => $volume[1]
                                            , 'volume' => $volume[2]);
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() fail\n";
                }
                fclose($handle);
            } else {
                echo "File not found";
            }
        }

        public function list_rows($params = array()) {
            $output = array();
            foreach ($this->profiles as $key => $value) {
                if ( isset($params['entity']) && $value['entity'] != $params['entity'] ) {
                    continue;
                }
                if ( isset($params['commodity']) && $value['entity'] != $params['commodity'] ) {
                    continue;
                }
                if ( isset($params['start_date']) && $value['start_date'] < strtotime($params['start_date']) ) {
                    continue;
                }
                if ( isset($params['end_date']) && $value['end_date'] > strtotime($params['end_date']) ) {
                    continue;
                }
                $output[] = $value;
            }

            return $output;
        }

        public function list_volumes($id, $granularity = 'hourly') {
            $output = array();
            foreach ($this->volumes as $key => $value) {
                if ( $value['profile_id'] != $id ) {
                    continue;
                }
                $output[] = $value;
            }

            return $output;
        }

    }