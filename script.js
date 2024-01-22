
//Hide Header when menu is clicked
function hide_header(obj){
  const header = document.querySelector(".header");
  const nav = document.querySelector(".nav");
  header.classList.add("header-hidden");
  nav.classList.add("nav-after-scroll");
}
//Home-page slideshow

var front_img = ["front-img/1.png","front-img/2.png","front-img/3.png"];
var i=0;

function chg_img(obj){
  i=i+obj;
   if(i>=front_img.length){
      i=0;
   }
   else if(i<0)
   {
    i=front_img.length-1;       
   }
   document.getElementById("front-img").src=front_img[i];
}
setInterval(function () {
chg_img(1);
},5000);

//Scrolling Animation for services image
const observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('service-item-inner-div-show');
    }
    else
    {
        entry.target.classList.remove('service-item-inner-div-show');
    }
});
});

const hiddenElements = document.querySelectorAll('.service-item-inner-div-hidden');
hiddenElements.forEach((el) => observer.observe(el));

//Scrolling Animation for Title

const Titleobserver = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('title-show');
    }
    else
    {
        entry.target.classList.remove('title-show');
    }
});
});

const Title_hiddenElements = document.querySelectorAll('.title-hidden');
Title_hiddenElements.forEach((el) => Titleobserver.observe(el));

//Scrolling animation for product
const product_observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('product-item1-div-show');
    }
    else
    {
        entry.target.classList.remove('product-item1-div-show');
    }
});
});

const product_hiddenElements = document.querySelectorAll('.product-item1-div-hidden');
product_hiddenElements.forEach((el) => product_observer.observe(el));

//Scrolling animation for Contact us Section
const contactus_observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('contact-us-div-show');
    }
    else
    {
        entry.target.classList.remove('contact-us-div-show');
    }
});
});

const contactus_hiddenElements = document.querySelectorAll('.contact-us-div-hidden');
contactus_hiddenElements.forEach((el) => contactus_observer.observe(el));

//Scrooling animation for Spindle Repair page -Service Title
const spindle_repair_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('service-item1-div-show');
        }
        else
        {
            entry.target.classList.remove('service-item1-div-show');
        }
    });
    });
    const spindle_repair_hiddenElements = document.querySelectorAll('.service-item1-div-hidden');
    spindle_repair_hiddenElements.forEach((el) => spindle_repair_observer.observe(el));

//Scrooling animation for Spindle Repair page -Service SUBTitle
const spindle_repair_sub_title_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('sub-title-show');
        }
        else
        {
            entry.target.classList.remove('sub-title-show');
        }
    });
    });
    const spindle_repair_sub_title_hiddenElements = document.querySelectorAll('.sub-title-hidden');
    spindle_repair_sub_title_hiddenElements.forEach((el) => spindle_repair_sub_title_observer.observe(el));

  //Scrooling animation for Spindle Repair page -Service next div
  const service_item2_div_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('service-item2-div-show');
        }
        else
        {
            entry.target.classList.remove('service-item2-div-show');
        }
    });
    });
    const service_item2_div_hiddenElements = document.querySelectorAll('.service-item2-div-hidden');
    service_item2_div_hiddenElements.forEach((el) => service_item2_div_observer.observe(el));

  
//Scrolling animation for Item List CNC-MPM
const item_list_div_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('item-list-div-show');
        }
        else
        {
            entry.target.classList.remove('item-list-div-show');
        }
    });
    });
    const item_list_div_hiddenElements = document.querySelectorAll('.item-list-div-hidden');
    item_list_div_hiddenElements.forEach((el) => item_list_div_observer.observe(el));


//Hiding Header while Scrolling

{
    const header = document.querySelector(".header");
    const nav = document.querySelector(".nav");
    let lastScrollY = window.scrollY;
    window.addEventListener("scroll",() => {
        if(lastScrollY < window.scrollY){
            header.classList.add("header-hidden");
            nav.classList.add("nav-after-scroll");
        }
        else{
            header.classList.remove("header-hidden");
            nav.classList.remove("nav-after-scroll");
        }
        lastScrollY = window.scrollY;
    });
}


//Take message upto 250 words in equiry form

document.addEventListener('DOMContentLoaded', function () {
    var textarea = document.getElementById('myTextarea');
  
    var maxWords = 250;

    textarea.addEventListener('input', function () {
        var words = textarea.value.trim().split(/\s+/).length;
       

        // Check if the word limit is exceeded
        if (words > maxWords) {
            textarea.setCustomValidity('250 Words limit exceeded!');
        } else {
            textarea.setCustomValidity('');
        }
    });
});


//SmoothScrolling

function smoothScroll(targetId){
    const targetElement = document.getElementById(targetId);
    targetElement.scrollIntoView({behavior:'smooth'});
}

//CHATBOT

const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");
const chatbotCloseBtn = document.querySelector(".close-btn");

let userMessage;

const inputIniHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  // let chatContent =
  //   className === "outgoing"
  //     ? `<p></p>`
  //     : ` <span class="material-symbols-outlined">Smart_toy</span><p></p>`;
  let chatContent =
  className === "outgoing"
    ? `<p>${message}</p>`
    : `<span class="material-symbols-outlined">Smart_toy</span><p>${message}</p>`;

  chatLi.innerHTML = chatContent;
  chatLi.querySelector("p").textContent = message;
  return chatLi;
};

const generateResponse = () => {
  const companyKeywords = [

    {keywords:["cnc machine","cncmachine"],response:"A CNC (Computer Numerical Control) machine is a computer-controlled manufacturing tool used for precision shaping, cutting, and machining of materials like metal, plastic, and wood."}, 
   
    { keywords: ["spindle repair", "spindle repairs","spindlerepair","spindlerepairs","spindle","spindles"], response: "Expert restoration of spindle assemblies, addressing wear, balancing, and ensuring peak machining equipment performance." },

    {keywords: ["ball screw", "ballscrews","ballscrew"], response: "Ball screw repair involves disassembly, cleaning, assessing damage, replacing worn parts, reassembling, and ensuring proper lubrication. Precision is crucial, and damaged components like ball bearings or nuts may need replacement. Seek professional help if unsure, as improper repair can affect performance. Regular maintenance and lubrication can extend ball screw life." },

    { keywords: ["servo motor", "servo motors", "servomotor", "servomotors"], response: "A servo motor is a rotary actuator that maintains precise control of its angular position. It uses feedback mechanisms like encoders to achieve accurate and controlled movement. Servos are widely used in robotics, automation, and various electronic devices for their precision and ability to maintain a set position." },


    {keywords:["drive repair","driverepair","driverepairs","drive repairs","driverepaired","drive repaired"],response:"For drive repair, first, identify the issue (hardware or software). For software problems, run disk checks or use repair utilities. If it's a hardware issue, consult professional services or replace faulty components. Always back up data before attempting any repairs."},

    {keywords:["cnc machine preventive maintenance","cnc preventive maintenance"],response:"Perform regular lubrication of moving parts, inspect and tighten fasteners, calibrate axes for accuracy, check electrical connections, clean debris, and monitor spindle performance. Keep a detailed maintenance log and follow the manufacturer's guidelines for preventive measures."},


    { keywords: ["product", "products"], response: "We offer spindle repair, ball screw repair, servo motors, CNC machine maintenance, retrofitting of CNC machines, and more." },

    { keywords: ["service", "services"], response: "Our services include CNC drilling and routing machine services, spindle services, collets, tool stations, servo motors and drivers, and linear guide services." },

    {keywords:["cnc"],response:"CNC is a company specializing in CNC (Computer Numerical Control) machines and related products such as spindle repair, ball screw repair, servo motors and drive repair, CNC machine preventive maintenance, CNC machine breakdown maintenance, retrofitting of CNC machines. Additionally, they provide services including CNC drilling and routing machine, spindles, collets, tool stations, servo motors and drivers, and linear guide."}, 

    {keywords:["contact us","contact details","contact"],response:"Email: m_rahane@yahoo.com, Ph No. 9810113459"},

    {keywords:["enquiry","enquiry form"],response:"Enquiry gives information, clarification, or details about Concept N Controls, Visit Enquiry form to know more.."},
    
    {keywords:["price","prices"],response:" Visit 'Our Products' to know more.."},

   
{keywords:["location"],response:" Office 1: SHREE APARTMENT, NEHRU GARDEN, LOKRUCHINAGAR, RAHATA, DIST. AHMEDNAGAR-423107; Office 2:4311, STREET NO. 9, AJITNAGAR, GANDHINAGAR, DELHI-110031"},
  ];
  const userWords = userMessage.toLowerCase().split(" ").map(word => word.trim());

  
  for (const category of companyKeywords) {
    const found = category.keywords.some(keyword => {
      const keywordWords = keyword.toLowerCase().split(" ");
      return keywordWords.every(word => userWords.includes(word));
    });

    if (found) {
      return category.response;
    }
  }

  // Responses for greetings
  if (userWords.includes("hi") || userWords.includes("hello")) {
    return "Hello! How can I help you today?";
  }

  // Default response for minimal questions
  return "I'm sorry, I couldn't find information related to your question. If you have a specific inquiry or need assistance, feel free to provide more details, and I'll do my best to help!";
};




const handleChat = () => {
  userMessage = chatInput.value.trim();
  if (!userMessage) return;
  chatInput.value = "";
  chatInput.style.height = `${inputIniHeight}px`;

  const outgoingChatLi = createChatLi(userMessage, "outgoing");
  chatbox.appendChild(outgoingChatLi);
  chatbox.scrollTo(0, chatbox.scrollHeight);

  setTimeout(() => {
    const incomingChatLi = createChatLi("Thinking...", "incoming");
    chatbox.appendChild(incomingChatLi);

    const response = generateResponse();
    incomingChatLi.querySelector("p").textContent = response;

    if (response === "I have added an Enquiry button below. Click it to open the enquiry form.") {
      const enquiryLi = createEnquiryButton(); // Use the new function
      chatbox.removeChild(incomingChatLi); // Remove the "Thinking..." message
      chatbox.appendChild(enquiryLi); // Append the new li containing the button
    }
    
    

    chatbox.scrollTo(0, chatbox.scrollHeight);
  }, 600);
};





chatInput.addEventListener("input", () => {
  chatInput.style.height = `${inputIniHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});

sendChatBtn.addEventListener("click", handleChat);
chatbotCloseBtn.addEventListener("click", () =>
  document.body.classList.remove("show-chatbot")
);
chatbotToggler.addEventListener("click", () =>
  document.body.classList.toggle("show-chatbot")
);
