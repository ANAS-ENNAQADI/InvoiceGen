function logout() {
  
  window.location.href = "logout.php";
}


var dropVisible = false;
function showdrop(){
var menu = document.getElementById("menu");
menu.style.display="block";
dropVisible = true;
}
function hidedrop(){
  var menu = document.getElementById("menu");
  menu.style.display="none";
  dropVisible = false;
}


function play(){

 

  if(dropVisible==false){
    showdrop();

  }else {
    hidedrop();

  }
}

 

  
    
  function displayPhoto() {
    var logoInput = document.getElementById('img');
    var logoImg = document.getElementById('logo');
    var label = document.querySelector('label[for="img"]');
    var removeIcon = document.querySelector('.remove-icon');
  
    var file = logoInput.files[0];
    var reader = new FileReader();
  
    reader.onload = function(e) {
      logoImg.src = e.target.result;
      // Set z-index of the label and remove-icon span to -1
      label.style.zIndex = -1;
      removeIcon.style.zIndex = 2;
    };
  
    if (file) {
      reader.readAsDataURL(file);
    }
  }
  function removePhoto() {
    var logoInput = document.getElementById('img');
    var logoImg = document.getElementById('logo');
    var label = document.querySelector('label[for="img"]');
  
    // Remove the photo
    logoImg.src = "";
  
    // Reset the file input value to allow selecting a new photo
    logoInput.value = "";
  
    // Set the z-index of the label to 2
    label.style.zIndex = "2";
  }
  
  let mainContainerHeight = 740;
  let additionalElementsTop = 60;
  let buttonTop = 37; 
  let formCounter = 1; // To keep track of the number of forms added
  let buttonbuttom = 60;
  let Bbottom  = 0;
 

  // Add an event listener to the <select> element
  let totali =0 ;
  let totalit =0;
function calculateTotal() {
    var quantityInput = document.getElementById('quantity');
    var rateInput = document.getElementById('rate');
    var totalElement = document.getElementById('totalInput');
  
      
      var quantity = parseFloat(quantityInput.value);
      var rate= parseFloat(rateInput.value);
      if (isNaN(quantity)) {
        quantity = 0.00;
    }

    if (isNaN(rate)) {
        rate = 0.00;
    }

    var total = quantity * rate;
    var selectel = document.getElementById('fruit');
   
    var selectedValue = selectel.value;

   

    totalElement.value = total.toFixed(2)+" "+selectedValue;
     totali = total;
  
     displayTotal();
     
  
  }



function calculateTotalForForm(form) {
  let quantity = parseFloat(form.querySelector("#quantity").value);
  let rate = parseFloat(form.querySelector("#rate").value);
  
  if (isNaN(quantity)) {
      quantity = 0.00;
  }

  if (isNaN(rate)) {
      rate = 0.00;
  }
  

  const total = quantity * rate;
  var selectel = document.getElementById('fruit');
   
  var fruit= selectel.value;
  const totalInput = form.querySelector("#totalInput");
  totalInput.value =  total.toFixed(2) +" "+ fruit ;
  
  totalit = total + totalit ;

 displayTotal();

}
let total1 = 0 ;
function displayTotal(){
   total1 = totalit + totali ;
   var selectel = document.getElementById('fruit');
   
  var fruit= selectel.value;
  const totalAmountInput = document.getElementById("totalAmountInput");
  
  totalAmountInput.value = total1.toFixed(2) + " " +fruit ;
}



function deleteForm(form) {
  const formContainer = document.querySelector(".formcontainer");
  formContainer.removeChild(form);

  let quantity = parseFloat(form.querySelector("#quantity").value);
  let rate = parseFloat(form.querySelector("#rate").value);

  if (isNaN(quantity)) {
    quantity = 0.00;
  }

  if (isNaN(rate)) {
    rate = 0.00;
  }

  const totalDeleted = quantity * rate;
  totalit -= totalDeleted; // Subtract the deleted form's total from totalit

  // Adjust layout as needed
  mainContainerHeight -= 50; // Decrease main container height
  const mainContainer = document.querySelector("#main");
  mainContainer.style.height = mainContainerHeight + "px";

  const additionalElementsContainer = document.querySelector(".boti");
  additionalElementsTop -= 50; // Decrease top position
  additionalElementsContainer.style.top = additionalElementsTop + "px";

  const button = document.getElementById("but");
  buttonTop -= 50; // Decrease top position of button
  button.style.top = buttonTop + "px";

  const totalAmountInput = document.getElementById("total");
  
  Bbottom += 50;
  totalAmountInput.style.bottom=Bbottom + "px";
  // Update the displayed total
  displayTotal();
}





function addNewForm(event) {
  event.preventDefault();
  const formContainer = document.querySelector(".formcontainer");
  const existingForm = document.querySelector("#pari");

  // Clone the existing form
  const newForm = existingForm.cloneNode(true);

 
  // Reset input values for the new form (optional)
  const inputFields = newForm.querySelectorAll("input[type='text']");
  inputFields.forEach((input) => (input.value = ""));

 

   
  
    // Set initial rate and quantity values
    const rateInput = newForm.querySelector("input[name='rate[]']");
    rateInput.value = "0";
  
    const quantityInput = newForm.querySelector("input[name='quantity[]']");
    quantityInput.value = "1";

   var selectel = document.getElementById('fruit');
   
   var fruit= selectel.value;
   const amountInput = newForm.querySelector("input[name='amount[]']");
   amountInput.value = "0.00"+" "+ fruit; // Initialize quantity to 1
 
 




  // Remove the 'id' attribute from the cloned form to avoid duplicate IDs
  newForm.removeAttribute("id");
  formCounter++;
  const newInputFields = newForm.querySelectorAll("input[type='text']");
  newInputFields.forEach((input) => input.addEventListener("input", () => calculateTotalForForm(newForm)));
  
  const deleteIcon = document.createElement("span");
  deleteIcon.className = "delete-icon";
  deleteIcon.innerHTML = '<i class="fas fa-trash-alt"></i>';
  

  // Add event listener to the delete icon to delete the form
  deleteIcon.addEventListener("click", () => deleteForm(newForm));

  // Append the delete icon to the new form
  newForm.appendChild(deleteIcon);
  formContainer.appendChild(newForm);
  
 
  


  mainContainerHeight += 50; // Increase the height by 100 pixels (you can adjust this value as needed)
  const mainContainer = document.querySelector("#main");
  mainContainer.style.height = mainContainerHeight + "px";

  const additionalElementsContainer = document.querySelector(".boti");
  additionalElementsTop += 50; // Increase the top position by 100 pixels (you can adjust this value as needed)
  additionalElementsContainer.style.top = additionalElementsTop + "px";

  const button = document.getElementById("but");
  buttonTop += 50;
   // Increase the top position by 100 pixels (you can adjust this value as needed)
  button.style.top = buttonTop + "px";

  const totalAmountInput = document.getElementById("total");
  
  Bbottom -= 50;
  totalAmountInput.style.bottom=Bbottom + "px";


}

function updateAmount(form) {
  var selectel = form.querySelector("#fruit");
  var fruit = selectel.value;

  const quantityInput = form.querySelector("input[name='quantity']");
  const rateInput = form.querySelector("input[name='rate']");
  const amountInput = form.querySelector("input[name='amount']");
  
  var quantity = parseFloat(quantityInput.value);
  var rate = parseFloat(rateInput.value);

  if (isNaN(quantity)) {
    quantity = 0.00;
  }

  if (isNaN(rate)) {
    rate = 0.00;
  }

  const total = quantity * rate;

  amountInput.value = total.toFixed(2) + " " + fruit;
}

// Function to show the popup
function showPopup() {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
}

// Function to hide the popup
function hidePopup() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

// Close the modal if the user clicks outside the content area



async function generatePDF() {
  try {
    // Get the span icon and "line item" button elements
    const spanIcon = document.getElementById('but');
    const span = document.getElementById('x');
    const lineItemButton = document.querySelector('#but');

    // Temporarily remove the elements from the DOM
   
    spanIcon.style.display="none";
    // Create a new PDF document
    const docDefinition = {
      content: [],
    };

    // Get the HTML content of the main section where the form data is located
    const mainContent = document.getElementById('main');

    // Convert the HTML content to a canvas using html2canvas
    const canvas = await html2canvas(mainContent);
    const imageData = canvas.toDataURL('image/png');
    const pdfWidth = canvas.width / 2.10; // You can adjust this value to set the image width in the PDF
    const pdfHeight = canvas.height; // You can adjust this value to set the image height in the PDF

    // Add the image as a PDF page
    docDefinition.content.push({ image: imageData, width: pdfWidth, height: pdfHeight });

    // Create the PDF using pdfmake
    const pdfDocGenerator = pdfMake.createPdf(docDefinition);

    // Download the PDF with a file name
    pdfDocGenerator.download('invoice.pdf');
    
    spanIcon.style.display="block";
   
  } catch (error) {
    console.error('Error generating PDF:', error);
  }
}


function openhistory(){
  window.location.href ="history.php";
}












function borderC (){
var text1 = document.getElementById("1");
var text2 = document.getElementById("2");
var text3 = document.getElementById("3");
var text4 = document.getElementById("4");
var text5 = document.getElementById("5");
if (text1.value=="" ){
  text1.style.borderColor = "red";

}else{
  text1.style.borderColor = "green";
}
 if (text2.value==""){
  
  text2.style.borderColor = "red";
 
}else{
  text2.style.borderColor = "green";
}
 if (text3.value==""){
  text3.style.borderColor = "red";
 
}else{
  text3.style.borderColor = "green";
}
 if (text4.value==""){
    text4.style.borderColor = "red";
    
  }else{
    text4.style.borderColor = "green";
  }
     if (text5.value==""){
      text5.style.borderColor = "red";
    }else{
      text5.style.borderColor = "green";
    }
    
}











