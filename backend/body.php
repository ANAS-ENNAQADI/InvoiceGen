<!DOCTYPE html>
<html lang = "en-us">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link  rel ="icon"  type = "image/png" href="/photo/Picsart_23-08-27_16-09-36-931.png">
    <title>Invoice Generator</title>
  
    <link rel = "stylesheet" href="/css/clothes.css">
  
</head>
    <body id="body" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="/js/movement.js"></script>
  
    <nav>
   <div class="header">
        
        <p id ="s1">Invoice Generator</p>
        
            <ul id="navbar">
       <Li><a href="/html/help.html" >Help</a></Li> 
       <li> <a href="/html/about us.html" >About Us</a></li>
      
    </ul>
        
  

   
   <button type="button" onclick="play()"  > <img src="/photo/illustration-businessman_53876-5856.avif"></button>
   </div>
</nav>
    <main id="main" >
      
        <h1 id ="s2">INVOICE</h1>
        <form id="invoiceForm">

   
   <div class="form">
    <label style="color:grey;">Date</label>
        <input name="da_te" style="width:150px; height:35px;background-color: white;margin:4px;margin-left:71px; margin-bottom: 3px;" type="date"  >

        <br>

    <label >Payment Terms</label>
    <input name="pay_terms" style="width:150px; height:35px;margin-left:-5px;background-color: white;margin-right:3px;" type="text" value="1">

        <br>

        <label>Due Date</label>
        <input name="due_date" style="width:150px; height:35px;background-color:white;margin:4px;margin-left:39px;"  type="date" >

        <br>

         <label>PO Number</label>
        <input name="po_number" style="width:150px; height:35px;background-color: white;margin-left:23px"  type="text">

        <br>
       
        </div>

<div class ="f2"   >
    <textarea name="customer" oninput="borderC()" id="3"  placeholder="who is this invoice from?(required)" rows="3" cols="40" required></textarea>
    <br><br>
</div>
<div class="flex">
       
      
    <div class="paste">
        

         <div class="paste2">
            <h4>Bill To</h4>
            <br>
    <textarea required name="bill_to" oninput="borderC()" id="2" placeholder="who is this invoice to?(required)" rows="4" cols="40"></textarea>
</div>

    <div class="paste2">
        <h4>Ship To</h4>
        <br>
    <textarea required name="ship_to" oninput="borderC()" id="1" placeholder="(optional)" rows="4" cols="40"></textarea>
</div>
</div>
<br>
<div class="cal">
<div id ="cmp"  >
<span class="input-group-text">#</span>
    <input name="num" type="text"  value="1" style="text-align:center;height: 35px;width:132px;">
</div>
</div>
<div id="par"  >
    <div class="part">
        <input  type="text" placeholder="Item" style="width:720px; height:25px; border-bottom-left-radius: 5px;border-top-left-radius: 5px;">
    </div>
    <div class="part">
        <input  type="text" placeholder="Quantity" style="width:80px;height:25px;">
    </div>
    <div class="part">
        <input  type="text" placeholder="Rate" style="width:115px;height:25px;">
    </div>
    <div class="part">
        <input  id="pi" type="text" placeholder="Amount" style=" border-bottom-right-radius: 5px;border-top-right-radius: 5px;width:100px;height:25px;" disabled >
    </div>
</div>


<div class="formcontainer">
    <div id="pari">
        <div class="partito">
            <div class="part2">
                <input name="item[]" type="text" placeholder="Description of service or product..." style="width: 718px">
            </div>
            <div class="part3">
                <input name="quantity[]" id="quantity" type="text" placeholder="Quantity" value="1" style="width: 75px; text-align: center;" oninput="calculateTotal()">
            </div>
            <div class="part2">
                <input name="rate[]" type="text" style="width: 109px" value="0" id="rate" oninput="calculateTotal()">
            </div>
            <div class="part2">
                <input name="amount[]" style="width: 100px; border: none; outline: none;" readonly id="totalInput" value="0.00">
            </div>
        </div>
    </div>
</div>



<div class="bata">

<button id ="but" onclick="addNewForm(event)">+ Line Item</button>


<div class="boti">
    <div >
        
        <div class="bot">
            <h4>Notes</h4>
            <br>
            <textarea  oninput="borderC()" id="4" name="notes" rows="4" cols="50" placeholder="Notes - any relevant information not already covered"></textarea>
            <br>
            <h4 style="margin-top:13px">Terms</h4>
            <br>
            <textarea oninput="borderC()" id="5" name="terms" rows="4" cols="50" placeholder="Terms and conditions-late fees, payment methods, delivery schedule"></textarea>
        </div>
    </div>
</div>


</div>
<div class="total" id="total">
    <p>Total : </p>
<input name="total" type="text" readonly  id="totalAmountInput"  value="0.00">
</div>
<div class="pho">
    <span class="remove-icon" id="x" onclick="removePhoto()">
        <i class="fas fa-times"></i>

      </span>
    <img src="" id="logo" alt="">
</div>

   
    <div class="photo">
         
    <LABEL for="img">+ Add Your Logo</LABEL>
  
        <input name="logo" onchange="displayPhoto()" id = "img" type="file" accept="image/*"  >
        
    </div>
    
    
    





    </main>
    <div class="list">
        
    
            <button type="button" class ="down" id="samaka" onclick="showPopup()"> 
                <i class="fas fa-download"></i> Download Invoice</button>
               
        <p>Currency</p>

        <select id="fruit" name="currency" onchange="calculateTotal();calculateTotalForForm(form);">

            <option value="AED" label="AED (د.إ)">AED (د.إ)</option>
            <option value="AFN" label="AFN">AFN</option>
            <option value="ALL" label="ALL (Lek)">ALL (Lek)</option>
            <option value="AMD" label="AMD">AMD</option>
            <option value="ANG" label="ANG (ƒ)">ANG (ƒ)</option>
            <option value="AOA" label="AOA (Kz)">AOA (Kz)</option>
            <option value="ARS" label="ARS ($)">ARS ($)</option>
            <option value="AUD" label="AUD ($)">AUD ($)</option>
            <option value="AWG" label="AWG (ƒ)">AWG (ƒ)</option>
            <option value="AZN" label="AZN (ман)">AZN (ман)</option>
            <option value="BAM" label="BAM (KM)">BAM (KM)</option>
            <option value="BBD" label="BBD ($)">BBD ($)</option>
            <option value="BOB" label="BOB ($b)">BOB ($b)</option>
            <option value="BDT" label="BDT (Tk)">BDT (Tk)</option>
            <option value="BND" label="BND ($)">BND ($)</option>
            <option value="BOV" label="BOV">BOV</option>

          </select>
    
    </div>
   
    
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <span class="close" onclick="hidePopup()">&times;</span>
              <h3>Download Invoice</h3>
              <br>
              <hr style="width:507px; margin-left:-20px;opacity:30%">
              <br>
            <p>what file format do you want ?
            </p>
            <div class="pop">
            <button id="submitInvoice"  onclick=" generatePDF() " id="data"  type="button" class="downl" > <i class="fas fa-download"></i><br>PDF (Recommanded)</button>
            <button><i class="fas fa-download"></i><br> E-invoice</button>
        </div>  
        </div>
          </div>

          <div class="dropdown" id="menu">
                
                
                <div class="myacc">
                    
                    
                    <button type="button" ><i id="user" class="fas fa-user"></i>My Account </button>   
                </div>
                <hr>
                <div class="logout">
                   
                    <button type ="button" onclick="logout()" ><i id="logout" class="fas fa-sign-out-alt"></i>
log out</button>
                </div>

          </div>
        <div class="list2">
    
          
        <label>Type</label><br>
        <select name="type">
            <option value="Invoice" label="Invoice">Invoice</option>

        </select>
        </form>
        
        <hr style="width:230px; position:relative;right:25px;margin-top:15px;opacity:40%">
        <button onclick="openhistory()" id="myButton" >History</button>
    </div>
 
    <footer>
        <div class="foot">
            <div class="fot">
Use Invoice Generator
</div>
<div class="fo">

    <ul>
        <li><a href="">Invoice Template</a></li>
        <li><a href="">How to Use</a></li>
        <li><a href="">Sign In</a></li>
        <li><a href="">Sign Up</a></li>
        <li><a href="">Release Notes</a></li>
        <li><a href="">Developer Api</a></li>
    </ul>
</div>
<div class="fout">
    <p >Education</p>
    <ul>
        
        <li><a href="">Invoicing Guide</a></li>
    </ul>
</div>
<div class="fou">
    <p>© 2012-2023 Invoice-Generator.com</p>
    <ul>
        <Li>
            <a href="">Terms Of Use</a>
        </Li>
    </ul>
</div>
        </div>
        
    </footer>

</body>