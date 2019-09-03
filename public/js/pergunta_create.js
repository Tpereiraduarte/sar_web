$(document).ready(function () {
  $('.dinamic').change(function () {
    if ($(this).val() != '') {
      var value = $(this).val();
      var dependent = $(this).data('dependent');
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{URL::route('dinamico')}}",
        method: "POST",
        data: { value: value, _token: _token, dependent: dependent },
        success: function (result) {
          $('#' + dependent).html(result);
          $('#paragrafo').empty();
          $('#paragrafo').append(result);
        }
      });
    }
  });
  $('.dinamic-paragrafo').change(function () {
    if ($(this).val() != '') {
      var value2 = $(this).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{URL::route('paragrafodinamico')}}",
        method: "POST",
        data: { value2: value2, _token: _token },
        success: function (result) {
          $('#subparagrafo').empty();
          $('#subparagrafo').append(result);
        }
      })
    }
  });
});