let sidebarclose = document.getElementById("sidebarclose");
let sidebaropen = document.getElementById("sidebaropen");
let sidebar = document.getElementById("sidebar");
sidebarclose.addEventListener("click", (event)=>{
    sidebar.classList.remove("active");
})
sidebaropen.addEventListener("click", (event)=>{
    sidebar.classList.add("active");
})