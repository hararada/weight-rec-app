{{-- 性別 --}}
$gender = {{ $inputs['gender'] }};
{{-- 年齢 --}}
$age = {{ $inputs['age'] }};
$age = mb_convert_kana($age, 'n', 'UTF-8');
{{-- 身長 --}}
$height = {{ $inputs['height'] }};
$height = mb_convert_kana($height, 'n', 'UTF-8');
{{-- 体重 --}}
$weight = {{ $inputs['weight'] }};
$weight = mb_convert_kana($weight, 'n', 'UTF-8');
{{-- 運動量 --}}
$worklevel = {{ $inputs['worklevel'] }};
{{-- 目標体重 --}}
$gweight = {{ $inputs['gweight'] }};
$gweight = mb_convert_kana($gweight, 'n', 'UTF-8');
{{-- 達成までの日数 --}}
$day = {{ $inputs['day'] }};
$day = mb_convert_kana($day, 'n', 'UTF-8');

{{-- 基礎代謝量(BMR)の計算 --}}

@if(isset($gender) == "男性")
    $bmr = 13.397 * $weight + 4.799 * $height - 5.677 * $age + 88.362;
@else
    $bmr = print(9.247 * $weight + 3.098 * $height - 4.33 * $age + 447.593);
@endif

{{-- 消費カロリ(TDEE)ーの計算--}}
@if(isset($worklevel) == 0)
    $tdee = $bmr * 1.2;
@elseif (isset($worklevel) == 1)
    $tdee = $bmr * 1.375;
@elseif (isset($worklevel) == 2)
    $tdee = $bmr * 1.55;
@elseif (isset($worklevel) == 3)
    $tdee = $bmr * 1.725;
@else
    $tdee = $bmr * 1.9;
@endif

{{-- 1日あたりの摂取カロリーの計算 --}}
define('kcalperkg', 7200);
$plus = $gweight - $weight;
$plus *= kcalperkg;
$lastday = $plus / $day;
