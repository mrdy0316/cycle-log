<html>
<head>

</head>
<body>
<div id='btn'></div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
window.onload = function() {
    var btnTxtOff = 'START';
    var btnTxtOn = 'STOP';
    var btnFlag = false;//off
    var btn = $('#btn');
    btn.text(btnTxtOff);
    btn.on('click', function() {
        if(btnFlag == false) {
            if(navigator.geolocation) {//whether user can use Geolocation API
                btnFlag = true;
                btn.text(btnTxtOn);
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
                }
                var option = {
                    'enableHighAccuracy': false,
                    'maximumAge': 10000,
                } ;
                id = navigator.geolocation.watchPosition(postData,null,option);
            } else {
                alert('Geolocation API対応ブラウザでアクセスしてください。');
            }
        } else {
            btnFlag = false;
            btn.text(btnTxtOff);
            navigator.geolocation.clearWatch(id);
        }
    })
}
</script>
</body>
</html>