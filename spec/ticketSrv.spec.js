'use strict';

describe('Factory: ticketFactory', function () {

    var ticketFactory, scope, http, responseData;

    // load the factory's module
    beforeEach(function() {
        module('ticketSrv');
    });

    beforeEach(inject(function($injector, $httpBackend) {
        http          = $httpBackend;
        ticketFactory = $injector.get('ticketFactory');
    }));

    it('should return a list of tickets', function () {
        http.whenGET('/api/tickets').respond(200, [
            { "id":1, "firstname":"1st", "lastname":"1st", "email":"1st@email.net", "token":"11111", "redeemed_at":null },
            { "id":2, "firstname":"2nd", "lastname":"2nd", "email":"2nd@email.net", "token":"22222", "redeemed_at":null },
            { "id":3, "firstname":"3rd", "lastname":"3rd", "email":"3rd@email.net", "token":"33333", "redeemed_at":null },
        ]);
        ticketFactory.get().then(function (data) {
            responseData = data.data;
        });
        http.flush();
        expect(responseData.length).toBe(3);
    });

    // it('should save a new ticket', function () {
    //     http.whenPOST('/api/tickets/save').respond(200,
    //         { "success":true, "reason":null }
    //     );
    //     var newData = { 'firstname':'4th', 'lastname':'4th', 'email':'4th@email.net' };
    //     ticketFactory.save(newData).then(function (data) {
    //         responseData = data.data;
    //     });
    //     http.flush();
    //     expect(responseData.success).toBe(true);
    // });
});