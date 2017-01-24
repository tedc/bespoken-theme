module.exports = ->
    form =
        scope: on
        controller: [ "$scope", "$rootScope", "transformRequestAsFormPost", "$http", "$timeout", ($scope, $rootScope, transformRequestAsFormPost, $http, $timeout)->
            $scope.appointment = false
            $scope.formData = {
                day: []
                time: []
                budget: []
            }
            $scope.pushData = (data, value)->
                idx = data.indexOf value
                if idx isnt -1
                    data.splice idx, 1
                else
                    if not $scope.isAny
                        data.push value
                    else
                        data = [value]
                return
            $scope.onSubmit = (isValid, url)->
                frmdata = $scope.formData
                $rootScope.isSubmitted = on
                $scope.formData = {}
                $scope.any = off
                $scope.time = off
                $rootScope.isPrivacyChecked = off
                $scope.contactForm.$setUntouched()
                $scope.contactForm.$setPristine()
                if isValid
                    $http(
                        {
                            method: 'POST'
                            url: url
                            data: frmdata
                            headers :
                                "Content-type" : "application/x-www-form-urlencoded; charset=utf-8"
                            transformRequest: transformRequestAsFormPost
                        }).then (data)->
                            window.ga 'send', 'event', 'richiesta info', 'submit form'
                            $rootScope.isContactSent = on
                            $timeout ->
                                $rootScope.isSubmitted = off
                                $rootScope.isContactSent = off
                            , 5000
                            return
                return]