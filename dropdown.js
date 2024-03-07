$(document).ready(function () {
    // Load province data from JSON file
    $.getJSON('refprovince.json', function (data) {
        // Sort provinces alphabetically
        data.RECORDS.sort(function (a, b) {
            return a.provDesc.localeCompare(b.provDesc);
        });

        // Add a default option to the province dropdown
        $('#province').append($('<option>', {
            value: '',
            text: 'Select Province'
        }));

        // Iterate over each province in the sorted JSON data and populate the dropdown
        $.each(data.RECORDS, function (index, province) {
            $('#province').append($('<option>', {
                value: province.provCode,
                text: province.provDesc
            }));
        });
    });

    // Add change event listener to the province dropdown
    $('#province').change(function () {
        var selectedProvinceCode = $(this).val();
        $('#city').empty().append($('<option>', {
            value: '',
            text: 'Select City/Municipality'
        }));

        // Load city data from JSON file for the selected province
        $.getJSON('refcitymun.json', function (data) {
            // Filter and sort cities for the selected province
            var citiesForProvince = data.RECORDS.filter(function (city) {
                return city.provCode === selectedProvinceCode;
            });
            citiesForProvince.sort(function (a, b) {
                return a.citymunDesc.localeCompare(b.citymunDesc);
            });

            // Iterate over each city for the selected province and populate the dropdown
            $.each(citiesForProvince, function (index, city) {
                $('#city').append($('<option>', {
                    value: city.citymunCode,
                    text: city.citymunDesc
                }));
            });
        });
    });

    // Add change event listener to the city dropdown
    $('#city').change(function () {
        var selectedCityCode = $(this).val();
        $('#barangay').empty().append($('<option>', {
            value: '',
            text: 'Select Barangay'
        }));

        // Load barangay data from JSON file for the selected city
        $.getJSON('refbrgy.json', function (data) {
            // Filter and sort barangays for the selected city
            var barangaysForCity = data.RECORDS.filter(function (barangay) {
                return barangay.citymunCode === selectedCityCode;
            });
            barangaysForCity.sort(function (a, b) {
                return a.brgyDesc.localeCompare(b.brgyDesc);
            });

            // Iterate over each barangay for the selected city and populate the dropdown
            $.each(barangaysForCity, function (index, barangay) {
                $('#barangay').append($('<option>', {
                    value: barangay.brgyCode,
                    text: barangay.brgyDesc
                }));
            });
        });
    });
});