$('.form-group').on('input', function () {
    var grandTotal=0;
    var total = 0;

//Transport
    var subTotal = 0;
    var inputVal = $('#trspt-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal = parseFloat(inputVal);
    }
    total += subTotal;
    $('#trspt-tht').val(subTotal);
    
//Tiket/tiket
    var subTotal = 0;
    var inputVal = $('#tkt-ht').val();
    var inputVal2 = $('#tkt-htp').val();
    if ($.isNumeric(inputVal2) && $.isNumeric(inputVal)) {
        subTotal = parseFloat(inputVal) + parseFloat(inputVal2);
    }
    grandTotal += subTotal;
    $('#tkt-tht').val(subTotal);
    
    //Penginapan/pgp
    var subTotal = 0;
    var inputVal = $('#pgp-jml').val();
    if ($.isNumeric(inputVal)) {
        subTotal += parseFloat(inputVal);
    }
    inputVal = $('#pgp-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal *= parseFloat(inputVal);
    }
    grandTotal += subTotal;
    $('#pgp-st').val(subTotal);

    //Representatif / rpr
    var subTotal = 0;
    var inputVal = $('#rpr-jml').val();
    if ($.isNumeric(inputVal)) {
        subTotal += parseFloat(inputVal);
    }
    inputVal = $('#rpr-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal *= parseFloat(inputVal);
    }
    total += subTotal;
    $('#rpr-st').val(subTotal);

    
    //                Harian Normal/hn
    var subTotal = 0;
    var inputVal = $('#hn-jml').val();
    if ($.isNumeric(inputVal)) {
        subTotal += parseFloat(inputVal);
    }
    inputVal = $('#hn-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal *= parseFloat(inputVal);
    }
    total += subTotal;
    $('#hn-st').val(subTotal);

//                Full Board/fb
    var subTotal = 0;
    var inputVal = $('#fb-jml').val();
    if ($.isNumeric(inputVal)) {
        subTotal += parseFloat(inputVal);
    }
    inputVal = $('#fb-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal *= parseFloat(inputVal);
    }
    total += subTotal;
    $('#fb-st').val(subTotal);


//   Full Day/fd
    var subTotal = 0;
    var inputVal = $('#fd-jml').val();
    if ($.isNumeric(inputVal)) {
        subTotal += parseFloat(inputVal);
    }
    inputVal = $('#fd-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal *= parseFloat(inputVal);
    }
    total += subTotal;
    $('#fd-st').val(subTotal);

//                Diklat/dkl
    var subTotal = 0;
    var inputVal = $('#dkl-jml').val();
    if ($.isNumeric(inputVal)) {
        subTotal += parseFloat(inputVal);
    }
    inputVal = $('#dkl-ht').val();
    if ($.isNumeric(inputVal)) {
        subTotal *= parseFloat(inputVal);
    }
    total += subTotal;
    $('#dkl-st').val(subTotal);

// Total Uang Report


//  Total Uang Harian
    $('#result').val(total);
    grandTotal+=total;
    
//  Total Keseluruhan
    $('#t_keseluruhan').val(grandTotal);
    terbilang();
});