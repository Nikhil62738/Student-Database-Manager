function Validate()
{
    var Username=document.getElementById("Username").value;
    var password=document.getElementById("password").value;
    if(Username=="Admin"&&password=="Infotech")
    {   
        // window.location.assign("Database.php");
        alert("Login Successfully");
       return false;
    }
    else
    {
        alert("Login failed !! ");
    }

}
function myFunction()
{
    var show = document.getElementById('password');
    if(show.type=='password')
    {
        show.type='text';
    }
    else
    {
        show.type='password';
    }
}
function runcheck()
        {
    
          var Enroll=document.getElementById("Enroll").value;
          var date=document.getElementById("date").value;
          var Course=document.getElementById("Course").value;
          var Agent_no=document.getElementById("Agent_no").value;
          if(Enroll===" " &&  date===" " && Course===" " && Agent_no===" ")
          {
              alert("No blank value allowed");
              return false;
          }
          else
          {
              alert("Form submitted");
          }
        }

