<?php

namespace App\Services;

class Calculation
{

    public static function checkWorklevel($worklevel) {

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

        return $worklevelstr;

    }

    public static function calBMR($gender, $weight, $height, $age) {

        //基礎代謝量の計算
        if ($gender == "男性") {
            $bmr = 13.397 * $weight + 4.799 * $height - 5.677 * $age + 88.362;
        } else {
            $bmr = print(9.247 * $weight + 3.098 * $height - 4.33 * $age + 447.593);
        }

        return $bmr;
    }

    public static function calTdee($worklevel, $bmr) {

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

        return $tdee;

    }

    public static function calPerDay($gweight, $weight, $day, $tdee) {

        //1日あたりの摂取カロリーの計算
        define('kcalperkg', 7200);
        $plus = $gweight - $weight;
        $plus *= kcalperkg;
        $lastday = $plus / $day;
        $calperday = $tdee + $lastday;

        return $calperday;

    }

}
