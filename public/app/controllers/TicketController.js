//var app = angular.module("main-App", []);

app.controller('AdminController', function($scope,$http){
  $scope.pools = [];
});

app.controller('TicketsController', function(dataFactory,$scope,$http){

    // app.config( function ($stateProvider, $urlRouterProvider, $authProvider) {
      
    //   $urlRouterProvider.otherwise('/login');

    //   $authProvider.loginUrl = 'www.laravelapp.local/auth/login';
    //   $authProvider.signupUrl = 'www.laravelapp.local/auth/register';
    // })

      $scope.isadmin = function() {
        //console.log(id);
        var url = "isadmin";

        $http.get(url).success( function(response) {
            //console.log(response);
            $scope.is_admin = response; 
        });
      } 

      $scope.isdeveloper = function() {
        //console.log(id);
        var url = "isdeveloper";

        $http.get(url).success( function(response) {
            //console.log(response);
            $scope.is_developer = response; 
        });
      }

      $scope.data = [];
      $scope.libraryTemp = {};
      $scope.totalItemsTemp = {};
      $scope.totalItems = 0;

      $scope.pageChanged = function(newPage) {
        getResultsPage(newPage);
      };
      getResultsPage(1);

      function getResultsPage(pageNumber) {
          if(! $.isEmptyObject($scope.libraryTemp)){
              dataFactory.httpRequest('/tickets?search='+$scope.searchText+'&page='+pageNumber).then(function(data) {
                $scope.data = data.data;
                $scope.totalItems = data.total;
              });
          }else{
            dataFactory.httpRequest('/tickets?page='+pageNumber).then(function(data) {
              $scope.data = data.data;
              $scope.totalItems = data.total;
              //console.log(data.data);
            });
          }
          // $scope.devassign = {
          //   "type": "select", 
          //   "name": response.name,
          //   "value": response.id, 
          //   "values": response 
          // };
      }

      $scope.searchDB = function(){
          if($scope.searchText.length >= 3){
              if($.isEmptyObject($scope.libraryTemp)){
                  $scope.libraryTemp = $scope.data;
                  $scope.totalItemsTemp = $scope.totalItems;
                  $scope.data = {};
              }
              getResultsPage(1);
          }else{
              if(! $.isEmptyObject($scope.libraryTemp)){
                  $scope.data = $scope.libraryTemp ;
                  $scope.totalItems = $scope.totalItemsTemp;
                  $scope.libraryTemp = {};
              }
          }
      }

      //$scope.reload = function(){location.reload();}

      $scope.ticketcategory = function() {
            //console.log(id);
            var url = "add_ticket";

            $http.get(url).success( function(response) {
               //console.log(response);
               //console.log(response.categories);
               $scope.ticketcategory = response; 
            });
      }

      $scope.saveAdd = function() {
            //console.log(id);
            var url = "add_new_ticket";
            //console.log(url);
            $http.post(url, {'title':$scope.title,'category':$scope.category,'priority':$scope.priority,'message':$scope.message}).success( function(response) {
                //$scope.respo.splice(index, 1);
                //console.log(response);
                $scope.ticketrespo = "A ticket has been opened...";
                getResultsPage();

                /* To reset fields after submit */
                $scope.createticket.title.$setPristine();
                $scope.createticket.title.$setPristine(true); 
                $scope.title = '';

                $scope.createticket.category.$setPristine();
                $scope.createticket.category.$setPristine(true); 
                $scope.category = '';

                $scope.createticket.priority.$setPristine();
                $scope.createticket.priority.$setPristine(true); 
                $scope.priority = '';

                $scope.createticket.message.$setPristine();
                $scope.createticket.message.$setPristine(true); 
                $scope.message = '';
            });
      }

      $scope.ticketview = function(id) {
            //console.log(id);
            var url = "tickets/"+id;

            $http.get(url).success( function(response) {
                //console.log(id);
                $scope.view = response; 
            });
      }

      $scope.ticketclose = function(id) {
            //console.log(id);
            var url = "close_ticket/"+id;

            $http.post(url).success( function(response) {
               //console.log(response);
               $scope.close = response; 
               getResultsPage();
            });
      }

      $scope.ticketreopen = function(id) {
            //console.log(id);
            var url = "reopen_ticket/"+id;

            $http.post(url).success( function(response) {
               //console.log(response);
               $scope.ticketopen = response; 
               getResultsPage();
            });
      }

      $scope.ticketcomment = function(tid, uid, tuid) {
            // console.log(tid);
            // console.log(uid);
            // console.log(tuid);
            //console.log($scope.comment);
            var url = "comment";

            $http.post(url,{'ticket_id':tid, 'user_id':uid, 'comment':$scope.comment}).success( function(response){
               //console.log(response);
               //$scope.ticketcom = "Your comment has been submitted..."; 
               $scope.ticketreopen(tuid);
               getResultsPage();
               $scope.ticketview(tuid);
               /* To reset fields after submit */
               $scope.commentform.comment.$setPristine();
               $scope.commentform.comment.$setPristine(true); 
               $scope.comment = '';
            });
      }

      $scope.adddev = function() {
            //console.log(id);

            //console.log($scope.name);
            //console.log($scope.email);
            //console.log($scope.password);
            var url = "devregister";
            $http.post(url, {'name':$scope.name,'email':$scope.email,'password':$scope.password}).success( function(response) {
                //$scope.respo.splice(index, 1);
                //console.log(response);
                $scope.devrespo = response;

                /* To reset fields after submit */
                $scope.adddeveloper.name.$setPristine();
                $scope.adddeveloper.name.$setPristine(true); 
                $scope.name = '';

                $scope.adddeveloper.email.$setPristine();
                $scope.adddeveloper.email.$setPristine(true); 
                $scope.email = '';

                $scope.adddeveloper.password.$setPristine();
                $scope.adddeveloper.password.$setPristine(true); 
                $scope.password = '';
                $scope.devlist();
                getResultsPage();

            });
      }

      $scope.devlist = function() {
            var url = "devlist";

            $http.get(url).success( function(response) {
               //console.log(response);
               $scope.devslist = response; 
            });
      }

      $scope.devlremove = function(id) {

        //console.log(id);
        var url = "deletedev/"+id;
        $http.post(url).success( function(response) {
            //console.log(response);
            $scope.devremoved = response; 
            $scope.devlist();
        });
        
      }  

      $scope.assignto = function(ticketid, assignedid) {

        //console.log(ticketid);
        //console.log(assignedid);

        var url = "devassignedto";
        $http.post(url,{'ticket_id': ticketid, 'assigned_id':assignedid}).success( function(response) {
            //console.log(response);
            $scope.assigntodev = response; 
            getResultsPage();
            //alert(response);
        });
        
      }  

      // $scope.devdetails = function(assignedid) {
      //   var url = "devassigneddetails";

      //    $http.post(url,{'assigned_id':assignedid}).success( function(response) {
      //       console.log(response);
      //       $scope.devassigneddetails = response; 
      //   });
      // }  

});


// app.controller('authCtrl', function (dataFactory,$scope, $rootScope, $routeParams, $location, $http ) {
//     //initially set those objects to null to avoid undefined error
//     $scope.login = {};
//     $scope.signup = {};

//     $scope.doLogin = function () {
//       console.log($scope.form.email);
//       console.log($scope.form.password);

//       dataFactory.httpRequest('login','POST',{},$scope.form).then(function(data) {
//         //$scope.users = data.data;
//         console.log(data.data);
//           if (data.status == "success") {
//             $scope.message = "Login success.";
//            // window.location.href = "http://www.laravelapp.local/#/home";
//             window.location.href = "http://www.laravelapp.local/#/home";
//             window.location.reload();
//             //$location.path('home');
//           }else{

//             $scope.message = "Login failed.";
//           }

//       });


//        /* $http.post('login', {
            
//         }).then(function (results) {
            
//             if (results.status == "success") {
//                 $location.path('dashboard');
//             }
//         });*/
//     };
 
//     $scope.signup = {'name':$scope.name,'email':$scope.email,'password':$scope.password};
//     $scope.signUp = function (customer) {
//         Data.post('signUp', {
//             customer: customer
//         }).then(function (results) {
//             Data.toast(results);
//             if (results.status == "success") {
//                 $location.path('dashboard');
//             }
//         });
//     };

// });

// app.controller('ItemController', function(dataFactory,$scope,$http){
//   $scope.data = [];
//   $scope.libraryTemp = {};
//   $scope.totalItemsTemp = {};
//   $scope.totalItems = 0;

//   $scope.pageChanged = function(newPage) {
//     getResultsPage(newPage);
//   };
//   getResultsPage(1);

//   function getResultsPage(pageNumber) {
//       if(! $.isEmptyObject($scope.libraryTemp)){
//           dataFactory.httpRequest('/items?search='+$scope.searchText+'&page='+pageNumber).then(function(data) {
//             $scope.data = data.data;
//             $scope.totalItems = data.total;
//           });
//       }else{
//         dataFactory.httpRequest('/items?page='+pageNumber).then(function(data) {
//           $scope.data = data.data;
//           $scope.totalItems = data.total;
//         });
//       }
//   }

//   $scope.searchDB = function(){
//       if($scope.searchText.length >= 3){
//           if($.isEmptyObject($scope.libraryTemp)){
//               $scope.libraryTemp = $scope.data;
//               $scope.totalItemsTemp = $scope.totalItems;
//               $scope.data = {};
//           }
//           getResultsPage(1);
//       }else{
//           if(! $.isEmptyObject($scope.libraryTemp)){
//               $scope.data = $scope.libraryTemp ;
//               $scope.totalItems = $scope.totalItemsTemp;
//               $scope.libraryTemp = {};
//           }
//       }
//   }

//   $scope.saveAdd = function(){
//     dataFactory.httpRequest('items','POST',{},$scope.form).then(function(data) {
//       $scope.data.push(data);
//       $(".modal").modal("hide");
//     });
//   }

//   $scope.edit = function(id){
//     dataFactory.httpRequest('items/'+id+'/edit').then(function(data) {
//     	console.log(data);
//       	$scope.form = data;
//     });
//   }

//   $scope.saveEdit = function(){
//     dataFactory.httpRequest('items/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
//       	$(".modal").modal("hide");
//         $scope.data = apiModifyTable($scope.data,data.id,data);
//     });
//   }

//   $scope.remove = function(item,index){
//     var result = confirm("Are you sure delete this item?");
//    	if (result) {
//       dataFactory.httpRequest('items/'+item.id,'DELETE').then(function(data) {
//           $scope.data.splice(index,1);
//       });
//     }
//   }

// });