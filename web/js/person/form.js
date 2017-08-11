$(document).ready(function () {
    $cityElement = $('#city');
    $postalCodeElement = $('#cp');
    $cityContainer = $('#cityContainer');

    // la ville est pasque au départ
    $cityContainer.hide();

    function showCities() {
        var postalCode = $postalCodeElement.val();
        if (postalCode.length==5) {
            $.getJSON('/villes-par-code-postal/' + postalCode, function (data) {
                var cityOptions = '';
                data.forEach(function (item) {
                    cityOptions += '<option value=' + item.id + '>' + item.city_name + '</option>';
                });

                $cityElement.html(cityOptions);
                $cityContainer.show();
                $cityElement.focus();
            })
        }
    }

    $postalCodeElement.blur(showCities);
});