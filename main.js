(() => {
    const startButton = document.querySelector('#get-started'); 
    startButton.addEventListener('click', scrollToFirstCategory());
	const categoryItems = document.querySelectorAll('.category-item');
	for(let i = 0; i < categoryItems.length; i++) {
        categoryItems[i].addEventListener('click', function() {
            if (categoryItems[i].classList.contains('clicked') === 'true') {
                categoryItems[i].classList.remove('clicked');
            } else {
                categoryItems[i].classList.add('clicked');
            }
        });
	}

})();
