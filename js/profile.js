//Buttons
const createDevlogButton = document.getElementById('createDevlog');
const editDevlogsButton = document.getElementById('editDevlogs');
//Blocks
const createBlock = document.getElementById('createBlock');
const editBlock = document.getElementById('editBlock');

if(createDevlogButton != null){
    createDevlogButton.onclick = function(event){
        ToggleBlocks(createBlock);
    }    
}
if(editDevlogsButton != null){
    editDevlogsButton.onclick = function(event){
        ToggleBlocks(editBlock);
    }    
}
function ToggleBlocks(block){
    let anotherBlock;
    if(block == createBlock){
        anotherBlock = editBlock;
    }
    else{
        anotherBlock = createBlock;
    }
    anotherBlock.style.display = "none";
    block.style.display = "flex";
}