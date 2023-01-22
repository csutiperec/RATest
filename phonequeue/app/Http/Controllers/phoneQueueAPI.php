<?php

namespace App\Http\Controllers;

class phoneQueueAPI extends Controller
{
    function getOpenTimesAsList($TimesArray) {
        $returnableArray = [];
        $data = json_decode($TimesArray)->times;
        $startTime = $data[0]->time;
        $arrayLength = count($data);
        $totalOpenHours = $data[0]->open? 1 : 0;

        for ($i=1; $i < $arrayLength; $i++) {
            if($data[$i]->open) $totalOpenHours++;
            if($data[$i-1]->open != $data[$i]->open) {
                array_push($returnableArray, 'From ' . $startTime . ' - ' . $data[$i]->time . ' - ' . ($data[$i-1]->open? 'open' : 'closed'));
                $startTime = $data[$i]->time;
            }
        }
        array_push($returnableArray, 'From ' . $startTime . ' - 24:00 - ' . ($data[$arrayLength-1]->open? 'open' : 'closed'));
        array_push($returnableArray, 'Total open hours: ' . $totalOpenHours . '.');
        return $returnableArray;
    }
}