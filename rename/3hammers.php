<?php

class Hammers {

    private static $hou = 0;
    private static $min = 0;
    private static $sec = 0;
    private static $totaltime = '00:00:00';
    static $file = "user.json";
    static $user, $return_data;

    function __construct() {
        
    }

    /*
     * @param1 : '2013-04-30 10:00:17'
     * @param2 : '2013-04-30 7:30:17'
     * @param2 : '%h:%i' / '%h:%i:%s'
     */

    public static function calculate_time_lap($time1, $time2, $formate = "%h:%i") {
        $datetime1 = date_create($time1);
        $datetime2 = date_create($time2);
        $interval = date_diff($datetime2, $datetime1);
        return $interval->format($formate);
    }

    public static function add_time($times) {
        
        if (is_array($times)) {

            $length = sizeof($times);
           
            for ($x = 0; $x < $length; $x++) {
                $split = explode(":", @$times[$x]);
                self::$hou += @$split[0];
                self::$min += @$split[1];
                // $this->sec += @$split[2];
            }
            
           
           
//            $seconds = $this->sec % 60;
//			$minutes = $this->sec / 60;
//			$minutes = (integer)$minutes;
            //$minutes += $this->min;
           $minutes = self::$min;

           $hours = intval($minutes) / intval(60);

            $minutes = $minutes % 60;
            $hours = (integer) $hours;
            $hours += self::$hou % 24;
            static::$totaltime = $hours . ":" . $minutes;
          
            return self::$totaltime;
        } else {
            return "Array Expected...";
        }
    }

    static function get_users() {
        self::$user = file_get_contents(self::$file);
        self::$user = json_decode(self::$user);
    }

    static function write_file($user) {
        // Write the contents back to the file
        return file_put_contents(self::$file, json_encode($user));
    }

    static function check_in() {
        $error = FALSE;
        $date = date('Y_m_d');
      
        self::get_users();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty($username)) 
        {
           
            self::set_current_dateTime();
            if (isset(self::$user->$date)) 
            {
                if (array_key_exists($username, self::$user->$date))
                {
                    // if user is already logged in
                    if (isset(self::$user->$date->$username->checked_in) && self::$user->$date->$username->checked_in == 1) {
                        $check_in_time = self::$user->$date->$username->check_in_time;
                        $check_out = self::$user->$date->$username->checked_out_time;
                        $worked_time    = @self::$user->$date->$username->worked_hours;

                        array_push($check_in_time, self::$return_data['time']);
                        unset(self::$user->$date->$username);

                        self::$user->$date->$username = (object) array(
                                    "check_in_time" => $check_in_time,
                                    'checked_in' => TRUE,
                                    'checked_out_time' => $check_out,
                                    'worked_hours' => $worked_time
                        );
                    } else {
                        unset(self::$user->$date->$username);
                        self::$user->$date->$username = (object) array(
                                    "check_in_time" => array(self::$return_data['time']),
                                    'checked_in' => TRUE,
                                    'checked_out_time' => FALSE
                        );
                    }
                } else {
                    self::$user->$date->$username = (object) array(
                                "check_in_time" => array(self::$return_data['time']),
                                'checked_in' => TRUE,
                                'checked_out_time' => FALSE
                    );
                }
            } 
            else {

                if(empty(self::$user)){
                    self::$user = new stdClass();
                }

                self::$user->$date = new stdClass();
                self::$user->$date->$username = (object) array(
                                "check_in_time" => array(self::$return_data['time']),
                                'checked_in' => TRUE,
                                'checked_out_time' => FALSE
                            );
            }
        } else {
            $error = true;
            $return_data['stat'] = "error";
            $return_data['msg'] = "Invalid Username...";
        }

        if (!$error) {
            if (self::write_file(self::$user)) {
                $return_data['stat'] = "ok";
                $return_data['msg'] = "You are now Checked In";
            } else {
                $return_data['stat'] = "error";
                $return_data['msg'] = "Some Error Occured. Try again...";
            }
        }

        echo json_encode($return_data);
    }

    static function check_out() {
        $error = FALSE;
        $date = date('Y_m_d');

        self::get_users();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty($username)) {
            self::set_current_dateTime();
            
            if(isset(self::$user->$date)){
                $check_in_time = self::$user->$date->$username->check_in_time;
                if (array_key_exists($username, self::$user->$date)) {
                    if (self::$user->$date->$username->checked_out_time != false) {
                        $check_out_time = self::$user->$date->$username->checked_out_time;
                        $worked_time    = self::$user->$date->$username->worked_hours;
                        
                        //print_r($worked_time);
                        
                        array_push($check_out_time, self::$return_data['time']);
                        unset(self::$user->$date->$username);
                        $time_lap = self::calculate_time_lap($check_in_time[count($check_in_time)- 1], $check_out_time[count($check_out_time) -1]);

                        self::$user->$date->$username = (object) array(
                                    "check_in_time" => $check_in_time,
                                    'checked_in' => TRUE,
                                    'checked_out_time' => $check_out_time,
                                    'worked_hours'     => self::add_time(array($worked_time,$time_lap))
                        );
                      
                    } else {

                        unset(self::$user->$date->$username);
                        self::$user->$date->$username = (object) array(
                                    "check_in_time" => $check_in_time,
                                    'checked_in' => TRUE,
                                    'checked_out_time' => array(self::$return_data['time']),
                                    'worked_hours'     => self::calculate_time_lap($check_in_time[count($check_in_time)- 1], self::$return_data['time'])
                        );
                    }
            }
            }
        }
        if (self::write_file(self::$user)) {
            $return_data['stat'] = "ok";
            $return_data['msg'] = "You are now Checked Out";
        } else {
            $return_data['stat'] = "error";
            $return_data['msg'] = "Some Error Occured. Try again...";
        }

        echo json_encode($return_data);
    }

    static function wellcome() {
        echo "You are wellcome";
    }

    static function set_current_dateTime() {
        $timezone = "Asia/Kathmandu";
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set($timezone);
        }
        self::$return_data['date'] = date('d-m-Y');
        self::$return_data['time'] = date('H:i:s');
    }

}