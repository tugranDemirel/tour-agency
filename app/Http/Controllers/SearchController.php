<?php

namespace App\Http\Controllers;

use App\Enum\CarEnum;
use App\Models\CityLocationCarPrice;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'pickuplocation' => 'required',
            'dropofflocation' => 'required',
            'adults_2' => 'required',
            'children_2' => 'required',
            'start_date' => 'required',
        ]);
        $data = $request->except('_token');

        if ($data['type'] == 'one-way')
        {
            $cars = CityLocationCarPrice::query();
            $personCount = $data['adults_2'] + $data['children_2'];
            $cars = $cars->where('city_location_id', $data['pickuplocation'])
                ->where('parent_city_location_id', $data['dropofflocation']);

            if ($personCount <=4)
                $cars = $cars->where('person_count', '<=', 4);
            else
                $cars = $cars->where('person_count', '>', 4);

            $cars = $cars->with(['car' => function($query){
                $query->where('is_active', CarEnum::IS_ACTIVE);
            }])
                ->orderBy('price', 'ASC')
                ->get();

            $childSeat = $request->has('child_seat') && $request->child_seat == 'on' ? true : false;
            return view('search', compact('cars', 'childSeat', 'data', 'personCount',));
        }
        elseif($data['type'] == 'round')
        {
            $request->validate([
                'pickuplocation' => 'required',
                'dropofflocation' => 'required',
                'adults_2' => 'required',
                'children_2' => 'required',
                'start_date' => 'required',
                'round_pickuplocation' => 'required',
                'round_dropofflocation' => 'required',
                'round_adults_2' => 'required',
                'round_children_2' => 'required',
                'round_start_date' => 'required',
            ]);
            $cars = CityLocationCarPrice::query();
            $round = CityLocationCarPrice::query();
            $round = $round->where('city_location_id', $data['round_pickuplocation'])
                ->where('parent_city_location_id', $data['round_dropofflocation']);

            $round_personCount = $data['round_adults_2'] + $data['round_children_2'];

            if ($round_personCount <=4)
                $round = $round->where('person_count', '<=', 4);
            else
                $round = $round->where('person_count', '>', 4);

            $rounds = $round->with(['car' => function($query){
                    $query->where('is_active', CarEnum::IS_ACTIVE);
                }])
                ->orderBy('price', 'desc')
                ->get();
            $personCount = $data['adults_2'] + $data['children_2'];
            $cars = $cars->where('city_location_id', $data['pickuplocation'])
                ->where('parent_city_location_id', $data['dropofflocation']);

            if ($personCount <=4)
                $cars = $cars->where('person_count', '<=', 4);
            else
                $cars = $cars->where('person_count', '>', 4);

            $cars = $cars->with(['car' => function($query){
                $query->where('is_active', CarEnum::IS_ACTIVE);
            }])
                ->orderBy('price', 'ASC')
                ->get();

            $childSeat = $request->has('child_seat') && $request->child_seat == 'on' ? true : false;
            $round_childSeat = $request->has('round_child_seat') && $request->child_seat == 'on' ? true : false;
            return view('search', compact('cars', 'childSeat', 'rounds', 'round_childSeat', 'data', 'personCount', 'round_personCount'));
        }


    }
}
