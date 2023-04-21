<?php 

if(!function_exists('get_time')){

    function get_time($time){
        $ticketTime = strtotime($time);
        
        // This difference is in seconds.
        $difference =  time() - $ticketTime;


        $minuts = round($difference / 60);

        $hours = round($difference / 3600);

        $days = round($difference / 86400);

        $week = round($days / 7);

        if ($minuts < 60) {
          $time = $minuts . "Minit ago";
        } else if ($minuts >= 60 and $hours < 24) {
          $time = $hours . "Hour ago";
        } elseif ($hours > 24 and $days < 7) {
          $time = $days . "Day ago";
        } elseif ($days > 7) {
          $time = $week . " Week ago";
        } else {
          $time = "just now";
        }
        return $time;
    }
}