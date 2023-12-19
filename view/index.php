<?php
require_once '../classes/config.php';

// if (isset($_SESSION['user_session']) != "") {
//     header("Location: test.php");
// }

if (isset($_POST['submit'])) {
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    if ($user->signup($firstName, $lastName, $email, $hashedPass)) {
        header("Location: register.php?successfully");
    } else {
        header("Location: register.php?failure");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>O-PEP</title>
</head>

<body>


    <div class="h-screen md:flex">
        <div class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
            <div>
                <h1 class="text-white font-bold text-4xl font-sans">O'PEP</h1>
                <p class="text-white mt-1">If You Already Have An Acount Go to Sing In </p>
                <a href="signIn.php">
                    <button type="submit" class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">Sing
                        In</button>
                </a>
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
            </div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
            </div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>
        <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            <form class="bg-white" method="POST" action="" id="form">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="first" id="first" placeholder="First name" />
                    <div id="FirstNameInputHelp" class="form-text text-danger | error_para d-none ">
                        Your name must be less than 20 characters and musn't include any numbers or special characters.
                    </div>
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="last" id="last" placeholder="Last name" />
                    <div id="LastNameInputHelp" class="form-text text-danger | error_para d-none ">
                        Your name must not exceed 20 characters and not include any numbers or special characters.
                    </div>
                </div>

                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="email" id="email" placeholder="Email Address" />
                    <div id="EmailInputHelp" class="form-text text-danger | error_para d-none">
                        please enter a valid email (exemple@gmail.com).
                    </div>
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="password" name="password" id="" placeholder="Password" />
                </div>
                <button type="submit" name="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Next
                    ></button>

            </form>
        </div>
    </div>
    <script>
        var form = document.getElementById('form');

        var email = document.getElementById('email');
        var FirstName = document.getElementById('first');
        var LastName = document.getElementById('last');


        var EmailInputHelp = document.getElementById('EmailInputHelp');
        var FirstNameInputHelp = document.getElementById('FirstNameInputHelp')
        var LastNameInputHelp = document.getElementById('LastNameInputHelp')

        const NameRegex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
        const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        // form.addEventListener('submit', e => {
        // 	e.preventDefault();

        // 	if (NameRegex.test(FirstName.value) && NameRegex.test(LastName.value) && EmailRegex.test(email.value)) {
        // 		form.submit();
        // 	}
        // })


        email.addEventListener('input', function(e) {
            var currentValue = e.target.value;
            var valid = EmailRegex.test(currentValue);

            if (!valid) {
                EmailInputHelp.classList.remove("d-none")
                email.className = "pl-2 outline-none border-none border-danger border-2 border-bottom border-0";
            } else {
                EmailInputHelp.classList.add("d-none")
                email.className = "pl-2 outline-none border-none";
            }
        })

        FirstName.addEventListener('input', function(e) {
            var currentValue = e.target.value;
            var valid = NameRegex.test(currentValue);

            if (!valid) {
                FirstNameInputHelp.classList.remove("d-none")
                FirstName.className = "form-control mx-2 border-danger border-2 border-bottom border-0"
            } else {
                FirstNameInputHelp.classList.add("d-none")
                FirstName.className = "form-control mx-2 border-primary border-2 border-bottom border-0"
            }
        })


        LastName.addEventListener('input', function(e) {
            var currentValue = e.target.value;
            var valid = NameRegex.test(currentValue);

            if (!valid) {
                LastNameInputHelp.classList.remove("d-none")
                LastName.className = "form-control mx-2 border-danger border-2 border-bottom border-0"
            } else {
                LastNameInputHelp.classList.add("d-none")
                LastName.className = "form-control mx-2 border-primary border-2 border-bottom border-0"
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>