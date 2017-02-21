app.controller('projectsController', function($scope, $http, API_URL) {
    //retrieve projects listing from API
    $scope.init = function(){
        $http.get(API_URL + "projects")
        .success(function(response) {
            $scope.projects = response;
        });
    };
    $scope.init();
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Project";
                $scope.project = {};
                break;
            case 'edit':
                $scope.form_title = "Project Detail";
                $scope.id = id;
                $http.get(API_URL + 'projects/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.project = response;
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
        var url = API_URL + "projects";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.project),
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
                url: API_URL + 'projects/' + id
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
