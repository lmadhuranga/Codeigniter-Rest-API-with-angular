/**
 * Created by Madhuranga 
 */
angular.module('UserApp.controllers',[])
// UserListController
.controller('UserListController',function($scope,$state,popupService,$window,Users, User){
    // get organization list by ajax
    console.log('UserListController');
    $scope.Users=Users.query();

    // if delete
    $scope.deleteUser=function(User1){ 
        console.log('deleteUser');
        // get the new list of organization
        User_temp = new User();  
        console.log('user1');
        User_temp.id = User1.id;
        // delete confirmation
        if(popupService.showPopup('Really delete this?')){
            User_temp.$delete(function(){
                // update the organization list
                $scope.Users=Users.query();
            });

        }
    }

})

// UserViewController
.controller('UserViewController',function($scope,$state,$stateParams,User){
    console.log('id:'+$stateParams.id);
    // get organization details
    $scope.User = User.get({id:$stateParams.id});

})
// UserCreateController
.controller('UserCreateController',function($scope,$state,$stateParams,Users,User){
    // get organization list
    $scope.Users=new Users();
    console.log('create fun');
    // add new oraganizaiton
    $scope.createUser=function(){
        console.log('create user');
        // send ajax request to add the organization
         $scope.Users.$create(function(){
            // list updated organization list
            $state.go('users-list');
        });
    }

})

// UserEditController
.controller('UserEditController',function($scope,$state,$stateParams,User){
    // get one organization by ajax
    $scope.User = User.get({id:$stateParams.id});
    $scope.updateUser = function()
    {
        console.log($scope.User);
        // update the organization
        $scope.User.$update(function()
        {
            // go to ogranization list
            $state.go('users-list');
        });
    }
})
 