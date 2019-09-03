$(document).ready(function () {
  $(".dinamic").change(changeNorma);
  changeNorma();

  $(".dinamic-paragrafo").change(changeSubparagrafo);
  changeSubparagrafo();
});
function changeNorma() {
  let value = document.getElementById("norma_id").value;
  let dependent = "norma";
  let paragrafo = document.getElementById("paragrafo").value;
  if (value != '') {
    let _token = $('input[name="_token"]').val();
    $.ajax({
      url: "{{URL::route('dinamico')}}",
      method: "POST",
      data: { value: value, _token: _token, dependent: dependent },
      success: function (result) {
        $('#' + dependent).html(result);
        $('#paragrafo').empty();
        $('#subparagrafo').empty();
        $('#paragrafo').append(result);
        if (result != '<option value="">Escolha o paragrafo desejado</option>') {
          busca(paragrafo, result);
        }
      }
    });
  }
}
function busca(paragrafo, result) {
  if ($("#paragrafo option[value='" + paragrafo + "']").length == 0) {
    $('#paragrafo').empty();
    return $('#paragrafo').append(result);
  }
  $("#paragrafo option[value=paragrafo]").attr('selected', 'selected')
  return $("#paragrafo").val(paragrafo);
}
function changeSubparagrafo() {
  let value2 = document.getElementById("paragrafo").value;
  let norma = document.getElementById("norma_id").value;
  if (value2 != '' && norma != '') {
    let _token = $('input[name="_token"]').val();
    $.ajax({
      url: "{{URL::route('paragrafodinamico')}}",
      method: "POST",
      data: { value2: value2, _token: _token },
      success: function (result) {
        $('#subparagrafo').empty();
        $('#subparagrafo').append(result);
      }
    });
  }
}