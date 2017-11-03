var app = angular.module('test', []); // the second argument can not be removed

app.controller('ContactsCtrl', function($scope) {

    $scope.items = [{
        name: "Abot Chen",
        email: 'xiunen@163.com'
    }, {
        name: "Jack Ma",
        email: 'mayun@alibaba.com'
    }, {
        name: 'Steve Jobs',
        email: 'jobs@apple.com'
    }, {
        name: 'Mark Zuckberg',
        email: 'mark@facebook'
    }];

    $scope.level = 2;

    $scope.month = 6;

    $scope.click_link = function(n) {
        alert('输入参数是' + n);
    }
});