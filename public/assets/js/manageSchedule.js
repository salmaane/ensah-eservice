
function dragStartHandler(event) {
    event.dataTransfer.setData("text/html",event.target.id);
    event.dataTransfer.dropEffect = "copy";
  }

const module_dropzones = document.querySelectorAll(".module-dropzone");

module_dropzones.forEach(element => {
    element.addEventListener("drop", e => {
        e.preventDefault();
        if(!e.target.classList.contains('module-dropzone')) return;
        const data = e.dataTransfer.getData("text/html");
        const module = document.getElementById(data);
        
        if(e.target.childNodes.length > 0) {
          e.target.childNodes[0].remove();
        };
        
        const clonedElement = module.cloneNode(true);
        clonedElement.id += '-cloned';
        e.target.appendChild(clonedElement);
    });

    element.addEventListener("dragover",e => {
        e.preventDefault();

        e.dataTransfer.dropEffect = "move";
    });
});

function deleteModule(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData("text/html");
    const module = document.getElementById(data);
    
    if(module.parentElement.tagName == 'TD') {
      module.parentElement.innerHTML = '';
    }

  }

function deleteDragOver(event) {
    event.preventDefault();

    event.dataTransfer.dropEffect = "move";
}


const scheduleData = {
  lundi: {
    '08:00-10:00' : {
      prof: '',
      module: '',
    },
    '10:00-12:00' : {
      prof: '',
      module: '',
    },
    '14:00-16:00' : {
      prof: '',
      module: '',
    },
    '16:00-18:00' : {
      prof: '',
      module: '',
    }
  },

  mardi: {
    '08:00-10:00' : {
      prof: '',
      module: '',
    },
    '10:00-12:00' : {
      prof: '',
      module: '',
    },
    '14:00-16:00' : {
      prof: '',
      module: '',
    },
    '16:00-18:00' : {
      prof: '',
      module: '',
    }
  },

  mercredi: {
    '08:00-10:00' : {
      prof: '',
      module: '',
    },
    '10:00-12:00' : {
      prof: '',
      module: '',
    },
    '14:00-16:00' : {
      prof: '',
      module: '',
    },
    '16:00-18:00' : {
      prof: '',
      module: '',
    }
  },

  jeudi: {
    '08:00-10:00' : {
      prof: '',
      module: '',
    },
    '10:00-12:00' : {
      prof: '',
      module: '',
    },
    '14:00-16:00' : {
      prof: '',
      module: '',
    },
    '16:00-18:00' : {
      prof: '',
      module: '',
    }
  },

  vendredi: {
    '08:00-10:00' : {
      prof: '',
      module: '',
    },
    '10:00-12:00' : {
      prof: '',
      module: '',
    },
    '14:00-16:00' : {
      prof: '',
      module: '',
    },
    '16:00-18:00' : {
      prof: '',
      module: '',
    }
  },

  samedi: {
    '08:00-10:00' : {
      prof: '',
      module: '',
    },
    '10:00-12:00' : {
      prof: '',
      module: '',
    },
    '14:00-16:00' : {
      prof: '',
      module: '',
    },
    '16:00-18:00' : {
      prof: '',
      module: '',
    }
  },
}

function getScheduleJSONData(event) {

  const tableCells = Array.from(document.querySelectorAll("td.module-dropzone"));
  
  const modulesNames = tableCells.map(td => {
    console.log(td);
    if(td.innerHTML == '') return '';
    return td.children[0].children[0].textContent;
  });

  const profsNames = tableCells.map(td => {
    if(td.innerHTML == '') return '';
    return td.children[0].children[1].textContent;
  });

  let i=0;
  for(let day in scheduleData) {
    let hours = scheduleData[day];

    for(let hour in hours) {
      hours[hour].module = modulesNames[i];
      hours[hour].prof = profsNames[i];
      i++;
    }
  }

  const input = document.getElementById('jsonData');
  input.value = JSON.stringify(scheduleData);
}