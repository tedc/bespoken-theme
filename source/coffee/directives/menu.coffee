module.exports = ->
	menu = 
		controller : ["$scope", "$rootScope", "$timeout", ($scope, $rootScope, $timeout)->
			$rootScope.isModal = off
			$rootScope.isContact = off
			$rootScope.isMenu = off
			$scope.modal = (kind, istance)->
				$rootScope.isModal = on
				kind = on
				$timeout ->
					istance.refresh()
				, 500
				return
			return
		]