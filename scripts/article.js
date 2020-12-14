function htmlDecode(input){
    var e = document.createElement('div');
    e.innerHTML = input;
    return e.childNodes[0].nodeValue;
}


const content = htmlDecode($('#content').html())
$('#content').hide()

const cols = content.split('%~brk%')
cols.shift()

console.log(cols)

cols.forEach((col, index) => {
    console.log(col, index)
    if (index === 0) {
        $('#one').html(col)
    } else if (index === 1) {
        $('#two').html(col)
    } else {
        $(`<div class="col" spellcheck="false">${col}</div>`).appendTo($('#page-one'))
    }
})