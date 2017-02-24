<style type="text/css">
  #edit-data .modal-dialog {
    width: 100%;
  }
  #list-developer .modal-dialog {
    width: 82%;
  }
  .modal-dialog .modal-content {
    border: none !important;
  }
  td span.viewtitle:hover {
    cursor: pointer;
    color: #428bca;
  }
  .form-group select {
    background: transparent none repeat scroll 0 0 !important;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    width: 100%;
    display: block;
    font-size: 14px;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    vertical-align: middle;
  }
  .modal-backdrop.in{
    z-index: 0 !important;
  }
</style>
<div class="row" ng-controller="TicketsController" ng-init="isdeveloper()">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Tickets </h1>
        </div>
        <div class="pull-right" style="padding-top:30px">
            <!--<div class="box-tools" style="display:inline-table">
              <div class="input-group">
                  <input type="text" class="form-control input-sm ng-valid ng-dirty" placeholder="Search" ng-change="searchDB()" ng-model="searchText" name="table_search" title="" tooltip="" data-original-title="Min character length is 3">
                  <span class="input-group-addon">Search</span>
              </div>
            </div> -->
            <button class="btn btn-success" data-toggle="modal" data-target="#create-ticket" ng-if="is_admin == '0' && is_developer== '0'">Create New</button>
            <button class="btn btn-success" data-toggle="modal" data-target="#add-developer" ng-if="is_admin == '1'">Add Developer</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#list-developer" ng-if="is_admin == '1'" ng-click="devlist()">List Developers</button>
        </div>
    </div>
</div>
<table class="table table-bordered pagin-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Assigned to</th>
            <th>Date</th>
            <th width="270px" ng-if="is_admin == '1'">Action</th>
            <th width="125px" ng-if="is_admin != '1'">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr dir-paginate="value in data | itemsPerPage:100" total-items="totalItems">
            <td>{{ $index + 1 }}</td>
            <td><span data-toggle="modal" ng-click="ticketview(value.ticket_id)" data-target="#edit-data" class="viewtitle">{{ value.title }}</span></td>
            <td>
                <span style="text-transform:capitalize;" ng-controller="TicketsController" ng-init="ticketcategory()">
                    <span ng-repeat="item in ticketcategory">
                        <span ng-if="item.id == value.category_id">{{item.name}}</span>
                    </span>
                </span>
            </td>
            <td>                    
                <span class="label label-success" ng-if="value.status == 'Open'">{{ value.status }}</span>
                <span class="label label-danger" ng-if="value.status != 'Open'">{{ value.status }}</span>
            </td>
            <td>
                <!-- <span ng-controller="TicketsController" ng-init="devdetails(value.developer_id)">
                    <span ng-if="devassigneddetails.name != '' || devassigneddetails.name != 'null'" >
                        {{devassigneddetails.name}}
                    </span>
                    <span ng-if="devassigneddetails.developer_id == '0' || devassigneddetails.developer_id == 'null'" style="color:red;">
                        Not Assigned
                    </span>
                </span> -->
                <span ng-init="devlist()">
                    <span ng-repeat="dvdt in devslist">
                        <span ng-if="value.developer_id == dvdt.id">
                            {{dvdt.name}}
                        </span> 
                    </span> 
                </span>
            </td>
            <td>{{value.created_at}}</td>
            <td ng-init="isdeveloper()">

                <!-- <button data-toggle="modal" ng-click="ticketreopen(value.ticket_id)" class="btn btn-success" ng-if="is_admin == '0'">Re-Open</button> -->
                <button data-toggle="modal" ng-click="ticketview(value.ticket_id)" data-target="#edit-data" class="btn btn-primary">View</button>
                <button data-toggle="modal" ng-click="ticketclose(value.ticket_id)" class="btn btn-danger" ng-if="is_admin == '1' || is_developer == '1'">Close</button>                
                <!--<button ng-click="remove(value,$index)" class="btn btn-danger">Delete</button>-->
                <span ng-init="devlist()" style="float:right;margin-right:10px;" ng-if="value.status != 'Closed' && is_admin == '1' && value.developer_id == '0'"  >


                    <!-- <select ng-model="devassign" name="devassign" id="devassign" ng-options="item.name for item in devslist" ng-change="assignto(value.ticket_id)" >
                        <option value="" disabled>-- Assign to --</option>
                    </select> -->

                    <select ng-model="devassign" name="devassign" id="devassign"  ng-change="assignto(value.ticket_id, devassign)" >
                        <option value="" disabled>-- Assign to --</option>
                        <option ng-repeat="fdev in devslist" value="{{fdev.id}}" >
                            {{fdev.name}}
                        </option>
                    </select>
               </span>
            </td>
        </tr>
    </tbody>
</table>
<dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber)" template-url="templates/dirPagination.php" ></dir-pagination-controls>

<!-- Create Ticket -->

<div class="modal fade" id="create-ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <form method="POST" name="createticket" id="createticket" role="form" ng-submit="saveAdd()">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Create Ticket</h4>

            </div>

            <div class="modal-body">

                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <strong>Title : </strong>

                            <div class="form-group">

                                <input ng-model="title" type="text" placeholder="Title" name="title" id="title" class="form-control" required />

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12" ng-init="ticketcategory()">
                                 
                            <strong>Category : </strong>
                                   
                            <div class="form-group">

                                <select ng-model="category" name="category" id="category" ng-options="item.name for item in ticketcategory">
                                    <option value="" disabled>-- choose --</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <strong>Priority : </strong>

                            <div class="form-group" >

                                <select ng-model="priority" name="priority" id="priority">
                                    <option value='' disabled selected>Please Select</option>
                                    <option label="low" value="low">Low</option>
                                    <option label="medium" value="medium">Medium</option>
                                    <option label="high" value="high">High</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <strong>Message : </strong>

                            <div class="form-group" >

                                <textarea ng-model="message" id="message" name="message" class="form-control" required>

                                </textarea>

                            </div>

                        </div>

                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" ng-disabled="addItem.$invalid" class="btn btn-primary">Submit</button>
                    <div style="color:green;margin-top:10px;display: inline;"> {{ticketrespo}} </div>
                </div>

            </div>

            </form>

        </div>

    </div>

</div>

</div>

<!-- View Modal -->

<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><strong>{{view.ticket.title}}</strong><small> - # {{view.ticket.ticket_id}}</small> 
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
                        </div>
                        <div class="panel-body">
                            <div class="ticket-info">
                                <p>{{view.ticket.message}}</p>
                                <p>&nbsp;</p>
                                <p><strong>Categry:</strong> {{view.category.name}}</p>
                                <p style="text-transform:capitalize;"><strong>Priority:</strong> {{view.ticket.priority}}</p>
                                <p><strong>Assigned to:</strong> 
                                    <span ng-init="devlist()">
                                        <span ng-repeat="dvdt in devslist">
                                            <span ng-if="view.ticket.developer_id == dvdt.id">
                                                {{dvdt.name}}
                                            </span> 
                                        </span> 
                                    </span>        
                                </p>
                                <p><strong>Status:</strong> <span class="label label-success" ng-if="view.ticket.status == 'Open'">{{ view.ticket.status }}</span>
                                    <span class="label label-danger" ng-if="view.ticket.status != 'Open'">{{ view.ticket.status }}</span>
                                </p>
                                <p><strong>Created on:</strong> {{view.ticket.created_at}}</p>
                            </div>
                            <hr>
                            <div class="comments" ng-repeat = "comm in view.comments">
                            <div class="panel panel-success">
                                <div class="panel panel-heading">
                                    <span class="comments" ng-repeat = "commuser in view.commentuser">
                                        <span ng-if="comm.user_id == commuser.id">
                                            <strong>{{commuser.name}}</strong>
                                        </span>
                                    </span>
                                    <span class="pull-right">{{comm.created_at}}</span>
                                </div>

                                <div class="panel panel-body">
                                    {{comm.comment}}     
                                </div>
                            </div>
                            </div>
                            <div class="comment-form">
                                <strong>Add Comment </strong>
                                <form method="POST" name="commentform" id="commentform" class="form" ng-submit="ticketcomment(view.ticket.id, view.ticket.user_id, view.ticket.ticket_id)">
                                
                                    <!--  <input name="_token" value="Z5l6tQvu2d76uMqyXcXZPeTS3uKql7YqAyhHvY0G" type="hidden"> -->
                                    
                                    <!-- <input type="text" ng-model="user_id" name="user_id" id="user_id" value="" >

                                    <input type="text" ng-model="ticket_id" name="ticket_id" id="ticket_id" value="" >  -->

                                    <div class="form-group">    
                                        <textarea ng-model="comment" rows="5" id="comment" class="form-control" name="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                        <!-- <div style="color:green;margin-top:10px; display: inline;"> {{ticketcom}} </div> -->
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <form method="POST" name="editItem" role="form" ng-submit="saveEdit()">

                <input ng-model="name" type="hidden" placeholder="Name" name="name" id="name" class="form-control"  />

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Ticket Details</h4>

            </div>

            <div class="modal-body">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-6">

                            <div class="form-group">

                               <input ng-model="form.title" type="text" placeholder="Name" name="title" class="form-control" required />

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">

                            <div class="form-group">

                               <textarea ng-model="form.description" class="form-control" required>

                                </textarea>

                            </div>

                        </div>

                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" ng-disabled="editItem.$invalid" class="btn btn-primary create-crud">Submit</button>

                </div>

            </div>

            </form> -->

        </div>

    </div>

</div>

<!-- Add Developer -->

<div class="modal fade" id="add-developer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content" >

             <!-- {{dero}}
            <p ng-repeat="(error, errorObject) in devrespo">
                 <span ng-repeat=" singleError in errorObject">{{singleError}}</span>
            </p>

            <p ng-repeat="(error, errorText) in devrespo">{{errorText[0]}}</p> -->

            <form method="POST" name="adddeveloper" id="adddeveloper" role="form" ng-submit="adddev()">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Add Developer</h4>

            </div>

            <div class="modal-body">

                <div class="container">

                    <div class="row">
                        <div style="color:green;margin-bottom:15px;display: block;"> {{devrespo}} </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <strong class="col-xs-4 col-sm-4 col-md-4" style="line-height: 2.4em;">Name </strong>

                            <div class="form-group col-xs-8 col-sm-8 col-md-8" >

                                <input ng-model="name" type="text" placeholder="Name" name="name" id="name" class="form-control" required />

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12" ng-init="ticketcategory()">
                                 
                            <strong class="col-xs-4 col-sm-4 col-md-4" style="line-height: 2.4em;">E-Mail </strong>
                                   
                            <div class="form-group col-xs-8 col-sm-8 col-md-8">

                                <input ng-model="email" type="email" placeholder="E-mail" name="email" id="email" class="form-control" required />

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <strong class="col-xs-4 col-sm-4 col-md-4" style="line-height: 2.4em;">Password </strong>

                            <div class="form-group col-xs-8 col-sm-8 col-md-8">

                                <input ng-model="password" type="password" placeholder="Password" name="password" id="password" class="form-control" required />

                            </div>

                        </div>

                        <!--<div class="col-xs-12 col-sm-12 col-md-12">

                            <strong class="col-xs-4 col-sm-4 col-md-4" style="line-height: 2.4em;">Confirm Password </strong>

                            <div class="form-group col-xs-8 col-sm-8 col-md-8">
                                <input ng-model="confirmpassword" type="password" placeholder="Confirm-password" name="confirmpassword" id="confirmpassword" class="form-control" required />
                            </div>

                        </div>-->

                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4"></div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <button type="submit" ng-disabled="addItem.$invalid" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>

            </form>

        </div>

    </div>

</div>

<!-- List Developer -->

<div class="modal fade" id="list-developer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >

    <div class="modal-dialog" role="document">

        <div class="modal-content" >

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                <h4 class="modal-title" id="myModalLabel">Developers</h4>

            </div>

            <div class="modal-body">

                <div class="container">
                    <span style="color:green;margin-bottom:15px;display: block;">{{devremoved}}</span>
                    <table class="table table-bordered pagin-table">
                        <tbody>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Action</th>  
                            </tr>
                            <tr ng-repeat="dev in devslist">
                                <td>{{ $index + 1 }}</td>
                                <td>{{dev.name}}</td>
                                <td>{{dev.email}}</td>
                                <td>{{dev.created_at}}</td>
                                <td><button ng-click="devlremove(dev.id)" class="btn btn-danger">Remove</button></td>
                            </tr>                          
                        </tbody>
                    </table>    

                </div>

            </div>    

        </div>

    </div>

</div>

</div> 