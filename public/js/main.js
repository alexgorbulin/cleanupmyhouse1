//$('form.ajax').submit(function (e) {
//    e.preventDefault(); // avoid to execute the actual submit of the form.
//    var form = $(this)
//        , url = form.attr('action')
//        , type = form.attr('method')
//        , data = {};
//    form.find('[name]').each(function (index, value) {
//        var form = $(this)
//            , name = form.attr('name')
//            , value = form.val();
//        data[name] = value;
//        //alert(value);
//    });
//    //    console.log(data);
//    $.ajax({
//        type: type
//        , url: url
//        , data: data
//        , success: function () {
//            // alert(data); // show response from the php script.
//            $(".ajax")[0].reset();
//            $("#sum").text('');
//            $('#addService ').empty(); //clear additional services list
//            $(".toggle").removeClass('toggleClick'); // clear extra buttons
//            $(".alert").fadeIn();
//            $(".alert").delay(1500).fadeOut(2000);
//            totalExtraPrice = 0;
//            regPrice = 0;
//            for (var i = 0; i < $('.toggle').length; i++) {
//                $('.toggle').attr('data-state', 0);
//            }
//        }
//    }); // data: form.serialize(), // serializes the form's elements.
//
//});
//window.onscroll = function () {
//    myFunction()
//};
//var header = document.getElementById("myTotal");
//var sticky = header.offsetTop;
//
//function myFunction() {
//    if (window.pageYOffset > sticky) {
//        header.classList.add("sticky");
//    } else {
//        header.classList.remove("sticky");
//    }
//}