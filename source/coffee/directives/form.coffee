module.exports = ->
    form =
        scope: on
        controller: [ "$scope", "$rootScope", "transformRequestAsFormPost", "$http", "$timeout", "Upload", "$attrs", "$q", ($scope, $rootScope, transformRequestAsFormPost, $http, $timeout, Upload, $attrs, $q)->
            $scope.isSubmitted = off
            $scope.isPrivacyChecked = off
            $scope.formData = { 
                obj : if $attrs.jobForm then 'Invio curriculum' else 'Richiesta di contatto'
            }
            $scope.isJobSent = off
            $scope.isContactSent = off
            $scope.file = off
            job = $scope.$eval $attrs.jobForm
            $scope.selectFile = (file)->
                $scope.file = file.name
                return
            $scope.onSubmit = (isValid, url)->
                frmdata = $scope.formData
                $scope.isSubmitted = on
                $scope.formData = {}
                $scope.isPrivacyChecked = off
                if job
                    $scope.jobForm.$setUntouched()
                    $scope.jobForm.$setPristine()
                else
                    $scope.contactForm.$setUntouched()
                    $scope.contactForm.$setPristine()
                if isValid
                    if job
                        Upload.upload
                            url : url
                            data : frmdata
                        .then (data)->
                            #window.ga 'send', 'event', 'invio curriculum', 'submit form'
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
                                #window.ga 'send', 'event', 'richiesta info', 'submit form'
                                $scope.isContactSent = on
                                $timeout ->
                                    $scope.isSubmitted = off
                                    $scope.isContactSent = off
                                    return
                                , 5000
                                return
                        if $scope.isNewsChecked
                            subscribe = (data)->
                                defer = $q.defer()
                                params = angular.extend data,
                                    u: "bb274c7bb0c77bc3ff1d61e9c"
                                    d: "357200da1e"
                                    c: 'JSON_CALLBACK'
                                url = "https://bspkn.us8.list-manage.com/subscribe/post-json"
                                $http({
                                    params : params
                                    url: url
                                    method: 'JSONP'
                                }).then (data)->
                                    if data.data.result is 'success'
                                        #now = new Date()
                                        #exp = new Date now.getFullYear(), now.getMonth()+1, now.getDate()
                                        #$cookies.put 'mc_sub', 'subscribed',
                                        #    path : "/"
                                        #    expires : exp
                                        #window.ga 'send', 'event', 'iscrizione alla newsletter', 'submit form'
                                        defer.resolve data.data
                                    else
                                        defer.reject data.data
                                    return
                                , (err)->
                                    defer.reject err
                                    return
                                return defer.promise
                            sender = frmdata.sender.split ' '
                            name = sender[0]
                            lname = ''
                            if sender.length > 1
                                for i in [1..sender.length - 1]
                                    if i is 1
                                        lname += sender[i]
                                    else
                                        lname += " #{sender[i]}"
                            data = 
                                EMAIL : frmdata.email 
                                FNAME : name
                                LNAME : lname
                                MMERGE3 : frmdata.tel
                            subscribe data
                return]