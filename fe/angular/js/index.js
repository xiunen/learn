var app = angular.module('test', []); // the second argument can not be removed

app.controller('LinksCtrl', function($scope) {
    $scope.pages = [{
        name: "Controllers & Template",
        url: '/html/template.html'
    }, {
        name: "Service",
        url: '/html/service.html'
    }, {
        name: 'Directives',
        url: '/html/directive.html'
    }, {
        name: 'Components',
        url: '/html/component.html'
    }, {
        name: 'A simple application',
        url: '/html/app.html'
    }];
});