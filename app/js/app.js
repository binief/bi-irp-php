/*globals crossroads */
/*eslint-env jquery */
crossroads.addRoute('/', function() {
    $('#routeContent').load('app/pages/dashboard_graphs.html');
});
crossroads.addRoute('/user/{userId}', function(userId) {
    $('#routeContent').load('user/details.html');
});
crossroads.bypassed.add(function(request) {
    console.error(request + ' seems to be a dead end...');
});
 
//Listen to hash changes
window.addEventListener("hashchange", function() {
    console.log("route change..");
    
    $.ajax({
            url: 'app/controllers/userscontroller.php',
            dataType: 'json',
            type: 'post',
            async:false,
            data: {
                action: 'checkAccess'
            },
            success: function(data, textStatus, jQxhr) {
                console.log(data);
                if(data.isAuthenticated==false){
                    location.href =data.redirectUrl;
                }else{
                    //alert(data.message)
                }
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
        
    var route = '/';
    var hash = window.location.hash;
    if (hash.length > 0) {
        route = hash.split('#').pop();
    }
    crossroads.parse(route);
});
 
// trigger hashchange on first page load
window.dispatchEvent(new CustomEvent("hashchange"));