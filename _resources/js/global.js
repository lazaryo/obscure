$(function() {
    console.log(window.location.href);
    console.log(window.location.pathname);
    console.log(window.location.host);
    new Clipboard('.btn');
    
    const urlBase = 'http://' + window.location.host;
    const base = 'dictionary/letter/';
    const entryBase = 'dictionary/entry/';
    const baseText = 'Starting with: ';
    
    let letter = $('#by-letter').val();
    let entry = $('#by-entry').val();
    let speech = $('#by-speech').val();
    let video = $('#by-video').val();
    
    $('#letter').attr('href', base + letter);
    $('#entry').attr('href', entryBase + entry);
    $('#speech').attr('href', 'speech/' + speech);
    $('#video').attr('href', 'video/' + video);
    
    $('#by-letter').on('change keyup input', function() {
        letter = $('#by-letter').val();
        $('#letter').attr('href', base + letter);
    });
    
    $('#by-speech').on('change keyup input', function() {
        speech = $('#by-speech').val();
        $('#speech').attr('href', 'speech/' + speech);
    });
    
    $('#by-entry').on('change keyup input', function() {
        entry = $('#by-entry').val();
        $('#entry').attr('href', entryBase + entry);
    });
    
    $('#by-video').on('change keyup input', function() {
        video = $('#by-video').val();
        $('#video').attr('href', 'video/' + video);
    });

    $('#keyword').on('input keyup focus', function() {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings("div#content");
        
        if(inputVal.length){
            $.get("_resources/search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                $(".search-results").addClass('show');
                $(".search-results").html(data);
            });
            $('#other-form').show();
        } else{
            $(".search-results").removeClass('show');
            $('#other-form').hide();
        }
    });
    
    $.ajax({
        type: 'GET',
        url: urlBase + '/obscure-sorrows/api/dictionary',
        contentType: "application/json",
        dataType: "json",
        success: function (sorrows) {
            // set the max attr value for the entry
            $('#by-entry').attr('max', sorrows.length);
            
            for (let sorrow of sorrows) {
                if (sorrow.entry == 1) {
                    $('#by-sorrow').append('<option value="' + sorrow.title + '" selected>' + sorrow.title + '</option>');
                } else {
                    $('#by-sorrow').append('<option value="' + sorrow.title + '">' + sorrow.title + '</option>');
                }
            }
            
            let word = $('#by-sorrow').val();
            $('#sorrow').attr('href', 'word/' + word);
            
            $('#by-sorrow').on('change keyup input', function() {
                word = $('#by-sorrow').val();
                $('#sorrow').attr('href', 'word/' + word);
            });
        }
    })
    .fail(function (e) {
        console.log('Error Loading Obscure Sorrow Data');
    })
    .done(function () {});
});