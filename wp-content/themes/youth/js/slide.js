var Slide = function(opt){
	var slides = opt.slides;
	var triggers = $(opt.triggers);
	var prev = opt.prev;
	var next = opt.next;
	var afterChange = opt.afterChange || function(){};
	var change = opt.change || function(){};
	var current = opt.current || 0;
	var circle = typeof opt.circle === "boolean" ? opt.circle : true;
	var autoplay = typeof opt.autoplay === "boolean" ? opt.autoplay : true;

	function to(n){
		if(n==current){return;}
		change(slides.eq(current),slides.eq(n),n);
		afterChange(n);
		current = n;
	}

	function toNext(){
		var nex = current + 1; 
		if(current >= slides.length - 1){
			if(circle){
				nex = 0;
			}else{
				nex = nex - 1;
			}
		}

		if(nex != current){
			to(nex);
		}
	}

	function toPrev(){
		var nex = current - 1; 
		if(current <= 0){
			if(circle){
				nex = slides.length - 1;
			}else{
				nex = nex + 1;
			}
		}
		if(nex != current){
			to(nex);
		}
	}

	prev.on("click",toPrev);

	next.on("click",toNext);
	triggers.on("click",function(e){
		e.preventDefault();
		to(triggers.index(this));
	});
	autoplay && setInterval(toNext,5000);
};