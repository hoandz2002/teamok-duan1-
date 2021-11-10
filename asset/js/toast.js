const toast = document.getElementsByClassName('.tst_test');
const main = document.getElementById('toast');
main.onclick = function(e) {
    if (e.target.closest('.toast__close')) {
        main.style.display = 'none';
    }
}