angular = require 'angular'
require 'angular-resource'
require 'angular-cookies'
require 'angular-sanitize'
require 'angular-touch'
require 'angular-animate'

bspkn = angular.module 'bspkn', ['ngTouch', 'ngAnimate', 'ngSanitizie', 'ngResource', 'ngCookies']
require './directives/index.coffee'