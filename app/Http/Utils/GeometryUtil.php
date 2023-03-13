<?php

namespace App\Http\Utils;
class GeometryUtil
{
    public function getDistance($lat1, $lng1, $lat2, $lng2): float|int
    { // 위, 경도 거리 계산
        $earth_radius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lng2 - $lng1);
        $x = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $y = 2 * asin(sqrt($x));
        $z = $earth_radius * $y;
        return $z * 1000; // m 거리 반환
    }

    public function StDistance($StID, $lat1, $lng1): float|int|string
    {
        if (strlen($lat1) < 1 || strlen($lng1) < 1) {
            return "X";
        }
        $sql = "select latitude,longitude from Station where StID=?";
        $params = array($StID);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        if ($row = $stmt->fetch()) {
            return $this->getDistance($lat1, $lng1, $row[0], $row[1]);
        } else {
            return "X";
        }
    }
}
