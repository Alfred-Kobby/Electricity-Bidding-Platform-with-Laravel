<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PowerDemand;

class ChatDataController extends Controller
{
    function getDemandData() 
    {
    	$data_array1 = array();
    	$data_array2 = array();
    	$data_array3 = array();

    	$demand_array1 = PowerDemand::select('_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', '_12', '_13', '_14', '_15', '_16', '_17', '_18', '_19', '_20', '_21', '_22', '_23', '_24')
                     ->where('customer_id', '1')
                     ->get();
        $demand_array2 = PowerDemand::select('_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', '_12', '_13', '_14', '_15', '_16', '_17', '_18', '_19', '_20', '_21', '_22', '_23', '_24')
                     ->where('customer_id', '2')
                     ->get();
        $demand_array3 = PowerDemand::select('_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', '_12', '_13', '_14', '_15', '_16', '_17', '_18', '_19', '_20', '_21', '_22', '_23', '_24')
                     ->where('customer_id', '3')
                     ->get();
        if (!empty($demand_array1)) {
        	foreach ($demand_array1 as $demand) {
        		array_push($data_array1, $demand);
        	}
        }

        if (!empty($demand_array2)) {
        	foreach ($demand_array2 as $demand) {
        		array_push($data_array2, $demand);
        	}
        }

        if (!empty($demand_array3)) {
        	foreach ($demand_array3 as $demand) {
        		array_push($data_array3, $demand);
        	}
        }


        $data_array = array(
        	'ecg_data' => $data_array1,
        	'nedco_data' => $data_array2,
        	'other_array' => $data_array3
        	);


        return $data_array;
    }
}
