window.controller = new ScrollMagic.Controller()
angular = require 'angular'
require 'angular-resource'
require 'angular-cookies'
require 'angular-sanitize'
require 'angular-touch'
require 'angular-animate'
require 'angular-iscroll'
require 'angular-youtube-embed'

bspkn = angular.module 'bspkn', ['ngTouch', 'ngAnimate', 'ngSanitize', 'ngResource', 'ngCookies', 'angular-iscroll', 'youtube-embed']
require './directives/index.coffee'
require './resources/index.coffee'
require './animations/index.coffee'