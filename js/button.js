jQuery(document).ready(function(){
  
  ripple.init();
$('.button-ripple').on('click touchstart', ripple.click);
  
});

var ripple = {
  click: function(event){
  /*
  if ( $(this).find('.ripple').length ){
    return;
  }
  */
  event.preventDefault();
  
  var 
    $this = $(this),
    $ripples = $this.find('.button-ripple_ripples'),
    rippleColor = $this.attr('data-ripple-color') || $this.css('color'),
    btnOffset = $this.offset(),
    inputX = ( event.type === 'click' ) ? event.pageX : event.originalEvent.touches[0].pageX,
    inputY = ( event.type === 'click' ) ? event.pageY : event.originalEvent.touches[0].pageY,
    xPos = inputX - btnOffset.left,
    yPos = inputY - btnOffset.top;
  
    $ripples.append('<span class="button-ripple_ripple"></span>');
    
    var $ripple = $ripples.find('.button-ripple_ripple');
    
    $ripple.on(animationEnd, function(){ $(this).remove(); });
  
    $ripples[0].style.webkitTransform = 'translate3d(' + xPos + 'px,' + yPos + 'px,0)';
    $ripples[0].style.transform = 'translate3d(' + xPos + 'px,' + yPos + 'px,0)';
    
    $ripple.css({ backgroundColor: rippleColor });
    
},
  init: function(){
    $('.button-ripple').wrapInner('<span class="button-ripple_content"></span>');
    $('.button-ripple').append('<div class="button-ripple_ripples"></div>')
  }
};

var animation = {
	// Determines proper transition property per browser
	whichAnimationEvent: function(){
		var t;
		var el = document.createElement('fakeelement');
		var transitions = {
			'OAnimation':'oanimationend',
			'MozAnimation':'animationend',
			'WebkitAnimation':'webkitAnimationEnd',
			'animation':'animationend'
		};
		for(t in transitions){
			if( el.style[t] !== undefined ){
				return transitions[t];
			}
		}
	}
};
// Makes it easier to bind cross browser, like $('element').one(transitionEnd, function(){});
var animationEnd = animation.whichAnimationEvent(); 