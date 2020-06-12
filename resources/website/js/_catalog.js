document.addEventListener("DOMContentLoaded",function(){  
    console.log('init catalog section');

    document.querySelectorAll('#nav-tree-categories a').forEach((categoryAnchor) => {
        categoryAnchor.addEventListener('click', selectCategory);
    });    

});

const selectCategory = function(e) {

    console.log(this.parentElement.classList);

    if (!this.parentElement.classList.contains("sub-menu")) {        
        // consultar productos por categoría.
    }

    e.preventDefault();
};
