<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$api_key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImE4YzQ4NDYwLTM0ZDMtNDdkNS1hMzAxLTllM2JiMDNkNGRhOSIsImlhdCI6MTc0MTQ2Njc1MSwic3ViIjoiZGV2ZWxvcGVyL2IyYThlOWUwLWExMjktNDZhOS00MGFiLTAzZGYzMTVjYmMyNyIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjIwMy4xOTIuMjUzLjIwMiJdLCJ0eXBlIjoiY2xpZW50In1dfQ.TWzAjjXYQWNmeq0nMBMHS6ayahswRh3Z1NM_dG7dL61qBOSldvWKU1TFyC-i8YCEypwb6oDQLdXHddcQLDX40A";  // Replace with your actual API key
$player_tag = isset($_GET['tag']) ? $_GET['tag'] : '';

if (!$player_tag) {
    echo json_encode(["error" => "Player tag is required"]);
    exit;
}

$url = "https://api.clashofclans.com/v1/players/%23" . urlencode($player_tag);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer " . $api_key]);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
