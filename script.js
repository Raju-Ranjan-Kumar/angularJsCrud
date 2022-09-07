var app = angular.module("myapp",[]);

app.controller("mycontroller", function($scope, $http){
    $scope.btnName = 'Add';

    // update data in database
    $scope.updateDB = function(id, name, email, phone, zip, status){
        $scope.id = id;
        $scope.name = name;
        $scope.email = email;
        $scope.phone = phone;
        $scope.zip = zip;
        $scope.status = status;
        $scope.btnName = 'Update';
    }

    // delete data in database
    $scope.deleteDB = function(id){
        if(confirm("Are you sure..?")){
            $http.post('delete.php', {'send_id': id}).then(function successCallback(data){
                $scope.loadTable();
            })
        }
    }

    // show data on table
    $scope.loadTable = function(){
        $http.get('select.php').then(function successCallback(data){
            $scope.recevedJson = data;
        })
    }

    // validation and send data in database
    $scope.insertIntoDB = function(){
        if($scope.name == null){
            alert("Enter Your Name");
            return;
        }else if($scope.email == null){
            alert("Enter Your Email");
            return;
        }else if($scope.phone == null){
            alert("Enter Your Phone");
            return;
        }else if($scope.zip == null){
            alert("Enter Your Zip");
            return;
        }else if($scope.status == null){
            alert("Enter Status");
            return;
        }

        $http.post('insert.php', {
            'send_id': $scope.id,
            'send_name': $scope.name,
            'send_email': $scope.email,
            'send_phone': $scope.phone,
            'send_zip': $scope.zip,
            'send_status': $scope.status,
            'send_btn': $scope.btnName,
        }).then(function successCallback(data){
            $scope.id = null;
            $scope.name = null;
            $scope.email = null;
            $scope.phone = null;
            $scope.zip = null;
            $scope.status = null;
            $scope.loadTable();
            $scope.btnName = 'Add';
        },function errorCallback(data) {
            alert("Error, Not Connecting to API");
        }); 
    }
});