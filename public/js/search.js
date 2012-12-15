//When Search button is clicked
$("#form").submit(function(){
        //Prevent Page from reloading
        event.preventDefault();

        $('#search_results').html("<img src='http://localhost/ITP404FinalProject/public/img/ajax-loader.gif'>");

        var searchTerm = $("#searchbox").val();

        $.ajax({
        url: 'search',
        data: {
                searchTerm: searchTerm
        },
        type: 'GET',
        success: function(response) {
                $('#search_results').html(response).promise().done(function(){
                        $("#search_results").jMyCarousel({
                                visible:'100%',
                                eltByElt:true
                        });
                }); 
        },
        error: function(err1, err2, err3) {
                console.log(err1, err2, err3);
        }  
        });

});     

