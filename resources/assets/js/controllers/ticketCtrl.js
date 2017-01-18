angular.module('ticketCtrl', [])

// inject the ticketFactory service into our controller
.controller('ticketController', ['$scope', '$http', 'ticketFactory', function($scope, $http, ticketFactory)
{
    // object to hold all the data for the new ticket form
    $scope.newData = {};

    // object to hold all the data for the ticket usage form
    $scope.usageData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

    // string to search tokens
    $scope.searchToken = '';

    // get all the tickets first and bind it to the $scope.tickets object
    // use the function we created in our service
    // GET ALL TICKETS ==============
    ticketFactory.get()
        .success(function(data) {
            $scope.tickets = data;
            $scope.loading = false;
        });

    // function to handle submitting the new ticket form
    // SAVE A TICKET ================
    $scope.submitNew = function() {
        $scope.usageSuccessMsg = null;
        $scope.usageErrorMsg   = null;
        $scope.newErrorMsg     = null;
        $scope.loading         = true;

        // save the ticket. pass in ticket data from the form
        // use the function we created in our service
        ticketFactory.save($scope.newData)
            .success(function(data) {
                if (data.success) {
                    $scope.newData = {};
                    // if successful, we'll need to refresh the ticket list
                    ticketFactory.get()
                        .success(function(getData) {
                            $scope.tickets = getData;
                            $scope.loading = false;
                        });
                } else {
                    $scope.newErrorMsg = data.reason;
                }
            })
            .error(function(data) {
                console.log(data);
            });
    };

    // function to handle submitting the form
    // SAVE A TICKET ================
    $scope.submitUsage = function() {
        $scope.usageSuccessMsg = null;
        $scope.usageErrorMsg   = null;
        $scope.newErrorMsg     = null;
        $scope.loading         = true;

        // save the ticket. pass in ticket data from the form
        // use the function we created in our service
        ticketFactory.update($scope.usageData)
            .success(function(data) {
                if (data.success) {
                    $scope.usageData       = {};
                    $scope.usageSuccessMsg = data.reason;
                    // if successful, we'll need to refresh the ticket list
                    ticketFactory.get()
                        .success(function(getData) {
                            $scope.tickets = getData;
                            $scope.loading = false;
                        });
                } else {
                    $scope.usageErrorMsg = data.reason;
                }
            })
            .error(function(data) {
                console.log(data);
            });
    };

}]);