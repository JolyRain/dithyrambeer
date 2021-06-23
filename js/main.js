

function count_symbols(el) {
    // let review = document.getElementById('review');
    // review.addEventListener('keyup', function (evt) {
        let text_length = el.value.length;
        // console.log(text_length)
        if (text_length > 1000) {
            $('#symb_count').removeClass('hidden')
            $('#review').addClass('border-danger')
            $('#send_opin').addClass('disabled')
        } else {
            $('#symb_count').addClass('hidden')
            $('#review').removeClass('border-danger')
            $('#send_opin').removeClass('disabled')
        }

}

function click_radio(el) {
    let radio_buttons = document.getElementsByName(el.name);
    for (let button of radio_buttons) {
        if (button !== el)
            button.oldChecked = false;
    }
    if (el.oldChecked)
        el.checked = false;
    el.oldChecked = el.checked;
}

function max_rating() {
    let radio_labels = document.getElementsByClassName('unselectable')
    return radio_labels.length
}

function enter_label(el) {
    let input = document.getElementById(el.getAttribute('for'))
    let rate = document.getElementById('rate')
    rate.innerText = input.value + '/' + max_rating();
}

function leave_label(el) {
    let rate = document.getElementById('rate')
    rate.innerText = '';
    for (let button of el) {
        if (button.checked)
            rate.innerText = button.value + '/' + max_rating()
    }

}

