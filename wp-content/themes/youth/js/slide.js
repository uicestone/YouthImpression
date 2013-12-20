(function(){
	var slides = $("#Product-content1 li");
	var triggersBar = $(".Pro-click");
	var prev = triggersBar.find(".prev");
	var next = triggersBar.find(".next");
	var triggers = triggersBar.find("li");
	var active = triggersBar.eq(0);
	var current = triggers.index(current);

	function to(n){
		console.log("n",slides.eq(n),"c",slides.eq(current));
		if(n==current){return;}
		slides.eq(current).fadeOut();
		slides.eq(n).fadeIn();
		triggers.find("img").attr("src","images/pro-noClick.png");
		triggers.eq(n).find("img").attr("src","images/pro-nowClick.png");
		current = n;
	}

	function toNext(){
		var nex = current + 1; 
		if(current >= slides.length - 1){
			nex = 0;
		}
		to(nex);
	}

	function toPrev(){
		var nex = current - 1; 
		if(current <= 0){
			nex = slides.length - 1;
		}
		to(nex);
	}

	prev.on("click",toPrev);

	next.on("click",toNext);
	triggers.on("click",function(e){
		e.preventDefault();
		to(triggers.index(this));
	});
	setInterval(toNext,5000);
})();