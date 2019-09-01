<html>
<head>

</head>
<body>
<div id='btn'>button!!!</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
window.onload = function() {
    if(navigator.geolocation) {//whether use Geolocation API
        function postData(pos) {
            $.ajax({
                url: './gps_insert.php',
                type: 'POST',
                dataType: 'json',
                data : {
                    latitude: pos.coords.latitude,
                    longitude: pos.coords.longitude
                }
            })
            console.log('submit');
        }
        var option = {
            'enableHighAccuracy': false,
            'maximumAge': 10000,
        } ;
        id = navigator.geolocation.watchPosition(postData,null,option);
        $('#btn').on('click', function() {
            navigator.geolocation.clearWatch(id);
            console.log('fin.');
        });
    } else {
        alert('Geolocation API対応ブラウザでアクセスしてください。');
    }
}

</script>
</body>
</html>