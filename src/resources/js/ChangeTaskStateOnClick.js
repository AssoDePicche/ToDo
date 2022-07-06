const checkboxes = document.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(checkbox => {
    checkbox.onclick = function () {
        this.parentNode.submit();
    }
});
