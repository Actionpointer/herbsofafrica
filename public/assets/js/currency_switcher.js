$('.currency_switcher').click(function(){
    let currency = $(this).attr('data-currency')
      $.ajax({
          type:'GET',
          async: false,
          dataType: 'json',
          url: "{{route('switch_currency')}}",
          data:{
              'currency': currency,
          },
          success:function(data) {
              location.reload()
          },
          error: function (data, textStatus, errorThrown) {
              return false
          },
      })
  })