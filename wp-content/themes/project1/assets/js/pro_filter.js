jQuery(function($) {
//Main ajax function
function pro_get_posts() {
    
    var ajax_url = pro_settings.ajax_url;

    $.ajax({
        type: 'POST',
        url: ajax_url,
        data: {
            action: 'pro_filter',
            position: $('#positions :selected').val(),
            country: $('#countries :selected').val(),
            
        },
        beforeSend: function ()
        {
            // Сюда вставляем прилодер (если необходимо)
        },
        success: function(data)
        {
            //Hide loader here
            $('#archive-list').html(data);
        },
        error: function()
        {
            $("#main").html('<p>There has been an error</p>');
        }
    });
}

function filter() {
    $('#countries,#positions').change(function (e){
        pro_get_posts();
    }
)}
filter();
});