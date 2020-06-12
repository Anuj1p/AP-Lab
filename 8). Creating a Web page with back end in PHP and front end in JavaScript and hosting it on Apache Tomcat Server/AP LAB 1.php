<!DOCTYPE html>
<html>
    <head>
        <title>Registeration Form</title>
        <style type="text/css">
        *{
            box-sizing: border-box;
            text-align: center;
            font-family:  Comic Sans MS;
        }
        body{
            background-color: rgb(50, 68, 68);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            /* background-repeat:round; */
            
        }
        h1{
            color: white;
            background-color: rgb(500, 29, 29);
            font-family: Comic Sans MS;
        }
        #form_box{
            margin-left: 10%;
            margin-right: 10%;
            padding: 5% 10%;

            text-align: left;
            border: 2px solid rgb(63, 7, 7);
            border-radius: 5px;
            background-color: white;
            z-index: 999;
            font-family:  Comic Sans MS;
        }
        .mand{
            color: rgb(500, 0, 0);
        }
        h6{
            color: white;
            
            z-index: 2;
            font-family: Comic Sans MS;
        }
        input:link,
        input:visited{
            border: 1px solid white;
        }
        input:hover,
        input:active{
            border: 1px solid rgb(131, 0, 0);
        }
        #btn{
            border: 2px solid rgb(500, 0, 0);
            z-index: 9999;
            padding: 5px 5px;
            border-radius: 5px;
            transition: background-color 0.2s, color 0.2s;
        }
        #btn:hover,
        #btn:active{
            background-color: rgb(900, 29, 29);
            color: white;
            border: 2px solid rgb(131, 0, 0);
            border-radius: 5px;
            padding: 5px 5px;
            cursor: pointer;

        }

        textarea:link,
        textarea:visited{
            border: 1px solid white;
        }
        textarea:hover,
        textarea:active{
            border: 1px solid rgb(131, 0, 0);
        }
        </style>
        <script type="text/javascript">
        


        var formExample = document.getElementById("form_box");
         formExample.submit();
         
        document.getElementById("form_box").onsubmit = function(e){
            var fieldValue=document.getElementById("name").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your name");
                }
            var fieldValue=document.getElementById("email").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your email address");
                }
            var fieldValue=document.getElementById("institution").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your institution name");
                }
            
            var fieldValue=document.getElementById("stream").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your stream");
                }
            var n=document.getElementById("sem").value;
               if(!isNaN(parseFloat(n)) && isFinite(n)) 
                   {e.preventDefault(); 
                   alert("you must enter your semester"); }
            var fieldValue=document.getElementById("con").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your contact no.");
                }

            
             }

            
            function offconf()
            {
                document.getElementById("conf").innerHTML=" ";
            
            }
            function marq()
            {
                return ((new Date().getDate()).toString());
            }
           
        </script>
    </head>

    <body style="background-color:red">
        <h1>Registration Form</h1>

        <?php
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $institution = test_input($_POST["institution"]);
  $course = test_input($_POST["course"]);
  $stream = test_input($_POST["stream"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

        <form  method="post" action="#after" id="form_box">
                
            <label for="name"><span class="mand">*</span>Name: </label>
            <input type="text" id="name"  name="name" required><br><br>

            <label for="email"><span class="mand">*</span>Email-Id: </label>
            <input type="email" id="email" name="email"  required><br><br>

            <label for="institution"><span class="mand">*</span>Institution: </label>
            <input type="text" id="institution" name="institution" required><br><br>
            
            <label for="dob"><span class="mand">*</span>Date of birth: </label>
            <input type="date"  id="dob" name="dob" required><br><br>

            <label for="course"><span class="mand">*</span>Course </label>
            <select id="course" name="course" required>
                <option value="B.Tech">B.Tech</option>
                <option value="M.Tech">M.Tech</option>
                <option value="PhD">PhD</option>
            </select>
                <br><br>
            <label for="stream"><span class="mand">*</span>Branch </label>
            <input type="text" id="stream" name="stream" required>
                &nbsp;&nbsp;
				<br>
				<br>
            <label for="sem"><span class="mand">*</span>Semester: </label>
            <input type="number" id="sem" max="8" min="1" value="3" required><br><br>
            <label for="contact"><span class="mand">*</span>Contact Number:</label>
			<input type="number" id="con" required><br><br>
            <label for="skill"><span class="mand">*</span>Your Skills: </label>
            <textarea id="skill" rows="7" cols="70" placeholder="Tell us your Skills in programming!">
            </textarea><br><br>          
            <input type="checkbox" id="check">
            <label for="check">Check if you want us to keep you updated.</label>
            <br><br>
            <p style="text-align: left; color: blue;">Fields marked with * sign are mandatory.</p>
            <br>

            <input type="submit" id="btn" value="Register"  onmouseout="offconf();"><br>
            <p id="conf"> </p>
        </form>
        <div id="after">
        <?php



echo "<h1> ".$name."</h1>";
echo "<h3>You are pursuing ".$course." in ".$stream." at ".$institution."</h3>";
echo "<h3>E-mail: ".$email."</h3>";
?>
</div>
        
    </body>
</html>
