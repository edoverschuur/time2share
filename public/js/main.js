let checkbox_elektronica = document.getElementById("elektronica");
let checkbox_literatuur = document.getElementById("literatuur");
let checkbox_gereedschap = document.getElementById("gereedschap");
let checkbox_meubulair = document.getElementById("meubulair");
let checkbox_overig = document.getElementById("overig");

let list_of_categories = document.getElementsByTagName("li");

checkbox_elektronica.addEventListener('change', function() {
    if (checkbox_elektronica.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Elektronica') {
                list_of_categories[i].style.display = "";
            }
        }
    }
    if (!checkbox_elektronica.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Elektronica') {
                list_of_categories[i].style.display = "none";
            }
        }
    }
});

checkbox_literatuur.addEventListener('change', function() {
    if (checkbox_literatuur.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Literatuur') {
                list_of_categories[i].style.display = "";
            }
        }
    }
    if (!checkbox_literatuur.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Literatuur') {
                list_of_categories[i].style.display = "none";
            }
        }
    }
});

checkbox_gereedschap.addEventListener('change', function() {
    if (checkbox_gereedschap.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Gereedschap') {
                list_of_categories[i].style.display = "";
            }
        }
    }
    if (!checkbox_gereedschap.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Gereedschap') {
                list_of_categories[i].style.display = "none";
            }
        }
    }
});

checkbox_meubulair.addEventListener('change', function() {
    if (checkbox_meubulair.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Meubulair') {
                list_of_categories[i].style.display = "";
            }
        }
    }
    if (!checkbox_meubulair.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Meubulair') {
                list_of_categories[i].style.display = "none";
            }
        }
    }
});

checkbox_overig.addEventListener('change', function() {
    if (checkbox_overig.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Overig') {
                list_of_categories[i].style.display = "";
            }
        }
    }
    if (!checkbox_overig.checked) {
        for (let i = 0; i < list_of_categories.length; i++) {
            if (list_of_categories[i].dataset.categoryOfProduct === 'Overig') {
                list_of_categories[i].style.display = "none";
            }
        }
    }
});

