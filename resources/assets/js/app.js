
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Load controller and service for tickets
 */

require('./controllers/mainCtrl');
require('./services/ticketService');

var ticketApp = angular.module('ticketApp', ['mainCtrl', 'ticketService']);
