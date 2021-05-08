<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //性別
        $gender = $inputs['gender'];
        //年齢
        $age = (int) $inputs['age'];
        //身長
        $height = (int) $inputs['height'];
        //体重
        $weight = (int) $inputs['weight'];
        //運動量
        $worklevel = $inputs['worklevel'];

        if ($worklevel == 0){
            $worklevelstr = 'ほとんど運動しない';
        } elseif ($worklevel == 1) {
            $worklevelstr = '軽い運動';
        } elseif ($worklevel == 2) {
            $worklevelstr = '中程度の運動';
        } elseif ($worklevel == 3) {
            $worklevelstr = '激しい運動';
        } else {
            $worklevelstr = '非常に激しい運動';
        }
        //目標体重
        $gweight = (int) $inputs['gweight'];
        //達成までの日数
        $day = (int) $inputs['day'];

        //基礎代謝量の計算
        if ($gender == "男性") {
            $bmr = 13.397 * $weight + 4.799 * $height - 5.677 * $age + 88.362;
        } else {
            $bmr = print(9.247 * $weight + 3.098 * $height - 4.33 * $age + 447.593);
        }

        //消費カロリーの計算
        if ($worklevel == 0){
            $tdee = $bmr * 1.2;
        } elseif ($worklevel == 1) {
            $tdee = $bmr * 1.375;
        } elseif ($worklevel == 2) {
            $tdee = $bmr * 1.55;
        } elseif ($worklevel == 3) {
            $tdee = $bmr * 1.725;
        } else {
            $tdee = $bmr * 1.9;
        }

        //1日あたりの摂取カロリーの計算
        define('kcalperkg', 7200);
        $plus = $gweight - $weight;
        $plus *= kcalperkg;
        $lastday = $plus / $day;
        $calperday = $tdee + $lastday;

        return view('calculator.result', compact('gender', 'age', 'height', 'weight', 'worklevel', 'worklevelstr', 'gweight', 'day', 'bmr', 'tdee', 'calperday'));
    }
}
