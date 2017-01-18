'use strict';

describe('Factory: ticketFactory', function () {

    var ticketFactory, scope;

    // load the factory's module
    beforeEach(function() {
        module('ticketApp');
    });

    beforeEach(inject(function() {
        var $injector = angular.injector(['ticketApp']);
        ticketFactory = $injector.get('ticketFactory');
    }));

    it('should return a list of tickets', function () {
        expect(ticketFactory.get().length).toBe(0);
    });
});