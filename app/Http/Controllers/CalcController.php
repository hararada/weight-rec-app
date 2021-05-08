<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calculation;

class CalcController extends Controller
{
    public function index()
    {
        return view('calculator.index');
    }

    public function result(Request $request)
    {
        //バリデーション
        $request->validate([
            'gender' => 'required',
            'age' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'worklevel' => 'required',
            'gweight' => 'required',
            'day' => 'required',
        ]);

        $inputs = $request->all();

        $gender = $inputs['gender'];
        $age = (int) $inputs['age'];
        $height = (int) $inputs['height'];
        $weight = (int) $inputs['weight'];
        $worklevel = $inputs['worklevel'];
        $worklevelstr = Calculation::checkWorklevel($worklevel);
        $gweight = (int) $inputs['gweight'];
        $day = (int) $inputs['gweight'];
        $bmr = Calculation::calBMR($gender, $weight, $height, $age);
        $tdee = Calculation::calTdee($worklevel, $bmr);
        $calperday = Calculation::calPerDay($gweight, $weight, $day, $tdee);

        return view('calculator.result', compact('gender', 'age', 'height', 'weight', 'worklevel', 'worklevelstr', 'gweight', 'day', 'bmr', 'tdee', 'calperday'));
    }
}
