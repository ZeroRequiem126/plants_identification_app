(() => {
    const editButton = document.querySelector('#edit-button');
    editButton.addEventListener('click', function() {
        history.back()
        window.scrollTo(0, document.getElementById('category-1').offsetTop);
    });
})();