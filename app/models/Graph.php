<?php
/**
 * Created by PhpStorm.
 * User: heilju
 * Date: 16.01.15
 * Time: 19:14
 */

use Carbon\Carbon;


class Graph {

    public function getGraphData($xAxis, $yAxis, Carbon $fromDate, Carbon $toDate, $skip = 1)
    {
        // set return array to 0
        $aGraphData = array();

        // set time for exection time calculation
        $queryStart = microtime(true);

        // query database for specified date/time range
        Log::debug('Querying database for values between ' . $fromDate . ' and ' . $toDate);
        $aDataPoints = DB::table('values')->whereBetween('created_at', array($fromDate,$toDate))->orderBy('created_at','asc')->get(array($xAxis, $yAxis));

        // set time for exection time calculation
        $queryEnd = microtime(true);

        $i = 0;

        // set time for exection time calculation
        $loopStart = microtime(true);

        // loop through object and convert date string to unix timestamp
        foreach($aDataPoints as $oDataPoint)
        {
            // if skip is set to 1 all values will be returned.
            if($i++ % $skip == 0)
            {
                $aGraphData [] = array(strtotime($oDataPoint->$xAxis), (float) $oDataPoint->$yAxis);
            }
        }

        // set time for execution time calculation
        $loopEnd = microtime(true);

        // doing time calculation
        $loopDuration = $loopEnd - $loopStart;
        $queryDuration = $queryEnd - $queryStart;
        $totalDuration = $loopDuration + $queryDuration;

        // logging execution times
        Log::debug('Query took '. $queryDuration . ', Loop took ' . $loopDuration . '. Total execution: ' . $totalDuration);

        return $aGraphData;
    }
}