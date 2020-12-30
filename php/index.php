<!DOCTYPE html>
<html>
<head>
    <title>Practical</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">String Manipulation</div>
            </div>  
            <div class="panel-body" >
                     <form  class="form-horizontal" method="post" id="fileForm">

                        <div class="form-group">
                            <label class="control-label col-md-4">String </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="string_input" maxlength="30" name="username" placeholder="" type="text" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Number </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="number_input" maxlength="30" name="username" placeholder="" type="text" required="" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4">Type </label>
                            <div class="controls col-md-8 ">
                                <input type="radio" checked="" name="type" value="1">String Increment
                                <input type="radio" name="type"  value="2">String Even/Odd
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Output:</label>
                            <div class="controls col-md-8 ">
                                <p id="output">-</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="controls col-md-8 ">
                                <button class="btn btn-primary" id="btnSubmit">Save</button>
                            </div>
                        </div>
                            
                    </form>
            </div>
        </div>
    </div> 
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {

        $("#btnSubmit").click(function (event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var string_input = $('#string_input').val();
            var number_input = $('#number_input').val();

            var type = $('input[name="type"]:checked').val();
            console.log(`string_input:${string_input} | number_input:${number_input} | type:${type} `,);

            if(!string_input || !number_input){
                $("#output").html('All fields required.');
            }
            else{

                if(type == 1){ // String Increment
                    var output =  incrementString(string_input,number_input);
                    $("#output").html(output);

                }
                else{ // String Even/Odd
                    var output =  oddCharacterString(string_input,number_input);
                    $("#output").html(output);
                }
            }
        });
    });

    // A=65, Z=90
    // a=97, z=122
    function incrementString(string, count){
        var count = parseInt(count);
        console.log('string:',string,"| count:",count);
        var newString = [];
        for(var i = 0; i < string.length; i++){
            var current_charcode = string[i].charCodeAt();
            // console.log(`string[i]:${string[i]} | current_charcode:${current_charcode}`);

            var last_difference = 0;
            var incrementer = 0;

            if(current_charcode >= 65 && current_charcode <= 90){
                incrementer = current_charcode + count;
                last_difference = 90 - current_charcode;
                var remaining_count = count-last_difference;
                if(remaining_count > 0){
                    incrementer = (90-26) + remaining_count;
                }
            }
            else if(current_charcode >= 97 && current_charcode <= 122){
                incrementer = current_charcode + count;
                last_difference = 122 - current_charcode;
                var remaining_count = count-last_difference;
                if(remaining_count > 0){
                    incrementer = (122-26) + remaining_count;
                }
            }
            
            if(incrementer){
                newString[i] = String.fromCharCode(incrementer);
            }
            else{
                newString[i] = string[i];
            }
        }
        newString = newString.join('');
        console.log(newString);
        return newString;
    }

    function oddCharacterString(string, count){

        var count = parseInt(count);
        console.log('string:',string,"| count:",count);
        var evennewString = [];
        var oddnewString = [];

        var counter = 0;
        for(var i = 0; i < string.length; i++){
            console.log(`i:${i} | remind:${i%2} | char:${string.charAt(i)}`);
            counter++;
            if(counter%2 == 1)
            {
                oddnewString[i]   =   string.charAt(i);
            }
            if(counter%2 == 0){
                evennewString[i]   =   string.charAt(i);
            }
        }

        oddnewString = oddnewString.join('');
        console.log('oddnewString:',oddnewString);

        evennewString = evennewString.join('');
        console.log('evennewString:',evennewString);

        if(count%2 == 1){
            return oddnewString;
        }
        else{
            return evennewString;
        }
    }
</script>
</html>