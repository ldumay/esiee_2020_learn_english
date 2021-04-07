const dragStart = event => {
    event.currentTarget.classList.add('dragging');
};

const dragEnd = event => {
    event.currentTarget.classList.remove('dragging');
};

document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('dragstart', dragStart);
    card.addEventListener('dragend', dragEnd);
});

const drag = event => {
    event.dataTransfer.setData('text/html', event.currentTarget.outerHTML);
    event.dataTransfer.setData('text/plain', event.currentTarget.dataset.id);
};

const dragEnter = event => {
    event.currentTarget.classList.add('drop');
};

const dragLeave = event => {
    event.currentTarget.classList.remove('drop');
};

document.querySelectorAll('.column').forEach(column => {
    column.addEventListener('dragenter', dragEnter);
    column.addEventListener('dragleave', dragLeave);
});

const drop = event => {
    document.querySelectorAll('.column').forEach(column => column.classList.remove('drop'));
    document.querySelector(`[data-id="${event.dataTransfer.getData('text/plain')}"]`).remove();

    event.currentTarget.innerHTML = event.currentTarget.innerHTML + event.dataTransfer.getData('text/html');
};

const allowDrop = event => {
    event.preventDefault();
};
const allowDrop1 = event => {
    nb_element = document.getElementsByClassName("column").item(1).children.length - 1 ;
    if (nb_element >= 1 ){} else{event.preventDefault();}
};
const allowDrop2 = event => {
    nb_element = document.getElementsByClassName("column").item(2).children.length - 1 ;
    if (nb_element >= 1 ){} else{event.preventDefault();}
};
const allowDrop3 = event => {
    nb_element = document.getElementsByClassName("column").item(3).children.length - 1 ;
    if (nb_element >= 1 ){} else{event.preventDefault();}
};
const allowDrop4 = event => {
    nb_element = document.getElementsByClassName("column").item(4).children.length - 1 ;
    if (nb_element >= 1 ){} else{event.preventDefault();}
};


function verify() {
    if(document.getElementsByClassName("column").item(0).children.length - 1 > 1){
        alert('il reste un ou plusieurs mots à placer')
    }
    else{
        for(i=1; i<4;i++){
            if(document.getElementsByClassName("column").item(i).children.item(0).id == document.getElementsByClassName("column").item(i).children.item(1).id){
               ok = true;
            }
            else{
                ok = false;
            } 
        }
        if(ok){
            alert('bravo')
        }
        else{
            alert('faux')

        }  
    }
  }

  var items = $('article');
  items.sort(function(a, b){
      return +$(a).data('id') - +$(b).data('id');
  });
      
  items.appendTo('div1');