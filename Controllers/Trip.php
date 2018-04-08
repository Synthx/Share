<?php

namespace Controllers;

use App\Request;

use Models\Trip as TripManager;

class Trip extends Controller
{
    public function showSearch()
    {
        return view('trip.search');
    }

    public function showList()
    {
        $request = new Request;

        $this->validate($request, [
            'origin' => 'required|string|address',
            'destination' => 'required|string|address',
            'date' => 'required|date'
        ]);

        $model = TripManager::where('origin', 'like', '%' . $request->origin . '%')->andWhere('destination', 'like', '%' . $request->destination . '%')->date('date', $request->date);

        if (auth())
            $model = $model->andWhere('driver', '!=', user()->id);

        switch ($request->order)
        {
            default:
            case 'date':
                $model = $model->orderBy('date');
            break;
            case 'price':
                $model = $model->orderBy('price');
            break;
        }

        $trips = $model->get();
        $total = $model->count();

        return view('trip.list', compact('trips', 'total'));
    }

    public function showDetail()
    {
        $request = new Request;

        $this->validate($request, [

        ]);

        $trip = [];

        return view('trip.detail', compact('trip'));
    }

    public function showAddForm()
    {
        return view('trip.add');
    }

    public function addTrip()
    {
        $request = new Request;

        $this->validate($request, [
            'origin' => 'required|address',
            'destination' => 'required|address',
            'date' => 'required|datetime',
            'price' => 'required|num|min:1',
            'places' => 'required|num|min:1|max:4'
        ]);

        $date = \DateTime::createFromFormat('d/m/Y H:i', $request->date);

        $e_origin = explode(',', $request->origin);
        $e_destination = explode(',', $request->destination);

        TripManager::add([
            'driver' => user()->id,
            'origin' => $request->origin,
            'origin_city' => $e_origin[count($e_origin) - 2],
            'destination' => $request->destination,
            'destination_city' => $e_destination[count($e_destination) - 2],
            'date' => $date->format('Y-m-d H:i:s'),
            'price' => $request->price,
            'places' => $request->places,
            'remaining' => $request->places,
            'comment' => $request->comment
        ]);

        return redirect()->route('user.dashboard.trips');
    }
}