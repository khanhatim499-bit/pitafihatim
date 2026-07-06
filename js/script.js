// ==========================
// PITAFI HATIM v2.0
// script.js
// ==========================

// Dark Mode

const themeBtn = document.getElementById("themeToggle");

if (themeBtn) {

themeBtn.addEventListener("click", () => {

document.body.classList.toggle("dark");

if(document.body.classList.contains("dark")){

localStorage.setItem("theme","dark");

themeBtn.textContent="☀️";

}else{

localStorage.setItem("theme","light");

themeBtn.textContent="🌙";

}

});

}

if(localStorage.getItem("theme")==="dark"){

document.body.classList.add("dark");

if(themeBtn){

themeBtn.textContent="☀️";

}

}

// ==========================
// Mobile Menu
// ==========================

const menuBtn=document.getElementById("menuBtn");

const nav=document.getElementById("navbar");

if(menuBtn && nav){

menuBtn.addEventListener("click",()=>{

if(nav.style.display==="block"){

nav.style.display="none";

}else{

nav.style.display="block";

}

});

}

// ==========================
// Scroll To Top
// ==========================

const scrollBtn=document.getElementById("scrollTop");

window.addEventListener("scroll",()=>{

if(!scrollBtn) return;

if(window.scrollY>300){

scrollBtn.style.display="block";

}else{

scrollBtn.style.display="none";

}

});

if(scrollBtn){

scrollBtn.addEventListener("click",()=>{

window.scrollTo({

top:0,

behavior:"smooth"

});

});

}

// ==========================
// Smooth Anchor Links
// ==========================

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

anchor.addEventListener("click",function(e){

e.preventDefault();

const target=document.querySelector(this.getAttribute("href"));

if(target){

target.scrollIntoView({

behavior:"smooth"

});

}

});

});

// ==========================
// Newsletter Form
// ==========================

const newsletter=document.querySelector(".newsletter-form");

if(newsletter){

newsletter.addEventListener("submit",(e)=>{

e.preventDefault();

const email=newsletter.querySelector("input").value.trim();

if(email===""){

alert("Please enter your email.");

return;

}

alert("Thank you for subscribing!");

newsletter.reset();

});

}

// ==========================
// Search Box
// ==========================

const search=document.querySelector(".search");

if(search){

search.addEventListener("keyup",()=>{

const value=search.value.toLowerCase();

document.querySelectorAll(".card,.article-card").forEach(item=>{

const text=item.innerText.toLowerCase();

item.style.display=text.includes(value)?"block":"none";

});

});

}

// ==========================
// Reveal Animation
// ==========================

const revealElements=document.querySelectorAll(

".card,.article-card,.testimonial,.stat-box,.founder,.newsletter"

);

const reveal=()=>{

const windowHeight=window.innerHeight;

revealElements.forEach(el=>{

const top=el.getBoundingClientRect().top;

if(top<windowHeight-100){

el.style.opacity="1";

el.style.transform="translateY(0)";

}

});

};

revealElements.forEach(el=>{

el.style.opacity="0";

el.style.transform="translateY(40px)";

el.style.transition="0.8s";

});

window.addEventListener("scroll",reveal);

reveal();

// ==========================
// Current Year
// ==========================

const year=document.getElementById("year");

if(year){

year.textContent=new Date().getFullYear();

}

console.log("PitaFi Hatim v2.0 Loaded Successfully");
