//Buttons
const createDevlogButton = document.getElementById('createDevlog');
const editDevlogsButton = document.getElementById('editDevlogs');
const writeMessageButton = document.getElementById('writeMessage');
const checkMessagesButton = document.getElementById('checkMessages');
//Blocks
const createBlock = document.getElementById('createBlock');
const editBlock = document.getElementById('editBlock');
const writeMessageBlock = document.getElementById('writeMessageBlock');
const checkMessagesBlock = document.getElementById('checkMessagesBlock');

if(createDevlogButton != null){
    createDevlogButton.onclick = function(event){
        ToggleAdminBlocks(createBlock);
    }    
}
if(editDevlogsButton != null){
    editDevlogsButton.onclick = function(event){
        ToggleAdminBlocks(editBlock);
    }    
}
if(writeMessageButton != null){
    writeMessageButton.onclick = function(event){
        ToggleMessageBlocks(writeMessageBlock);
    }    
}
if(checkMessagesButton != null){
    checkMessagesButton.onclick = function(event){
        ToggleMessageBlocks(checkMessagesBlock);
    }    
}
function ToggleAdminBlocks(block){
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
function ToggleMessageBlocks(block){
    let anotherBlock;
    if(block == writeMessageBlock){
        anotherBlock = checkMessagesBlock;
    }
    else{
        anotherBlock = writeMessageBlock;
    }
    anotherBlock.style.display = "none";
    block.style.display = "flex";
}