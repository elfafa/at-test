@extends('layouts.app')

@section('content')
<div class="container" ng-app="ticketApp" ng-controller="ticketController">
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <h1>Use a ticket</h1>
            <input type='text' class="form-control" ng-model="usageData.token" placeholder="Token">
            <button class="btn btn-primary btn-md form-control" ng-click="submitUsage()">Use it !</button>
            <div ng-show="usageSuccessMsg" class="form-control ng-hide alert-success col-sm-12">{{ usageSuccessMsg }}</div>
            <div ng-show="usageErrorMsg" class="form-control ng-hide alert-danger col-sm-12">{{ usageErrorMsg }}</div>
            <h1>Create a ticket</h1>
            <input type='text' class="form-control" ng-model="newData.firstname" placeholder="Firstname">
            <input type='text' class="form-control" ng-model="newData.lastname" placeholder="Lastname">
            <input type='text' class="form-control" ng-model="newData.email" placeholder="Email">
            <button class="btn btn-primary btn-md form-control" ng-click="submitNew()">Create it !</button>
            <div ng-show="newErrorMsg" class="form-control ng-hide alert-danger col-sm-12">{{ newErrorMsg }}</div>
            <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
        </div>
        <div class="col-sm-12 col-md-7">
            <h1>Tickets</h1>
            <input ng-hide="!tickets.length" type="text" class="form-control" placeholder="Search a token" ng-model="searchToken.token">
            <table class="table table-striped table-hover" id="ticketsList" ng-show="filterTickets.length">
                <thead>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Token</th>
                    <th>Redeemed at</th>
                </thead>
                <tbody>
                    <tr ng-repeat='ticket in filterTickets = (tickets | filter:searchToken)'>
                        <td>{{ ticket.firstname }} {{ ticket.lastname }}</td>
                        <td>{{ ticket.email }}</td>
                        <td>{{ ticket.token }}</td>
                        <td>{{ ticket.redeemed_at }}</td>
                    </tr>
                </tbody>
            </table>
            <div ng-show="!tickets.length" class="text-center ng-hide">No tickets found</div>
            <div ng-show="tickets.length && !filterTickets.length" class="text-center ng-hide">No tickets found from search</div>
        </div>
    </div>
</div>
@endsection
