<html>

<head>
  <link rel="shortcut icon" type="x-icon" href="cnc-logo.png">

  <link rel="stylesheet" href="style/navigation.css">
  <link rel="stylesheet" href="style/about-us.css">
  <link rel="stylesheet" href="style/contact-us.css">
  <link rel="stylesheet" href="style/general.css">
  <link rel="stylesheet" href="style/products.css">
  <link rel="stylesheet" href="style/service.css">
  <link rel="stylesheet" href="style/home.css">
  <link rel="stylesheet" href="style/chatbot.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Inclusive+Sans:ital@0;1&family=Raleway:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
</head>

<body onload="ss(-1);">
  <?php
  include('user-view/navbar.php');

  ?>

  <!--Home/Front Page-->

  <div class="home-outer-div">
    <div class="homer-inner-div">

      <button onclick="chg_img(-1);" class="left-arrow-btn"> <img class="left-arrow" src="front-img/left_arrow.png"> </button>

      <img id="front-img" class="front-img" src="front-img/1.png">
      <button onclick="chg_img(1);" class="right-arrow-btn" align="center"><img align="center" class="right-arrow" src="front-img/Right_arrow copy.png"></button>
    </div>
  </div>

  <!--Service section-->
  <div>
    <div class="title-div">
      <h1 class="title-hidden">Services</h1>
    </div>
    <div class="service-item-outer-div">
      <div class="service-item-inner-div-hidden">
        <div>
          <img class="service-img" src="services/service1.jpeg">
        </div>
        <div>
          <p class="service-name">ATC Ball Bearing Spindle</p>
        </div>
        <div class="service-info-div">
          <p class="service-info">
            The high-speed ball bearing spindle with a 60,000 RPM max speed is used in the PCB industry for routing and drilling machines. It boasts a compact, lightweight design, low inertia, minimal vibration, and low noise, ensuring high-speed, high-precision, and stable routing processes.</p>
        </div>
      </div>
      <div class="service-item-inner-div-hidden">
        <div>
          <img class="service-img" src="services/service2.jpeg">
        </div>
        <div>
          <p class="service-name">Air Bearing Spindle</p>
        </div>
        <div class="service-info-div">
          <p class="service-info">Westwind air bearing spindles excel in high-speed, precision, and oil-free applications worldwide, outperforming conventional bearings for increased productivity and quality.</p>
        </div>
      </div>
      <div class="service-item-inner-div-hidden">
        <div>
          <img class="service-img" src="services/service3.png">
        </div>
        <div>
          <p class="service-name">MTC Water Cooled Routing Spindle</p>
        </div>
        <div class="service-info-div">
          <p class="service-info">
            JGD-72 1.5kw 40000rpm ER11 Water Cooling Spindle Motor</p>
        </div>
      </div>
    </div>
    <div class="enquire-div">
      <a class="enquiry-link" href="equire/equiry_form.php">Enquiry</a>
    </div>
  </div>

  <!--Product section-->
  <div>
    <div class="title-div">
      <h1 class="title-hidden">Products</h1>
    </div>
    <div class="product-item-div">
      <?php
      include('config/dbcon.php');
      $query = "SELECT * FROM add_product";

      $product = $query_run = mysqli_query($conn, $query);
      if (mysqli_num_rows($product) > 0) {
        foreach ($product as $item) {
      ?>
          <div class="product-item1-div-hidden">
            <div>
              <img class="product-img" src="uploads/<?= $item['image']; ?>" alt="Product Image">
            </div>
            <div>
              <div class="product-title-div">
                <p class="product-title"><?= $item['name']; ?></p>
              </div>
              <div class="product-info-div"><?= $item['description']; ?>
              </div>
              <div class="enquire-div">
                <a class="enquiry-link" href="equire/equiry_form.php">Enquiry</a>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>

    </div>

    <!--div>
  <div class="title-div">
    <h1 class="title-hidden">Products</h1>
    </div>
  <div class="product-item-div">
    <div class="product-item1-div-hidden">
       <div>
        <img class="product-img" src="products/product1.png">
       </div>
       <div>
        <div class="product-title-div"><p class="product-title">Rounting Brush</p></div>   
       <div class="product-info-div">Size: 50mm<br>
        Used for: CNC Routing Machine
       </div>
       <div class="enquire-div">
        <a class="enquiry-link" href="equire/equiry_form.php">Enquiry</a>
        </div>
       </div>
     </div>
     <div class="product-item1-div-hidden">
      <div>
       <img class="product-img" src="products/product3.png">
      </div>
      <div>
       <div class="product-title-div"><p class="product-title">ATC Ball Bearing Spindle</p></div>   
      <div class="product-info-div">
        The 60,000 RPM high-speed ball bearing spindle, used in the PCB industry for routing and drilling, offers compact, lightweight, low vibration, and low noise design, ensuring precise, stable processes.

      </div>
      <div class="enquire-div">
       <a class="enquiry-link" href="equire/equiry_form.php">Enquiry</a>
       </div>
      </div>
    </div>
</div-->

    <!--Contact us Section-->
    <div id="contact-us" class=contact_us>
      <div class="title-div">
        <h1 class="title-hidden">Contact Us</h1>
      </div>
      <div class="contact-us-div-hidden">


        <div class="social-media-logo-div">
          <a href="https://wa.me/qr/RPTMSTH4SLSCP1" class="special-link-logo"><i class="fa-brands fa-whatsapp"></i></a>
          <span class="mid-logo"><a class="special-link-logo" href="https://www.linkedin.com/in/concept-n-controls-b3bb35283"><i class="fa-brands fa-linkedin-in"></i> </a></span>
          <a href="mailto:m_rahane@yahoo.com" class="special-link-logo"><i class="fa-solid fa-envelope"></i></a>
        </div>
        <div class="outer-office-address-div">
          <div class="inner-office-address-div">
            <div class="office-title">
              Office 1:
            </div>
            <div class="address-detail">
              <div>SHREE APARTMENT, NEHRU GARDEN, LOKRUCHINAGAR, RAHATA, DIST. AHMEDNAGAR-423107,</div>
              <div><b>Ph No.</b> 9810113459</div>
              <div><b>Email: </b>m_rahane@yahoo.com</div>
            </div>
          </div>

          <div class="inner-office-address-div">
            <div class="office-title">
              Office 2:
            </div>
            <div class="address-detail">
              <div>4311, STREET NO. 9, AJITNAGAR, GANDHINAGAR, DELHI-110031,</div>
              <div><b>Ph No.</b> 7827802939</div>
              <div><b>Email: </b>m_rahane@yahoo.com</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--About us section-->
    <div class="about-us" id="aboutus">
  <div class="title-div">
    <h1 class="title-hidden" style="color:aliceblue">About Us</h1>
    </div>
  <div class="about-us-header">Concept N Controls</div>
  <div class="about-us-contact">

    <div class="left-about-us-contact"> Connect with us <br>
      <br><span class="about-us-contact-us-logo">
        <a href="https://wa.me/qr/RPTMSTH4SLSCP1" class="special-link-logo"><i  class="fa-brands fa-whatsapp"></i></a>
        <a href="mailto:m_rahane@yahoo.com" class="special-link-logo"><i class="fa-solid fa-envelope"></i></a>
      <a class="special-link-logo" href="https://www.linkedin.com/in/concept-n-controls-b3bb35283"><i class="fa-brands fa-linkedin-in"></i></a></span></div>
  
      <div class="right-about-us-contact">
        <div class="about-us-address"><span class="about-us-content-title">RAHATA OFFICE:</span> <br>SHREE APARTMENT, NEHRU GARDEN, LOKRUCHINAGAR, RAHATA, DIST. AHMEDNAGAR-423107, <br> <b>Ph No.</b> 9810113459 <br><b>Email: </b>m_rahane@yahoo.com</div>

        <div class="about-us-address"> <span class="about-us-content-title">DELHI OFFICE:</span> <br>4311, STREET NO. 9, AJITNAGAR, GANDHINAGAR, DELHI-110031,<br> <b>Ph No.</b> 7827802939 <br><b>Email: </b>m_rahane@yahoo.com</div>  
      </div>
    
  </div>
  <div class="about-us-service-product">
      <div>
        <span class="about-us-content-title">Services:</span> <br>
        <li class="about-us-item"><a href="services/service_list/spindle_repair.html" class="about-us-item">Spindle Repair</a></li>
        <li class="about-us-item"><a href="services/service_list/Ball_Screw_Repair.html" class="about-us-item">Ball Screw Repair</a></li>
        <li class="about-us-item"><a href="services/service_list/Servo_Motors_and_Drive_Repair.html" class="about-us-item">Servo Motors and Drive Repair</a></li>
        <li class="about-us-item"><a href="services/service_list/cnc_machine_prevention_maintenance.html" class="about-us-item" >CNC Machine Preventive Maintenance</a></li>
        <li class="about-us-item"><a href="services/service_list/cnc_machine-breakdown-maintenance.html" class="about-us-item">CNC Machine Breakdown Maintenance</a></li>
        <li class="about-us-item"><a href="services/service_list/retrofitting_of_cnc_machine.html" class="about-us-item">Retrofitting of CNC Machine</a></li>
      </div>
     
      <div class="about-us-product">
        <span class="about-us-content-title">Product</span>
        <li class="about-us-item"><a href="products/cnc_drilling_and_routing_machine.html" class="about-us-item">CNC Drilling and Routing Machine</a></li>
                   <li class="about-us-item" ><a href="products/spindles.html" class="about-us-item">Spindles</a></li>
                   <li class="about-us-item"><a href="products/toolstation.html" class="about-us-item">Tool Station</a></li>
                   <li class="about-us-item"><a href="products/Servo_Motors_and_Driver.html" class="about-us-item">Servo Motors and Drives</a></li>
          
      </div>
    </div>
  <div class="about-us-item"> <a href="mailto:m_rahane@yahoo.com" class="special-link-logo">m_rahane@yahoo.com</a></div>
 </div>

    <!--Chat Bot-->
    <?php include('user-view/chatbot.php') ?>
</body>
<script src="script.js">
</script>

</html>