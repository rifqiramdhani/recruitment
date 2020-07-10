$(document).ready(function(){
    bsCustomFileInput.init()
    
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});

	
});

//smooth scrolling
let anchorlinks = document.querySelectorAll('a[href^="#"]')
 
for (let item of anchorlinks) { // relitere 
    item.addEventListener('click', (e)=> {
        let hashval = item.getAttribute('href')
        if(hashval != "#"){
			let target = document.querySelector(hashval)
			target.scrollIntoView({
				behavior: 'smooth',
				block: 'start'
			})
			history.pushState(null, null, hashval)
			e.preventDefault()
		}
    })
}

