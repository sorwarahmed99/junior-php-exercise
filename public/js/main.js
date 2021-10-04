
$(function(){
    $("#showUnixTime").click(function(){
        $(".times").show( "slow" );
        $("#showUnixTime").hide("slow");
        $("#hideUnixTime").show("slow");
    });

    $("#hideUnixTime").click(function(){
        $(".times").hide( "slow" );
        $("#hideUnixTime").hide("slow");
        $("#showUnixTime").show("slow");
    });

    $("#showEmails").click(function(){
        $(".emails").show("slow");
    });

    $("#showFlips").click(function(){
        $(".flips").show("slow");
    });
});

fetchUnixTimes();
fetchEmails();
fetchCoins();

function fetchUnixTimes() {
    $.ajax({
        type: "GET",
        url: "fetch-unix-time",
        dataType: "json",
        success: function (response) {
            $("#unixTable").html("");
            $.each(response.timestamps, function (key, item) {
                $('#unixTable').append('<tr>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm text-gray-900">'+ item.id + '</div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm text-gray-900"> '+ item.unix_time + ' </div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm font-medium text-gray-900">'+ item.converted_time + '</div>\
                        </td>\
                    </tr>'
                );
            });
        }
    });
}

function fetchEmails() {
    $.ajax({
        type: "GET",
        url: "fetch-emails",
        dataType: "json",
        success: function (response) {
            $("#emailsTable").html("");

            $.each(response.emails, function (key, item) {
                $('#emailsTable').append('<tr>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm text-gray-900">'+ item.id + '</div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm text-gray-900"> '+ item.input_email + ' </div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm font-medium text-gray-900">'+ item.is_valid + '</div>\
                        </td>\
                    </tr>'
                );
            });
        }
    });
}


function fetchCoins() {
    $.ajax({
        type: "GET",
        url: "fetch-coins",
        dataType: "json",
        success: function (response) {
            $("#coinsTable").html("");

            $.each(response.coins, function (key, item) {
                $('#coinsTable').append('<tr>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm text-gray-900">'+ item.id + '</div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm text-gray-900"> '+ item.number_of_flip + ' </div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm font-medium text-gray-900">'+ item.head + '</div>\
                        </td>\
                        <td class="px-5 py-3 whitespace-nowrap">\
                            <div class="text-sm font-medium text-gray-900">'+ item.tail + '</div>\
                        </td>\
                    </tr>'
                );
            });
        }
    });
}


$(".convert-unix-timestamp").click(function(event){
    event.preventDefault();

    let time = $("input[name=time]").val();
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/unix-converter",
        type:"POST",
        data:{
        time:time,
        _token: _token
        },
        success:function(response){
            if(response) {
                $('.success').text(response);
                $("#unixTimeForm")[0].reset();
            }
            fetchUnixTimes();
        },
    });
});

$(".validate-email").click(function(event){
    event.preventDefault();

    let email = $("input[name=email]").val();
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/email-validation",
        type:"POST",
        data: {
        email,
        _token
        },
        success:function(response){
            if(response) {
                $('.isValid').text(response);
                $("#emailValidateForm")[0].reset();
            }
            fetchEmails();
        },
    });
});

$(".flip").click(function(event){
    event.preventDefault();

    $(".coinResult").show("slow");

    let number = $("input[name=number]").val();
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
            url: "/flip-coin",
            type:"POST",
            data: {
            number,
            _token,
        },
        success:function(response){
            if (response) {
                $('.head').text(response.head);
                $('.tail').text(response.tail);
                $("#FlipForm")[0].reset();
            }
        },
    });
});


