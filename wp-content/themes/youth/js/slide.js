var Slide = function(opt){
    var pause = false;
    var slides = opt.slides;
    var container = slides.parent();
    var triggers = $(opt.triggers);
    var prev = opt.prev;
    var next = opt.next;
    var afterChange = opt.afterChange || function(){};
    var change = opt.change || function(){};
    var current = opt.current || 0;
    var circle = typeof opt.circle === "boolean" ? opt.circle : true;
    var autoplay = typeof opt.autoplay === "boolean" ? opt.autoplay : true;
    
    function bindPause(elems){
        elems.on("mouseenter",function(){
            pause = true;
        }).on("mouseleave",function(){
            pause = false;
        });
    }

    bindPause(triggers);
    bindPause(slides);

    var toPrev = opt.toPrev || function (){
        var nex = current - 1; 
        if(current <= 0){
            if(circle){
                nex = slides.length - 1;
            }else{
                nex = nex + 1;
            }
        }
        if(nex != current){
            to(nex,current,"prev");
        }
    };

    var toNext = opt.toNext || function (){
        if(pause){return;}
        var nex = current + 1; 
        if(current >= slides.length - 1){
            if(circle){
                nex = 0;
            }else{
                nex = nex - 1;
            }
        }

        if(nex != current){
            to(nex,current,"next");
        }
    };

    function to(n,cur,dir){
        if(n==current){return;}
        change(slides.eq(current),slides.eq(n),n,cur,dir);
        afterChange(n);
        current = n;
    }

    prev.on("click",toPrev);

    next.on("click",toNext);
    triggers.on("click",function(e){
        e.preventDefault();
        to(triggers.index(this));
    });
    autoplay && setInterval(toNext,3000);
};