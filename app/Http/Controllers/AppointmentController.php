<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CityLocationCarPrice;
use App\Models\TransactionAssignment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{


    public function create(Request $request)
    {
        $request->validate([
            'one_way_location'=>'required',
        ]);
         session()->put('appointment', $request->except('_token'));

        return redirect()->route('front.appointment.to');
    }

    public function to(Request $request)
    {
        $appointment = session()->get('appointment');
        if (empty($appointment['one_way_location'])) {
            return redirect()->route('front.index');
        }
        $appointment['oneWayLocation'] = CityLocationCarPrice::where('id', $appointment['one_way_location'])
                ->first();

        $appointment['car'] = Car::where('id', $appointment['car_id'])
                ->first();
        if (!empty($appointment['round_location']))
            $appointment['roundLocation'] = CityLocationCarPrice::where('id', $appointment['round_location'])
                ->first();
        if (!empty($appointment['round_car_id']))
            $appointment['roundCar'] = Car::where('id', $appointment['round_car_id'])
                ->first();
        if (!$appointment) {
            return redirect()->route('front.index');
        }
        return view('appointment', compact('appointment'));
    }

    public function payment(Request $request)
    {
        $appointment = session()->get('appointment');
        if (!$appointment['one_way_location']) {
            return redirect()->route('front.index');
        }
        $appointment['oneWayLocation'] = CityLocationCarPrice::where('id', $appointment['one_way_location'])
            ->first();

        $appointment['car'] = Car::where('id', $appointment['car_id'])
            ->first();
        if (!empty($appointment['round_location']))
            $appointment['roundLocation'] = CityLocationCarPrice::where('id', $appointment['round_location'])
                ->first();
        if (!empty($appointment['round_car_id']))
            $appointment['roundCar'] = Car::where('id', $appointment['round_car_id'])
                ->first();
        if (!$appointment) {
            return redirect()->route('front.index');
        }
        return view('payment', compact('appointment'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'address_2' => 'nullable',
            'city' => 'nullable',
            'flight_number' => 'nullable',
            'hotel_name' => 'nullable',
            'passenger_name' => 'nullable',
            'transfer_note' => 'nullable',
            'order_note' => 'nullable',
            'payment_method' => 'required',
        ]);

        $appointment = session()->get('appointment');

        $data['name'] = $data['name'].' '.$data['surname'];
        unset($data['surname']);
        $data['city_location_car_price_id'] = $appointment['one_way_location'];

        $data['car_id'] = $appointment['car_id'];

        $location = CityLocationCarPrice::where('id', $appointment['one_way_location'])
            ->first();

        if(!empty($appointment['child_seat']))
        {
            $data['price'] = $location->price;
            $data['child_seat'] = true;
        }
        else
        {
            $data['price'] = $location->price;
            $data['child_seat'] = false;
        }

        $data['adults_2'] = $appointment['adults_2'];
        $data['children_2'] = $appointment['children_2'];
        $data['start_date'] = $appointment['start_date'];

        if (!empty($appointment['round_location']))
        {
            $data['round_city_location_car_price_id'] = $appointment['round_location'];
            $roundLocation = CityLocationCarPrice::where('id', $appointment['round_location'])
                ->first();
            if (!empty($appointment['round_car_id']))
                $data['round_car_id'] = $appointment['round_car_id'];

            if (!empty($appointment['round_child_seat']))
            {
                // round_price = return_price
                $data['return_price'] = $roundLocation->price;
                $data['round_child_seat'] = true;
            }
            else
            {
                $data['return_price'] = $roundLocation->price;
                $data['round_child_seat'] = false;
            }


            if(!empty($appointment['round_children_2']))
                $data['round_children_2'] = $appointment['round_children_2'];

            if(!empty($appointment['round_adults_2']))
                $data['round_adults_2'] = $appointment['round_adults_2'];


            if (!empty($appointment['round_start_date']))
                $data['round_start_date'] = $appointment['round_start_date'];
        }
        $data['total_price'] = $data['price'] + (isset($data['return_price']) && !empty($data['return_price']) ? $data['return_price'] : 0);


        $create = TransactionAssignment::create($data);
        if ($create) {
            session()->forget('appointment');
            return redirect()->route('front.index')->with('success', 'Appointment created successfully.');
        } else {
            return redirect()->route('front.index')->with('error', 'Appointment could not be created.');
        }
        return redirect()->route('front.index');
    }



}
