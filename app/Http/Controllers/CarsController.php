<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Exception;
use Illuminate\Http\Request;


class CarsController extends Controller
{
    public function getCars(Request $request)
    {
        return new CarCollection(Car::with('user')->get());
    }
    
    public function getCar(Request $request)
    {
        try {
            return new CarResource(Car::with('user')->findOrFail($request->id));
        } catch (Exception) {
            return response()->json(['message' => 'машина не найдена'], 404);
        }
    }

    public function setCar(Request $request)
    {
        $car = Car::findOrFail($request->id);
        if ($car->using) return response()->json(['message' => 'машина занята'], 404);
        $car->using = true;
        $car->user_id = 1; //на практике тут подставим id того кто прислал запрос, а так вставляем вручную :3
        $car->save();
        return new CarResource(Car::with('user')->find($car->id));
    }
    
    public function freeCar(Request $request)
    {
        $car = Car::findOrFail($request->id);
        if ($car->user_id != 1) return response()->json(['message' => 'машина не ваша'], 404);
        $car->using = false;
        $car->user_id = null; 
        $car->save();
        return new CarResource(Car::with('user')->find($car->id));
    }
}
