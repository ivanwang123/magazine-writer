import {getCaretPosition, setCaretPosition} from './caret.js'
import {colWidth} from './resize.js'

$('#submit').click(() => {
    const cols = $.map($('.col'), (col) => col.innerHTML)
    const img = $('#front-img').attr('src')
    
    $('#submit').html('Publishing...')

    $.ajax({
        type: 'POST',
        url: 'editor.php',
        data: {content: cols, img: img},
        success: function(data) {
            window.location.replace('/blog')
        }
    })
})

$('#img-src-btn').click(() => {
    $('#front-img').attr('src', $('#img-src-input').val())
})

$('#imbed-src-btn').click(() => {
    let newNode = document.createElement('div')
    newNode.className = 'imbed-img-container'
    let newImg = document.createElement('img')
    newImg.className = 'imbed-img'
    newImg.setAttribute('src', $('#imbed-src-input').val())
    newNode.appendChild(newImg)

    addNode(newNode)
    $('#imbed-src-input').val('')
    $('#imbed-img-modal').modal('hide')
})

let hotkey = false
let col = null;
let nodes = null;
let caret = null;

function generateNode(key) {
    let newNode = null
    if (key === 49) {
        newNode = document.createElement('div')
        newNode.className = 'title'
        newNode.textContent = ''
        newNode.setAttribute('contenteditable', 'true')
    } else if (key === 50) {
        newNode = document.createElement('div')
        newNode.className = 'subtitle'
        newNode.textContent = ''
    } else if (key === 51) {
        newNode = document.createElement('div')
        newNode.className = 'quote'
        newNode.textContent = ''
    } else if (key === 52) {
        $('#imbed-img-modal').modal('show')
    } else if (key === 53) {
        const page = document.getElementById('page-one')
        const col = document.createElement('div')
        col.className = 'col'
        col.setAttribute('contenteditable', 'true')
        col.setAttribute('spellcheck', 'false')
        col.style.width = colWidth + 'px'
        col.style.minWidth = colWidth + 'px'
        col.style.maxWidth = colWidth + 'px'
        page.appendChild(col)
        col.focus()
    }
    return newNode
}

function addNode(newNode) {
    if (nodes.length) {

        let charOffset = 0;
        let nodeLength = nodes.length
        for (let n = 0; n < nodeLength; n++) {
            let node = nodes[n]
            if (node.textContent.length + charOffset < caret) {
                charOffset += node.textContent.length
            } else {
                const offsetCaret = caret - charOffset
                let start = node.textContent.substring(0, offsetCaret)
                let end = node.textContent.substring(offsetCaret, node.length)
                const startNode = document.createTextNode(start)
                const endNode = document.createTextNode(end)
                let nodeOffset = 1
                
                if (newNode) {
                    col.removeChild(col.childNodes[n])
                    col.insertBefore(endNode, col.childNodes[n])
                    col.insertBefore(newNode, col.childNodes[n])
                    col.insertBefore(startNode, col.childNodes[n])
                    if (n === nodeLength-1) {
                        let end = document.createTextNode('\u200b')
                        col.appendChild(end)
                    }
                    var range = document.createRange();
                    var sel = window.getSelection();
                    range.setStart(col.childNodes[n+nodeOffset], 0);
                    range.collapse(true);
                    sel.removeAllRanges();
                    sel.addRange(range);
                }
                break
            }
        }
    } else {
        if (newNode) {
            let end = document.createTextNode('\u200b')
            col.appendChild(newNode)
            col.appendChild(end)
        }
    }
}
  
window.addEventListener('keyup', (e) => {
    if (e.keyCode === 18) {
        hotkey = false
    } else {
        
        if (hotkey) {

            col = e.target
            nodes = col.childNodes;
            caret = getCaretPosition(col)[0]

            addNode(generateNode(e.keyCode))
        }
    }
})

window.addEventListener('keydown', (e) => {
    if (e.keyCode === 18) {
        hotkey = true
    }
})
