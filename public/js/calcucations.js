$(function () {
    var $document = $(document),
        $inputRange = $('input[type="range"]');
    var price;
    var btn_fr = 10;
    var tmp;
    var totalExtraPrice = 0;
    var regPrice = 0;
    var addService = [];
    var addPriceService = [];
    var gl_room, gl_restroom, gl_price;
    /*************BEGINNING BUTTON GROUPT PROCENTAGE*************/
    $('#select_freq').change(function () {
        val = (document.getElementById('select_freq').value);
        console.log(val);
        if (val == 1) {
            $('#freq1').click();
        } else if (val == 2) {
            $('#freq2').click();
        } else if (val == 3) {
            $('#freq3').click();
        } else if (val == 4) {
            $('#freq4').click();
        };
    });
    /*******************************************************************************************/
    $("div.btn-group[role='group'] button.btn-default.btn").click(function () {
        $(".btn-group > button").removeClass("active");
        //   console.log(this);
        $(this).addClass("active");
        $('#detTimes').val($(this).text().replace(/\s+/, ""));
        btn_fr = $(this).val();
        regPrice = calculate(gl_room, gl_restroom, btn_fr);
        if ((document.getElementById('room').value != 0) || (document.getElementById('restroom').value != 0)) {
            $('#mainBTN span').text(" for $ " + price);
            $('#sum').val(totalExtraPrice + regPrice);
        } else {
            $('.help_msg').css('color', 'red');
            $('#mainBTN span').text("");
            $('#sum').val("");
        };
    });
    /****************END BUTTON GROUPT PROCENTAGE**************/
    /************BEGINNING SLIDERS AND BUTTON PRICE OUTPUT***********/
    function valueOutput(element) {
        var value = element.value,
            output = element.parentNode.getElementsByTagName('output')[0],
            room = document.getElementById('room').value;
        var restroom = document.getElementById('restroom').value;
        var $r = $('input[type=range]');
        //Set details values
        $('#detRoom').val(room);
        $('#detRroom').val(restroom);
        gl_room = room;
        gl_restroom = restroom;
        // calculate(room, restroom);
        regPrice = calculate(room, restroom, btn_fr);
        if (value == 0) {
            output.innerHTML = "Studio";
            $('#sum').val(totalExtraPrice + calculate(room, restroom, btn_fr));
        } else {
            output.innerHTML = value;
            $('#mainBTN span').text(" for $ " + calculate(room, restroom, btn_fr));
            $('#sum').val(totalExtraPrice + calculate(room, restroom, btn_fr));
        };
        $('#mainBTN span').text(" for $" + calculate(room, restroom, btn_fr));
        //        document.getElementById('price_sum').innerHTML = "$" + calculate(room, restroom, btn_fr);
        /*********BEGINNING UPDATE ROOM FROM EXTRA OPTIONS*********/
        $('#select_room').change(function () {
            val = document.getElementById('select_room').value;
            document.getElementById('room').value = val;
            $r.rangeslider('update', true);
            $('#mainBTN span').text(" for $" + calculate(val, restroom, btn_fr));
            document.getElementById('price_sum').innerHTML = "$" + calculate(val, restroom, btn_fr);
            if (val == 0) {
                $('#output1').html('Studio');
            } else {
                $('#output1').html(val);
            };
        });
        /*********END UPDATE ROOM FROM EXTRA OPTIONS*********/
        /*********BEGINNING UPDATE RESTROOM FROM EXTRA OPTIONS*********/
        $('#select_rroom').change(function () {
            val = document.getElementById('select_rroom').value;
            document.getElementById('restroom').value = val;
            $r.rangeslider('update', true);
            $('#mainBTN span').text(" for $" + calculate(room, val, btn_fr));
            // document.getElementById('mainBTN').innerHTML = "Book now for $" + calculate(room, val, btn_fr);
            document.getElementById('price_sum').innerHTML = "$" + calculate(room, val, btn_fr);
            $document.on('input', 'input[type="range"]', function (e) {});
            $('#output2').html(val);
            /*document.getElementById('room').value = document.getElementById('select_room').value;*/
        });
        /*********END UPDATE RESTROOM FROM EXTRA OPTIONS*********/
    }
    /************END SLIDERS AND BUTTON PRICE OUTPUT***********/
    /***********BEGINNING PRICE CALCULATION************************/
    function calculate(room = 1, restroom = 1, btn_fr = 10) {
        tmp = (room * 25) + (restroom * 20) + 110;
        price = tmp - (tmp * (btn_fr / 100));
        return price;
    };
    /**********************END PRICE CALCULATION*****************/
    $document.on('input', 'input[type="range"]', function (e) {
        valueOutput(e.target);
    });
    $inputRange.rangeslider({
        polyfill: false
    });
    /*---------------------------------------------------------*/
    /*----------------------EXTRA OPTIONS----------------------*/
    /*---------------------------------------------------------*/
    $('.toggle').click(function () {
        var name;
        var arr = new Object();
        var arrOfBtn = document.getElementsByClassName('toggle');
        $('#addService ').empty();
        $(this).toggleClass('toggleClick');
        name = this.getAttribute('data-name');
        if (this.classList.contains('toggleClick')) {
            totalExtraPrice = totalExtraPrice + parseInt(this.getAttribute('data-price'));
            price = price + parseInt(this.getAttribute('data-price'));
            this.setAttribute('data-state', 1);
            arrOfBtn[name] = 'active';
            arr[name] = 'active';
            this.value = this.getAttribute('data-price');
            console.log($(this).val());
        } else {
            totalExtraPrice = totalExtraPrice - parseInt(this.getAttribute('data-price'));
            this.setAttribute('data-state', 0);
            this.value = '';
            arrOfBtn[name] = 'not active';
            arr[name] = 'not active';
            price = price - parseInt(this.getAttribute('data-price'));
        }
        for (var i = 0; i < arrOfBtn.length; i++) {
            name = arrOfBtn[i].getAttribute('data-name');
            arr[name] = arrOfBtn[i].getAttribute('data-state');
        }
        for (var i in arr) {
            if (arr[i] > 0) {
                $('#addService').append('<span class="mr-1 d-flex sm-screen">' + i + ';' + '</span>');
            }
        }
        $('.hiddenInput').val(JSON.stringify(arr));
        $('#sum').val(totalExtraPrice + regPrice);
        console.log('totalExtraPrice=' + totalExtraPrice);
        console.log('regPrice=' + regPrice);
    });
    /*---------------------------------------------------------*/
    /*-------------------END EXTRA OPTIONS----------------------*/
    /*---------------------------------------------------------*/
    /*---------------------------------------------------------*/
    /*-------------------GET TODAYS DATE FOR CALENDAR----------*/
    /*---------------------------------------------------------*/
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
    /*---------------------------------------------------------*/
    /*-------------------END TODAYS DATE FOR CALENDAR----------*/
    /*---------------------------------------------------------*/
});
/*-----------------------------------------*/
/********************CHANGE ROOM FROM ADDITIONAL OPTIONS*******/
/*-----------------------------------------*/
$(document).ready(function () {
    $('form[name="qryform"]').submit(function (e) {
        e.preventDefault();
        var kvpairs = [];
        var form = $('form[name="qryform"]');
        for (var i = 0; i < document.qryform.elements.length; i++) {
            var e = document.qryform.elements[i];
            kvpairs.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(e.value));
        }
        var queryString = kvpairs.join("&");
    });
});