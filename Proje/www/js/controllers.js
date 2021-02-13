angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout, $http) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  if(!$scope.user_Id){
    $timeout(function() {
      $scope.login();

    }, 50);
  }

  // Form data for the login modal
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  $scope.loginMenuButton_IsVisible = true;
  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {

    $ServiceRequest = {
      service_type :"login",
      login_data : $scope.loginData
    }
    $http.post("http://localhost/PG1926/project_files/service.php?",$ServiceRequest).success(function(data){
      console.log('Doing login', data);
      $scope.user_data = data[0];
      if($scope.user_data == false){
        swal({
          title: "Uyarı!",
          text: "Kullanıcı bulunamadı! Bilgilerinizi kontrol ediniz!",
          icon: "error",
       });
      }else  if($scope.loginData.password != $scope.user_data.PASSWORD || $scope.loginData.username != $scope.user_data.USERNAME){
        swal({
          title: "Uyarı!",
          text: "Şifreniz Hatalı! Bilgilerinizi kontrol ediniz!",
          icon: "error",
       });
      }else{
          // Simulate a login delay. Remove this and replace with your login
          // code if using a login system
          localStorage.setItem('user_id', $scope.user_data.ID);
          localStorage.setItem('user_username', $scope.user_data.USERNAME);
          localStorage.setItem('user_fname', $scope.user_data.FNAME);
          localStorage.setItem('user_lname', $scope.user_data.LNAME);
          localStorage.setItem('user_ph', $scope.user_data.PHONE);
          localStorage.setItem('user_pass', $scope.user_data.PASSWORD);

          $scope.user_Id = localStorage.getItem('user_id');
          $scope.username = localStorage.getItem('user_username');
          $scope.user_firstname = localStorage.getItem('user_fname');
          $scope.user_lastname = localStorage.getItem('user_lname');
          $scope.user_phone = localStorage.getItem('user_ph');
          $scope.user_password = localStorage.getItem('user_pass');

          $scope.loginMenuButton_IsVisible = false;
          $timeout(function() {
            $scope.closeLogin();
          }, 1000);
      }
    });


  };//end of the login function

    $scope.user_Id = localStorage.getItem('user_id');
    $scope.username = localStorage.getItem('user_username');
    $scope.user_firstname = localStorage.getItem('user_fname');
    $scope.user_lastname = localStorage.getItem('user_lname');
    $scope.user_phone = localStorage.getItem('user_ph');
    $scope.user_password = localStorage.getItem('user_pass');





//Creating a singup data json
  $scope.signUpData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/signup.html', {
    scope: $scope
  }).then(function(signmodal) {
    $scope.signupModal = signmodal;
  });

  // Triggered in the login modal to close it
  $scope.closeSignUp = function() {
    $scope.signupModal.hide();
  };

  // Open the login modal
  $scope.gosignUp = function() {
    $scope.closeLogin();
    $scope.signupModal.show();
  };

  $scope.backToLogin = function(){
    $scope.closeSignUp();
    $scope.login();
  };

  $scope.doSignUp = function(){
      if($scope.signUpData == null){
        swal({
          title: "Uyarı!",
          text: "Bilgilerinizi eksik veya hatalı girdiniz! Lütfen kontrol ediniz!",
          icon: "error",
       });
      }else{
        $scope.$ServiceRequest = {
          service_type :'signup',
          signup_data : $scope.signUpData
        }
        $http.post("http://localhost/PG1926/project_files/service.php?", $scope.$ServiceRequest).success(function(data){
        if(data == false){
            swal({
              title: "Uyarı!",
              text: "Kayıt başarısız lütfen tekrar deneyiniz!",
              icon: "error",
           });
          }else{
            swal({
              title: "Başarılı!",
              text: "Kayıt Başarılı! Kullanıcı adınız : " + data.USERNAME,
              icon: "success",
           });
           $timeout(function() {
            $scope.login();

          }, 50);
          }

        });
      }
  };

  $scope.logout = function(){
      localStorage.removeItem('user_id');
      localStorage.removeItem('user_username');
      localStorage.removeItem('user_fname');
      localStorage.removeItem('user_lname');
      localStorage.removeItem('user_ph');
      localStorage.removeItem('user_pass');
  };

  //end of the appctrl
})

.controller('PlaylistsCtrl', function($scope,$http) {
  $scope.playlists = [
    { title: 'Reggae', id: 1 },
    { title: 'Chill', id: 2 },
    { title: 'Dubstep', id: 3 },
    { title: 'Indie', id: 4 },
    { title: 'Rap', id: 5 },
    { title: 'Cowbell', id: 6 }
  ];

  $scope.outputPanic_IsVisible = false;

  $scope.panic = function(){

    $scope.outputPanic_IsVisible = true;

      $ServiceRequest = {
        service_type :'panic',
        user_id : $scope.user_Id
      }
      $http.post("http://localhost/PG1926/project_files/service.php?", $ServiceRequest).success(function(){

      });
  };



})

.controller('PlaylistCtrl', function($scope, $stateParams) {
});
