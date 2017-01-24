module.exports = ->
    carousel = 
        scope: on
        controller : ['$scope', "$element", "$attrs", "$timeout", "$window", ($scope, $element, $attrs, $timeout, $window)->
            $scope.pos = 0
            speed = 1
            w = angular.element $window
            isContent = if $attrs.isContentAnim then on else off
            delay = if $attrs.delay then $scope.$eval $attrs.delay else 0
            $scope.dir = (cond, pos, max)->
                #return if (pos - 1 < 0 and not cond) or (pos + 1 > max and cond)
                return if $scope.isSliding
                $scope.isSliding = on
                if cond
                    pos += 1
                    delay = if isContent then delay else 0 + delay
                else
                    pos -= 1
                    delay = delay
                pos = if pos < 0 then max else (if pos > max then 0 else pos)
                $scope.pos = pos
                TweenMax
                    .staggerTo $element[0].querySelectorAll('.carousel-item'), speed,
                        x : "-#{100*$scope.pos}%"
                        delay : delay
                        #ease: Power3.easeOut
                classTimeout = $timeout ->
                    $timeout.cancel classTimeout
                    $scope.isSliding = off
                    return
                , speed*1000
                return
             return
        ]