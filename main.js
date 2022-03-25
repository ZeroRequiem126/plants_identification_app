(() => {
    const startButton = document.querySelector('#get-started'); 
    const Category2 = document.getElementById('category-2');
    const Category3 = document.getElementById('category-3');
    const Category4 = document.getElementById('category-4');
    const Category5 = document.getElementById('category-5');
    const Category6 = document.getElementById('category-6');
    const Category7 = document.getElementById('category-7');
    const SearchButton = document.getElementById('js-search-button');
    console.log(SearchButton);


    const select1 = document.querySelector('[name="leaf_attachment"]');
    select1.onchange = event => {
        Category2.scrollIntoView(true);
    }
    const select2 = document.querySelector('[name="leaf_pattern"]');
    select2.onchange = event => {
        Category3.scrollIntoView(true);
    }
    const select3 = document.querySelector('[name="leaf_shape"]');
    select3.onchange = event => {
        Category4.scrollIntoView(true);
    }
    const select4 = document.querySelector('[name="leaf_blade"]');
    select4.onchange = event => {
        Category5.scrollIntoView(true);
    }
    const select5 = document.querySelector('[name="leaf_edge"]');
    select5.onchange = event => {
        Category6.scrollIntoView(true);
    }
    const select6 = document.querySelector('[name="leaf_vein"]');
    select6.onchange = event => {
        Category7.scrollIntoView(true);
    }
    const select7 = document.querySelector('[name="leaf_lateral_vein"]');
    select7.onchange = event => {
        SearchButton.scrollIntoView(true);
    }

    const PageTopBtn = document.getElementById('js-scroll-top');
    
    PageTopBtn.addEventListener('click', () =>{
        window.scrollTo({
            top: 0,
        });
    });

    function confirmForm() {
        return alert('Are you want to submit the form?');
    }

})();
