module.exports = ->
    video =
        scope: on
        controller : ["$scope", "$element", ($scope, $element)->
            tween = TweenMax.to { index : 0}, 5,
                        index : 10
                        onUpdateParams : ['{self}']
                        onUpdate : (evt)->
                            if evt.target.index > 0 and evt.target.index <= 9.6
                                $scope.playVideo on
                            else
                                $scope.playVideo off
                            return
            enterVideoScene = new ScrollMagic.Scene
                    triggerElement : $element[0]
                    duration : "100%"
                .setTween tween
                .addTo controller
            $scope.playVideo = (cond)->
                if cond then $element[0].play() else $element[0].pause()
                return
            return
        ]