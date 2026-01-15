<?php
function searchCityTime($city_name)
{
    require('config/cities.php');

    // ★ OpenWeather APIキー（自由に差し替えOK：キー名は変えない）
    $api_key = "あなたのAPIキー";

    foreach ($cities as $city) {
        if ($city['name'] === $city_name) {

            // ▼ 現地時間（あなたの元のコードそのまま）
            $date_time = new DateTime('now', new DateTimeZone($city['time_zone']));
            $time = $date_time->format('H:i');
            $city['time'] = $time;

            // ▼ サマータイム判定（あなたのコードそのまま）
            $tokyo_tz = new DateTimeZone('Asia/Tokyo');
            $city_tz  = new DateTimeZone($city['time_zone']);
            $now_utc = new DateTime('now', new DateTimeZone('UTC'));

            $offset_city  = $city_tz->getOffset($now_utc);
            $offset_tokyo = $tokyo_tz->getOffset($now_utc);

            $in_dst = $city_tz
                ->getTransitions($now_utc->getTimestamp(), $now_utc->getTimestamp())[0]['isdst'];

            if ($in_dst) {
                $city['dst'] = "（サマータイム中）";
            } else {
                $city['dst'] = "";
            }

            // ▼ 時差（あなたのコードそのまま）
            $diff = ($offset_city - $offset_tokyo) / 60;

            if($diff >= 0) {
                $sign = '進んでいる';
            } else {
                $sign = '遅れている';
            }
            $abs = abs($diff);
            $h = floor($abs / 60);
            $m = $abs % 60;

            $city['difference'] = sprintf("日本より%d時間%d分%s", $h, $m, $sign);

            $query_city = urlencode($city['name']);
            $url = "https://api.openweathermap.org/data/2.5/weather?q={$query_city}&appid={$api_key}&units=metric&lang=ja";

            $json = @file_get_contents($url);
            if ($json !== false) {
                $weather = json_decode($json, true);

                if (isset($weather['weather'][0]['description'])) {
                    $city['weather'] = $weather['weather'][0]['description']; // 天気の説明
                    $city['temp'] = $weather['main']['temp']; // 気温
                } else {
                    $city['weather'] = "天気情報なし";
                    $city['temp'] = "";
                }
            } else {
                $city['weather'] = "天気情報なし";
                $city['temp'] = "";
            }



            return $city;
        }
    }
}






