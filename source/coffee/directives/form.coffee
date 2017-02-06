module.exports = ->
    form =
        scope: on
        controller: [ "$scope", "$rootScope", "transformRequestAsFormPost", "$http", "$timeout", "Upload", "$attrs", ($scope, $rootScope, transformRequestAsFormPost, $http, $timeout, Upload, $attrs)->
            $scope.isSubmitted = off
            $scope.isPrivacyChecked = off
            $scope.formData = { 
                obj : if $attrs.jobForm then 'Invio curriculum' else 'Richiesta di contatto'
            }
            $scope.isJobSent = off
            $scope.isContactSent = off
            $scope.onSubmit = (isValid, url)->
                frmdata = $scope.formData
                $scope.isSubmitted = on
                $scope.formData = {}
                $scope.isPrivacyChecked = off
                $scope.contactForm.$setUntouched()
                $scope.contactForm.$setPristine()
                if isValid
                    if $attrs.jobForm
                        Upload.upload
                            url : url
                            data : frmdata
                        .then (data)->
                            window.ga 'send', 'event', 'invio curriculum', 'submit form'
                            $scope.isJobSent = on
                            $timeout ->
                                $scope.isSubmitted = off
                                $scope.isJobSent = off
                                return
                            , 5000
                            return
                    else
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
                                $scope.isContactSent = on
                                $timeout ->
                                    $scope.isSubmitted = off
                                    $scope.isContactSent = off
                                    return
                                , 5000
                                return
                return]