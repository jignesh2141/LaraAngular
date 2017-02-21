<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Steps</div>

                <div class="panel-body" ng-controller="stepsController">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Project</th>
                                <th>Order</th>
                                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Step</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="step in steps">
                                <td><% step.id %></td>
                                <td><% step.name %></td>
                                <td><% step.project_name %></td>
                                <td><% step.order %></td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', step.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(step.id)">Delete</button>
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
                                                ng-model="step.name" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Projects</label>
                                            <div class="col-sm-9">
                                                <select id="project" class="form-control" ng-options="project.id as project.name for project in projects" ng-model="step.project_id" name="project">
                                                  <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Order</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Name" value="<%order%>" 
                                                ng-model="step.order" ng-required="true">
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
