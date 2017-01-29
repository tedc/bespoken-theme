module.exports = ->
	menu = 
		controller : ["$scope", "$rootScope", "$timeout", ($scope, $rootScope, $timeout)->
			$rootScope.isModal = off
			$rootScope.isContact = off
			$rootScope.isMenu = off
			$scope.modal = (kind)->
				if kind is 'contact' then $rootScope.isContact = on else $rootScope.isMenu = on
				return
			return
		]