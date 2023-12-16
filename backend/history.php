

<!DOCTYPE html>
<html lang = "en-us">
<head>
   
    <title>History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel = "stylesheet" href="/css/history.css">
    <script src="/js/history.js"></script>
    <script src="/js/movement.js"></script>
    <link  rel ="website icon"  type = "image/png" href="/photo/Picsart_23-08-27_16-09-36-931.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <body class="body" >
  

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

   <main class="main" id ="main">
    <div class="head">
    <h1>History</h1>
    <p>We automatically save invoices that you created recently to your device. This is useful when you need to quickly make an edit to an invoice.</p>
  </div> 
  <div class="sear">
 
        <button id="searchButton" onclick="searchTable()" ><i class="fas fa-search"></i></button>
        <input oninput="appearx()" type="text" id="searchInput" placeholder="Enter your search query">
        <button id="clearButton" onclick="clearx()"><i class="fas fa-times-circle"></i></button>
  </div>
  <div class="but">
    <button id="export" >
        Export
    </button>
    <button id="inv" type="button" onclick="openPage()">
        New Invoice
    </button>
    
  </div>
  <center>
    <br>
  
    <p id="p">No invoices found</p></center><br><BR>
  
    <table class="data-table">
    <thead>
      <tr id="tr">
        <th>Customer</th>
        <th>Bill_to</th>
        <th>Total</th>
        <th>Type</th>
        <th>Date</th>
        
        <th>Delete</th>
        <!-- Add more table headers for other columns -->
      </tr>
    </thead>
    <tbody>
      <!-- Data will be dynamically populated here -->
    </tbody>
  </table>
  <div class="down" id="down">
  <hr>
  <div class="dow">
  <i class="fas fa-exclamation-triangle alert-icon"></i>
  <p> <pre>These invoices are stored on your device only. Clearing your browser's history will erase these invoices. We
recommend hanging on to a copy of each invoice you generate.</pre></p>
  </div></div>

</main>


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
    <footer id="footer">
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
</html>




















