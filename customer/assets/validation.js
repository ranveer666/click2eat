
 function validation() {
    var user = document.getElementById('uname').value;
    var b = document.getElementById('email').value;
    var c = document.getElementById('phone').value;
    var pass = document.getElementById('password').value;
    var cpass = document.getElementById('cpassword').value;
    
   
    if (user == "") {

        document.getElementById('username').innerHTML = "** Please fill the username field";
        return false;
    }
    if((user.length <= 2) || (user.length > 20)) {

        document.getElementById('username').innerHTML = "** user length must be between 2 and 20";
        return false;

    }
    if(!isNaN(user)){
       
        document.getElementById('username').innerHTML = "**Only characters are allowed";
        return false;

     }


    if (b == "") {

        document.getElementById('umail').innerHTML = "** Please fill the Email field";
        return false;
        
    }

    if(b.indexOf('@') <= 0 ) {
   
        document.getElementById('umail').innerHTML = "**@ Invalid position";
        return false;
    

    }

    if((b.charAt(b.length-4)!='.') && (emails.charAt(emails.length-3)!='.')) {
   
        document.getElementById('umail').innerHTML = "**Please write valid position of.";
        return false;
    }
    
    if (c == "") {

        document.getElementById('unum').innerHTML = "** Please fill the Phone Number field";
        return false;
    }

    if(isNaN(c)){

        document.getElementById('unum').innerHTML=" **Please write the valid phone number";
        return false;
    }

    if(c.length!=10){

        document.getElementById('unum').innerHTML=" **Mobile number must be of 10 digits only";
        return false;
    }
     

    if(pass == ""){

       document.getElementById('pop').innerHTML =" ** Please fill the password field";
       return false;

    }
    if((pass.length <=5) || (pass.length > 20)) {

      document.getElementById('pop').innerHTML ="**Password length must be between 5 and 20";
      return false;
     

    }
    if(pass!=cpass){

        document.getElementById('pop').innerHTML ="**Password does not match";
        return false;

    }





if(cpass ==""){

document.getElementById('passi').innerHTML ="**Please fill the confirm password field";
return false;


}

 
    

}


function menu_valid() {


    var box = document.getElementById('menuName').value;
   

    if (box == "") {

        document.getElementById('upsc').innerHTML = "** Enter menu name";
        return false;
    }

    if(!isNaN(box)){
       
        document.getElementById('upsc').innerHTML = "**Only characters are allowed";
        return false;
    }

    if((box.length <= 2) || (box.length > 20)) {

        document.getElementById('upsc').innerHTML = "** user length must be between 2 and 20";
        return false;
    }

}



function offer_valid() {


    var user = document.getElementById('offername').value;
    var b = document.getElementById('offerprice').value;
    var c = document.getElementById('startdate').value;
    var r = document.getElementById('enddate').value;


    if (user == "") {

        document.getElementById('upsc').innerHTML = "** Please enter offername";
        return false;
    }
    if(!isNaN(user)){
       
        document.getElementById('upsc').innerHTML = "**Only characters are allowed";
        return false;
    }

    if((user.length <= 2) || (user.length > 20)) {

        document.getElementById('upsc').innerHTML = "** name length must be between 2 and 20";
        return false;
    }



    if (b == "") {

        document.getElementById('cat').innerHTML = "** Please fill the offer price";
        return false;
    }

    if(isNaN(b)){
       
        document.getElementById('cat').innerHTML = "**Only numbers are allowed";
        return false;
    }

    



    if (c == "") {

        document.getElementById('xat').innerHTML = "** Please mention sarting date of the offer";
        return false;
    }
    if (r == "") {

        document.getElementById('cmat').innerHTML = "** Please mention the end date of the offer";
        return false;
    }



}



function raw_valid() {


    var box = document.getElementById('name').value;
    var cap = document.getElementById('des').value;
    var ter = document.getElementById('qty').value;


    if (box == "") {

        document.getElementById('dog').innerHTML = "** Please enter the raw material name";
        return false;
    }

    if(!isNaN(box)){
       
        document.getElementById('dog').innerHTML = "**Only characters are allowed";
        return false;
    }

    if((box.length <= 10) || (box.length > 1000)) {

        document.getElementById('dog').innerHTML = "** name length must be between 10 and 1000";
        return false;
    }


    if (cap == "") {

        document.getElementById('leopard').innerHTML = "** Please enter raw material description";
        return false;
    }
    if(!isNaN(cap)){
       
        document.getElementById('leopard').innerHTML = "**Only characters are allowed";
        return false;
    }

    if((cap.length <= 10) || (cap.length > 1000)) {

        document.getElementById('leopard').innerHTML = "** description length must be between 10 and 1000";
        return false;
    }




    if (ter == "") {

        document.getElementById('leg').innerHTML = "** Enter quantity";
        return false;
    }
    if(isNaN(ter)){
       
        document.getElementById('leg').innerHTML = "**Only numbers are allowed";
        return false;

     }

        


}

function supplier_valid() {


    var box = document.getElementById('sname').value;
    var cap = document.getElementById('phone').value;
    var ter = document.getElementById('email').value;


    if (box == "") {

        document.getElementById('leo').innerHTML = "** Please enter supplier name";
        return false;
    }

    if((box.length <= 2) || (box.length > 20)) {

        document.getElementById('leo').innerHTML = "** user length must be between 2 and 20";
        return false;

    }
    if(!isNaN(box)){
       
        document.getElementById('leo').innerHTML = "**Only characters are allowed";
        return false;

     }



    if (cap == "") {

        document.getElementById('virgo').innerHTML = "** Please enter the phone number";
        return false;
    }
   
    if(cap.length!=10){

        document.getElementById('virgo').innerHTML=" **Mobile number must be of 10 digits only";
        return false;
    }

    if(isNaN(cap)){
       
        document.getElementById('virgo').innerHTML = "**Only numbers are allowed";
        return false;

     }

    

    if (ter == "") {

        document.getElementById('jupiter').innerHTML = "** Enter email id";
        return false;
    }

    function item_validation() {
        var naaam = document.getElementById('uname').value;
        var pata = document.getElementById('price').value;
        var numb = document.getElementById('phone').value;
    
        if (user == "") {
    
            document.getElementById('username').innerHTML = "** Please fill the username field";
            return false;
        }
        if((user.length <= 2) || (user.length > 20)) {
    
            document.getElementById('username').innerHTML = "** user length must be between 2 and 20";
            return false;
    
        }
        if(!isNaN(user)){
           
            document.getElementById('username').innerHTML = "**Only characters are allowed";
            return false

        }

}
}
