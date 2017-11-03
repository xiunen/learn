var app = angular.module('test', []); // the second argument can not be removed

app.service('Contact', function(){
    console.log('contact');
    return {
        init: function(){
            console.log('hello');
        }
    };
});

app.factory('Table', function(){
    console.log('table');
    return {
        render: function(){
            console.log('rendering table');
        }
    };
});

app.value('Work', {go:function(){
    console.log('gogogo');
}});

app.controller('TestCtrl', function($scope, Contact, Table, Work){
    Contact.init();
    Table.render();
    Work.go();
});