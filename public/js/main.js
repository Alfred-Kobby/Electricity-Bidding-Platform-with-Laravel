//This is for the producer but it will share some of its functionalities with the bulk customer
// Get modall element 
var modal = document.getElementById('producerModall');
// Get open modal button
var modalBtn = document.getElementById('modalProducer');
//Get close button 
var closeBtn = document.getElementById('closeBtn');

//Listen for a click
modalBtn.addEventListener('click',openModal);

closeBtn.addEventListener('click',closeModal);

//modal.addEventListener('click',closeModal);

//Function to open the model
function openModal(){
    modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}



// Get modall element 
var modal = document.getElementById('customerModall');
// Get open modal button
var modalBtn = document.getElementById('modalCustomer');
//Get close button 
var closeBtn = document.getElementById('closeBtn');

//Listen for a click
modalBtn.addEventListener('click',openModal);

closeBtn.addEventListener('click',closeModal);

//modal.addEventListener('click',closeModal);

//Function to open the model
function openModal(){
    modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}