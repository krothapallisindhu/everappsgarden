/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function alertMsg()
{
    alert("Button 1 was clicked!");
}

function loginButtonClick()
{
    //get a reference to the element
    var loginButton = document.getElementById('loginButton');

    //add event listener
    loginButton.addEventListener('click', function(event) {
        window.location.href = "login.php";
    });


}

