var app = angular.module('test', []); // the second argument can not be removed

app.directive('myDir', function(){
    return {
        restrict: 'E',
        template: '<div>restrict element, {{greeting}}</div>',
        link: function($scope, elem, attr){

        }
    }
});

app.directive('yourDir', function(){
    return {
        restrict: 'A',
        template: '<div>restrict attribute</div>',
        link: function($scope, elem, attr){
            console.log(arguments);
        }
    }
});

app.directive('theirDir', function(){
    return {
        restrict: 'C',
        templateUrl: '/html/directive-part.html',
        link: function($scope, elem, attr){
            console.log(arguments);
        }
    }
});

app.directive('ourDir', function(){
    return {
        restrict: 'M',
        template: '<div>restrict comment</div>',
        link: function($scope, elem, attr){
            console.log(attr);
        }
    }
});

app.controller('TestCtrl',function($scope){
    $scope.greeting = "Hello world";
});