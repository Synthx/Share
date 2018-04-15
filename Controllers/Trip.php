<?php

namespace Controllers;

use App\Request;

use Models\{Trip as TripManager, User as UserManager};

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
        ], 'trip.search');

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

        return view('trip.list', compact('trips', 'total', 'request'));
    }

    public function showDetail()
    {
        $request = new Request;

        $this->validate($request, [
            'id' => 'required|num|exist:trips,id'
        ], 'trip.search');

        $trip = TripManager::find($request->id);
        $driver = UserManager::find($trip->driver);

        return view('trip.detail', compact('trip', 'driver'));
    }

    public function reservePlace()
    {
        $request = new Request;

        $this->validate($request, [
            'id' => 'required|num|exist:trips,id'
        ]);

        $trip = TripManager::find($request->id);
        $passengers = (empty($trip->passengers)) ? [] : explode(',', $trip->passengers);

        if (in_array(user()->id, $passengers))
            return redirect()->route('trip.search');

        array_push($passengers, user()->id);

        TripManager::where('id', $trip->id)->update([
            'passengers' => implode(',', $passengers),
            'remaining' => $trip->remaining - 1
        ]);

        return redirect()->with(['success' => 'Vous vous êtes inscrit avec succès au trajet séléctionné.'])->route('user.dashboard.reservations');
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
        $post_date = new \DateTime('NOW');

        $e_origin = explode(',', $request->origin);
        $e_destination = explode(',', $request->destination);

        TripManager::add([
            'driver' => user()->id,
            'origin' => $request->origin,
            'origin_city' => $e_origin[count($e_origin) - 2],
            'destination' => $request->destination,
            'destination_city' => $e_destination[count($e_destination) - 2],
            'post_date' => $post_date->format('Y-m-d'),
            'date' => $date->format('Y-m-d H:i:s'),
            'price' => $request->price,
            'places' => $request->places,
            'remaining' => $request->places,
            'comment' => $request->comment
        ]);

        UserManager::where('id', user()->id)->update([
            'number_trips' => user()->number_trips + 1,
        ]);

        return redirect()->with(['success' => 'Votre trajet a été ajouté avec succès.'])->route('user.dashboard.trips');
    }
}