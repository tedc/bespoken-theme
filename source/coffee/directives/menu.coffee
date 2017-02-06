module.exports = ->
	menu = 
		controller : ["$scope", "$rootScope", "$timeout", ($scope, $rootScope, $timeout)->
			$rootScope.isModal = off
			$rootScope.isContact = off
			$rootScope.isMenu = off
			$rootScope.modal = (kind, open)->
				$rootScope.isModal = open
				if kind is 'contact' then $rootScope.isContact = open else $rootScope.isMenu = open
				return
			return
		]