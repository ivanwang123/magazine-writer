function node_walk(node, func) {
    var result = func(node);
    for(node = node.firstChild; result !== false && node; node = node.nextSibling)
        result = node_walk(node, func);
    return result;
};

export function getCaretPosition(elem) {
    var sel = window.getSelection();
    var cum_length = [0, 0];
  
    if(sel.anchorNode == elem)
        cum_length = [sel.anchorOffset, sel.extentOffset];
    else {
        var nodes_to_find = [sel.anchorNode, sel.extentNode];
        if(!elem.contains(sel.anchorNode) || !elem.contains(sel.extentNode))
            return undefined;
        else {
            var found = [0,0];
            var i;
            node_walk(elem, function(node) {
                for(i = 0; i < 2; i++) {
                    if(node == nodes_to_find[i]) {
                        found[i] = true;
                        if(found[i == 0 ? 1 : 0])
                            return false;
                    }
                }
        
                if(node.textContent && !node.firstChild) {
                    for(i = 0; i < 2; i++) {
                        if(!found[i])
                            cum_length[i] += node.textContent.length;
                    }
                }
            });
            cum_length[0] += sel.anchorOffset;
            cum_length[1] += sel.extentOffset;
        }
    }
    
    if(cum_length[0] <= cum_length[1])
        return cum_length;
    return [cum_length[1], cum_length[0]];
}
  
export function setCaretPosition(ctrl, pos) {
    if (ctrl.setSelectionRange) {
        ctrl.focus();
        ctrl.setSelectionRange(pos, pos);
    } else if (ctrl.createTextRange) {
        var range = ctrl.createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
    }
}