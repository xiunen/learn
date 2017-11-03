var app = angular.module('test', []); 

app.controller('TestCtrl', function($scope){
    $scope.users = ['Jack Ma','Chairman Mao'];
});

app.component('userComponent',{
    template: '<div>{{$ctrl.username}}:{{content}}--{{$ctrl.nickname}}<input type="text" ng-model="$ctrl.username"></div>',
    bindings:{
        username: '<',
        nickname:'@'
    },
    controller: function($scope){
        $scope.content = "Alibaba";
    }
});
