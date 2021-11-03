<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
 </head>
 <script>
  async function fetchMovies1() {
   const response = await fetch("https://provinces.open-api.vn/api/");
   let data = await response.json();
   var select = document.getElementById("students");
   var myMap = new Map();
   data.map((x) => myMap.set(x.name, x.code));
 
   var html = "";
   for (const entry of myMap.entries()) {
    html += '<option value="' + entry[1] + '">' + entry[0] + "</option>";
   }
   select.innerHTML = html;
  }
  async function fetchMovies2() {
   let code_d = document.getElementById("students").value;
   const response = await fetch(
    `https://provinces.open-api.vn/api/p/${code_d}?depth=2`
   );
   let data = await response.json();
   var select = document.getElementById("students2");
   var myMap = new Map();
   data.districts.map((x) => myMap.set(x.name, x.code));
   var html = "";
   for (const entry of myMap.entries()) {
    html += '<option value="' + entry[1] + '">' + entry[0] + "</option>";
   }
   select.innerHTML = html;
  }
  async function fetchMovies3() {
   let code_w = document.getElementById("students2").value;
   const response = await fetch(
    `https://provinces.open-api.vn/api/d/${code_w}?depth=2`
   );
   let data = await response.json();
   var select = document.getElementById("students3");
   var myMap = new Map();
   data.wards.map((x) => myMap.set(x.name, x.code));
   var html = "";
   for (const entry of myMap.entries()) {
    html += '<option value="' + entry[1] + '">' + entry[0] + "</option>";
   }
   select.innerHTML = html;
  }
 
  fetchMovies1();
 </script>
 <body>
  <select id="students" onchange="fetchMovies2()"></select>
  <select id="students2" onchange="fetchMovies3()"></select>
  <select id="students3"></select>
 </body>
</html>
 

