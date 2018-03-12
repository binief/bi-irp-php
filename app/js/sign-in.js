
var SignInVM = function() {
    var vm=this;
    
    vm.email = ko.observable();
    vm.password = ko.observable();
    
    vm.doSignIn=function(){
        
        $.ajax({
            url: '../../app/controllers/userscontroller.php',
            dataType: 'json',
            type: 'post',
            async:false,
            data: {
                action: 'login',
                email:vm.email(),
                password:vm.password()
            },
            success: function(data, textStatus, jQxhr) {

                if(data.isAuthenticated==true){
                    location.href =data.redirectUrl;
                }else{
                    alert(data.message)
                }
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }
 
};

var vm=new SignInVM();

ko.applyBindings(vm); 

 $.ajax({
            url: '../../app/controllers/userscontroller.php',
            dataType: 'json',
            type: 'post',
            async:false,
            data: {
                action: 'checkAccess'
            },
            success: function(data, textStatus, jQxhr) {
                if(data.isAuthenticated==true){
                    //location.href =data.redirectUrl;
                }
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });