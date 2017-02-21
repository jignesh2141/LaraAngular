app.controller('stepsController', function($scope, $http, API_URL) {
    //retrieve steps listing from API
    $scope.init = function(){
        $http.get(API_URL + "steps")
        .success(function(response) {
            $scope.steps = response;
        });
    };
    $scope.init();

    //get all projects
    $http.get(API_URL + "projects")
    .success(function(response) {
        $scope.projects = response;
    });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Step";
                $scope.step = {};
                break;
            case 'edit':
                $scope.form_title = "Step Detail";
                $scope.id = id;
                $http.get(API_URL + 'steps/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.step = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "steps";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.step),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            $('#myModal').modal('hide');
            $scope.init();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'steps/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        $('#myModal').modal('hide');
                        $scope.init();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});
