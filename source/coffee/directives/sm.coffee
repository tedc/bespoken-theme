em = (val)->
    val/16
module.exports = ($rootScope, $timeout)->
    sm =
        restrict : 'AE'
        scope: on
        link: (scope, element, attrs)->
            return off if mobilecheck()
            ## EVAL DURATION
            duration = if attrs.duration and attrs.duration.indexOf('%') isnt -1 then attrs.duration else (if attrs.duration then scope.$eval attrs.duration else 0)
            
            ## TRIGGER
            trigger = if attrs.triggerElement then attrs.triggerElement else element[0]
            trigger = if trigger is 'parent' then element.parent()[0] else trigger
            el = if attrs.triggerElement and attrs.triggerElement.indexOf('#') isnt -1 then document.querySelector(attrs.triggerElement) else trigger
            
            ## TRIGGER HOOOK
            hook = if attrs.triggerHook then attrs.triggerHook else 0.5
            if typeof scope.$eval hook is "number"
                winPer = scope.$eval hook 
            else
                if hook is 'onEnter'
                    winPer = 1
                else if hook is 'onLeave'
                    winPer = 0
                else if hook is 'onCenter'
                    winPer = 0.5
            ## RECALCULATE DURATION
            duration = if attrs.heightDuration then el.offsetHeight * scope.$eval(attrs.heightDuration ) + ( window.innerHeight * winPer ) else duration
            
            ## OFFSET
            offset = if attrs.offset then scope.$eval attrs.offset else 0
            pin = if attrs.pin then element[0] else off
            ## TWEEN
            from = if attrs.from then scope.$eval attrs.from else off
            to = if attrs.to then scope.$eval attrs.to else off
            speed = if attrs.speed then scope.$eval attrs.speed else .5
            if from or to
                tween = if from and to then TweenMax.fromTo( element, speed, from, to ) else (if from then TweenMax.from(element, speed, from) else TweenMax.to element, .5, to)
            else
                tween = off
            
            ## CLASS TOGGLE
            classToggle = if attrs.classToggle then attrs.classToggle else off
            ## DESTROY SCENE IF EXISTS OR IS DESTROYED
            
            $rootScope.$on 'sceneDestroy', ->
                scene.destroy() if scene
                return
                
            scene.destroy() if scene
            scene = new ScrollMagic.Scene
                            triggerElement : trigger
                            triggerHook : hook
                            offset : offset
                            duration : duration

                
            ## SET SCENE
            $timeout ->
                scene.setTween tween if tween isnt off    
                scene.setClassToggle element[0], classToggle if classToggle isnt off
                scene.setPin pin if pin isnt off
                scene.addTo controller
            , 0
            return