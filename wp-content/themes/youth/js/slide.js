var Slide = function(opt){
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
    var endless = typeof opt.endless === "boolean" ? opt.endless : false;
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


    if(endless){
        function clone(num){
            for(var i = 0;i<num;i++){
                var before_el = $(slides.eq(0 + i));
                var after_el = $(slides.eq(slides.length - 1 - i));
                slides.parent().find("li").first().before(after_el.clone());
                slides.parent().find("li").last().after(before_el.clone());
            }
            container.css({left:parseInt(container.css("left")) - num * before_el.width()});
        }
        clone(2);
    }

    prev.on("click",toPrev);

    next.on("click",toNext);
    triggers.on("click",function(e){
        e.preventDefault();
        to(triggers.index(this));
    });
    autoplay && setInterval(toNext,5000);
};