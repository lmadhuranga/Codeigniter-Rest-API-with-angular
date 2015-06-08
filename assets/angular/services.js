/**
 * Created by Sandeep on 01/06/14.
 */
var services = angular.module('UserApp.services', ['ngResource']);
 
services.factory('Users', function ($resource) {
    return $resource(site_url+'/api/user/index/', {}, {
        query: { method: 'GET', isArray: true },
        create: { method: 'POST' }
    })
});

services.factory('User', function ($resource) {
	console.log($resource);
    return $resource(site_url+'/api/user/index/', {}, {
        get: { method: 'GET',params: {id: '@id'}},
        update: { method: 'PUT', params: {id: '@id'} },
        delete: { method: 'DELETE', params: {id: '@id'} }
    })
})

services.service('popupService',function($window){
    this.showPopup=function(message){
        return $window.confirm(message);
    }
});


