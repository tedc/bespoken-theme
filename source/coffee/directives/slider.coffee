module.exports = ->
    slider = 
        scope: on
        controller : ['$scope', "$element", "$attrs", "$timeout", "$window", ($scope, $element, $attrs, $timeout, $window)->
            $scope.pos = 0
            speed = .5
            w = angular.element $window
            isContent = if $attrs.isContentAnim then on else off
            delay = if $attrs.delay then $scope.$eval $attrs.delay else 0
            $scope.isSliding = off
            $scope.dir = (cond, pos, max)->
                #return if (pos - 1 < 0 and not cond) or (pos + 1 > max and cond)
                return if $scope.isSliding
                Tl = new TimelineMax()
                $scope.isSliding = on
                if cond
                    pos += 1
                    delay = if isContent then delay else 0 + delay
                else
                    pos -= 1
                    delay = delay
                pos = if pos < 0 then max else (if pos > max then 0 else pos)
                $scope.pos = pos
                Tl
                    .to $element[0].querySelector('.mask'), speed,
                        right : "0%"
                    .set $element[0].querySelectorAll('.slider-item'),
                        x : "-#{100*$scope.pos}%"
                    .to $element[0].querySelector('.mask'), speed,
                        left : "100%"
                    .set $element[0].querySelector('.mask'),
                        left : "0%"
                        right : "0%"
                classTimeout = $timeout ->
                    $timeout.cancel classTimeout
                    $scope.isSliding = off
                    return
                , speed*1000
                return
             return
        ]