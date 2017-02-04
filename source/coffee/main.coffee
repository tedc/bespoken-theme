window.controller = new ScrollMagic.Controller()
angular = require 'angular'
require 'angular-resource'
require 'angular-cookies'
require 'angular-sanitize'
require 'angular-touch'
require 'angular-animate'
require 'angular-youtube-embed'
require 'angular-mousewheel'

bspkn = angular.module 'bspkn', ['ngTouch', 'ngAnimate', 'ngSanitize', 'ngResource', 'ngCookies', 'youtube-embed', 'angular-mousewheel']
require './directives/index.coffee'
require './resources/index.coffee'
require './animations/index.coffee'