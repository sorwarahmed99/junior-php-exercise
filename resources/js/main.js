
    $(function(){
      $("#showUnixTime").click(function(){
        $(".times").show( "slow" );
        $("#showUnixTime").hide();
        $("#hideUnixTime").show();
      });
      $("#hideUnixTime").click(function(){
        $(".times").hide( "slow" );
        $("#hideUnixTime").hide();
        $("#showUnixTime").show();
        });
    });

    $(function(){
      $("#showEmails").click(function(){
        $(".emails").show();
      });
    });

    $(function(){
      $("#showFlips").click(function(){
        $(".flips").show();
      });
    });



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
          console.log(response);
          if(response) {
            $('.success').text(response);
            $("#unixTimeForm")[0].reset();
          }
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
          console.log(response);
          if(response) {
            $('.isValid').text(response);
            $("#emailValidateForm")[0].reset();
          }
        },
       });
    });

    $(".flip").click(function(event){
      event.preventDefault();

      let number = $("input[name=number]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "/flip-coin",
        type:"POST",
        data: {
          number,
          _token
        },
        success:function(data){
          if(data) {
            $('.head').append(data.head);
            $('.tail').append(data.tail);
            $("#FlipForm")[0].reset();
          }
        },
       });
    });


