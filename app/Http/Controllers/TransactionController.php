<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use stdClass;

class TransactionController extends Controller
{

    private function GenerateTime($hour, $min)
    {
        $time = "";
        if($hour < 10){
            $time .= 0;
        }

        $time .= $hour.":";
        if($min < 10){
            $time .= 0;
        }

        $time .= $min;
        return $time;
    }

    public function viewDetailTransaction($id)
    {
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        $transaction = Transaction::where('id', '=', $id)->first();
        $aip_list = Storage::disk('local')->get('airports.json');
        $aip_list = json_decode($aip_list);

        $departure = new stdClass();
        $departure->code = "";
        $departure->city = "";
        $departure->airport = "";
        $arrival = new stdClass();
        $arrival->code = "";
        $arrival->city = "";
        $arrival->airport = "";

        foreach ($aip_list as $data) {
            if ($data->code == $transaction->departure) {
                $departure->code = $data->code;
                $departure->city = $data->city;
                $departure->airport = $data->name;
            } else if ($data->code == $transaction->arrival) {
                $arrival->code = $data->code;
                $arrival->city = $data->city;
                $arrival->airport = $data->name;
            }
            if ($departure->city != "" && $arrival->city != "") break;
        }

        $api = new APIController();
        $data = $api->RetrieveFlightData($transaction->booking_code, $transaction->last_name);
        $flight = $api->RetrieveFlightInfo($data->flightNo);
        $departure->schedule = $this->GenerateTime($flight->departureSchedule->hour, $flight->departureSchedule->min);
        $arrival->schedule = $this->GenerateTime($flight->arrivalSchedule->hour, $flight->arrivalSchedule->min);

        return view('user/order-detail', ['name' => $name, 'item' => $transaction, 'departure' => $departure, 'arrival' => $arrival, 'data' => $data]);
    }
}
