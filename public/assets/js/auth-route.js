window.onpaint = preloadFunc();  
function preloadFunc()
{
    const path=window.location.pathname;
    switch(path){
        case "/dashboard":
            if(!localStorage.getItem('access_token')){
                window.location="/login";
            }
            break;

        case "/register":
        case "/login":
            if(localStorage.getItem('access_token')){
                window.location="/dashboard";
            }
            break;
    }
} 