let httpRequest = new XMLHttpRequest()
let as = document.querySelectorAll("li a")
for (let i = 0; i < as.length; i++) {
    as[i].addEventListener("click", function(e){
        e.preventDefault()
        httpRequest.onreadystatechange = function(){
            if(httpRequest.readyState == 4){
                // On regarde si le serveur a bien répondu
                if(httpRequest.status == 200){
                    let result = JSON.parse(httpRequest.responseText)
                     document.getElementById("result").innerHTML = result
                }else{
                    alert("impossible de contacter le serveur")
                }
                
            }
        }
        httpRequest.open("GET", "https://jsonplaceholder.typicode.com/users", true)
        httpRequest.send()
    })
    
    
}
