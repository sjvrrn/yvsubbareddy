// marquee hover
$(function() {
    $('marquee').mouseover(function() {
        $(this).attr('scrollamount',0);
    }).mouseout(function() {
         $(this).attr('scrollamount',5);
    });
});
// var app = angular.module('adminApp', []);
// app.controller('adminCntrl', function($scope) {
  
// });
// Admin govtSchemes
var app = angular.module('viewSchemes', []);
app.controller('vschemesCntrl', function($scope) {
  $scope.govtShow = true;
  $scope.govtForm = function() {
    $scope.govtShow = false;
    $scope.govtFormShow = !$scope.govtFormShow;
  }
  $scope.govtschemesView = function() {
    $scope.govtFormShow = false;
    $scope.govtShow = !$scope.govtShow;
  }
  $scope.commentShow = false;
  $scope.viewSchemes = function() {
    $scope.commentShow = !$scope.commentShow;
  }
  $scope.viewSchemes1 = function() {
    $scope.commentShow1 = !$scope.commentShow1;
  }
});
// Admin Jobs Script
var app = angular.module('jobPage', []);
app.controller('jobCntrl', function($scope) {
  $scope.jobShow = true;
   $scope.jobsView = function() {
    $scope.jobFormShow = false;
    $scope.jobShow = !$scope.jobShow;
  }
  $scope.jobForm = function() {
    $scope.jobShow = false;
    $scope.jobFormShow = !$scope.jobFormShow;
  }
  $scope.jobscommentShow = false;
  $scope.jobsSchemes = function() {
    $scope.jobscommentShow = !$scope.jobscommentShow;
  }
  $scope.jobsSchemes1 = function() {
    $scope.jobscommentShow1 = !$scope.jobscommentShow1;
  }
});
// Admin Socialwlfare
var app = angular.module('Social', []);
app.controller('socialCntrl', function($scope) {
  $scope.socialwelfShow = true;
   $scope.socialwelfView = function() {
    $scope.socialFormShow = false;
    $scope.socialwelfShow = !$scope.socialwelfShow;
  }
  $scope.socialForm = function() {
    $scope.socialwelfShow = false;
    $scope.socialFormShow = !$scope.socialFormShow;
  }
  $scope.socialcommentShow = false;
  $scope.socialSchemes = function() {
    $scope.socialcommentShow = !$scope.socialcommentShow;
  }
  $scope.socialSchemes1 = function() {
    $scope.socialcommentShow1 = !$scope.socialcommentShow1;
  }
});