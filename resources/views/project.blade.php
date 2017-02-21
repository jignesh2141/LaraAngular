<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Projects</div>

                <div class="panel-body" ng-controller="projectsController">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Project</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="project in projects">
                                <td><% project.id %></td>
                                <td><% project.name %></td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', project.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(project.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><%form_title%></h4>
                                </div>
                                <div class="modal-body">
                                    <form name="frmEmployees" class="form-horizontal" novalidate="">

                                        <div class="form-group error">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Name" value="<%name%>" 
                                                ng-model="project.name" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>