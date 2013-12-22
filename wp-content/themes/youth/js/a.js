(function(){
	var ul = $(".slides");
var slides = ul.find("li");
var length = slides.length;
var prev = $("#video-banner").find(".prev");
var next = $("#video-banner").find(".next");
prev.find(".txt").html(slides.eq(0).attr("data-desc"));
next.find(".txt").html(slides.eq(2).attr("data-desc"));
var marginLeft = 298;
var width = 792;
var current = 1;
var start = 1;
var stage = 3;
var sliding = false;

// console.log(slides.clone());
ul.append(slides.clone());
// console.log(slides.clone().length);
slides.clone().insertBefore(ul.find("li:eq(0)"));
ul.css("left",parseInt(ul.css("left")) - width * length);

var startLeft = parseInt(ul.css("left"));
prev.on("click",function(e){
	if(sliding == true){return;}
	sliding = true;
	e.preventDefault();
	current -= 1;
	var current_slides = $(".slides li");
	var prevli = current_slides.eq(current).prev();
	var nextli = current_slides.eq(current).next();

	prevli = prevli.length ? prevli : current_slides.last();
	nextli = nextli.length ? nextli : current_slides.first();

	prev.find(".txt").html(prevli.attr("data-desc"));
    next.find(".txt").html(nextli.attr("data-desc"));

    ul.animate({
		left:parseInt(ul.css("left")) + width
	},function(){
		if(current == start - length){
			ul.css("left",startLeft);
			current = start;
		}
		sliding = false;
	});
});

next.on("click",function(){	
	if(sliding == true){return;}
	current += 1;
	var current_slides = $(".slides li");
	var prevli = current_slides.eq(current).prev();
	var nextli = current_slides.eq(current).next();

	prevli = prevli.length ? prevli : current_slides.last();
	nextli = nextli.length ? nextli : current_slides.first();

	prev.find(".txt").html(prevli.attr("data-desc"));
    next.find(".txt").html(nextli.attr("data-desc"));
    
    ul.animate({
		left:parseInt(ul.css("left")) - width
	},function(){
		if(current == start + length){
			ul.css("left",startLeft);
			current = start;
		}
		sliding = false;
	});
});

})();