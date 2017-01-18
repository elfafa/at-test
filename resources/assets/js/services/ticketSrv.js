angular.module('ticketSrv', [])

.factory('ticketFactory', ['$http', function($http) {

    return {
        // get all the tickets
        get : function() {
            return $http.get('/api/tickets');
        },

        // create a ticket (firstname/lastname/email passed in ticket data)
        save : function(ticketData) {
            return $http({
                method : 'POST',
                url    : '/api/tickets/store',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                },
                data   : $.param(ticketData),
            });
        },

        // update a ticket (token passed in ticket data)
        update : function(ticketData) {
            return $http({
                method : 'POST',
                url    : '/api/tickets/update',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                },
                data   : $.param(ticketData),
            });
        },
    }

}]);