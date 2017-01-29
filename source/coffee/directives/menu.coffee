module.exports = ->
	menu = 
		controller : ["$scope", "$rootScope", "$timeout", ($scope, $rootScope, $timeout)->
			$rootScope.isModal = off
			$rootScope.isContact = off
			$rootScope.isMenu = off
			$scope.modal = (kind)->
				$rootScope.isModal = on
				if kind is 'contact'
					$rootScope.isContact = on
					$timeout ->
						contact.refresh()
					, 500
				else
					$rootScope.isMenu = on
					$timeout ->
						contact.refresh()
					, 500
				return
			return
		]