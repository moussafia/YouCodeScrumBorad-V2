const form=document.forms['taskForm'];
let save=document.getElementById('save');
let update=document.getElementById('Update');
let delet=document.getElementById('delete');

function AddTask(){
    //hide button update and delete when I click on add task button
    update.style.display='none';
    delet.style.display = 'none';
    save.style.display='inline';
    document.getElementById('form-title').innerHTML="ADD Task";

}

function clickBtntasks(parmeID){
    //hide button save when I click on button tasks
    update.style.display='inline';
    delet.style.display = 'inline';
    save.style.display='none';
    document.getElementById('form-title').innerHTML="Edit Task";
            form.title.value = document.getElementById(parmeID).getAttribute("title");
            form.type.value=document.getElementById(parmeID).getAttribute("typeForm");
            form.Priority.value=document.getElementById(parmeID).getAttribute("PriorityForm");
            form.Status.value=document.getElementById(parmeID).getAttribute("StatusForm");
            form.date.value=document.getElementById(parmeID).getAttribute("dateForm");
            form.Description.value=document.getElementById(parmeID).getAttribute("DescriptionForm");
            
}
