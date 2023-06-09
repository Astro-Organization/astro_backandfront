<!DOCTYPE html>
<html lang="en">
<!--THIS IS THE LOGIN PAGE. RENAMED FOR USE PORPUSES.-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/output.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="icon" type="image/x-icon" href="./assets/logo/logo.png">
  <title>Astro</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />

</head>




<body class="font-poppins bg-[#e3e8f2]" onload="checkCookie()">
  <div class="flex items-center justify-center h-screen sm:p-8 p-4">
    <div class="flex sm:flex-row flex-col w-[1250px] h-[550px] shadow-lg">
      <div class="md:w-1/2 w-full bg-button-blue flex items-center justify-center rounded-l-lg">
        <img src="./assets/ilustrations/books.png" class="hidden sm:block ">
      </div>
      <div class="relative md:w-1/2 w-full h-full bg-white flex items-center justify-center rounded-r-lg md:p-0 p-4 md:rounded-none rounded-l-lg">
        <div class="absolute top-6 ">
          <div class="flex flex-col gap-1 items-center">
            <div class="flex gap-1 items-center">
              <h1 class="text-2xl">Welcome back to</h1>
              <logo class="flex gap-2 items-center">
                <img src="./assets/logo/logo.png" class="w-[35px] h-[35px]">
                <p class="text-2xl font-shadows-light">Astro</p>
              </logo>
            </div>
            <div>
              <p class="text-gray-500">Build a better education with us!</p>
            </div>
          </div>
        </div>
        <div class="flex flex-col items-center">
      </div>
 

<script>
  let x = document.cookie;

  
  if(x != '' && x!=null){
    
   let id = x.split('=')[1];
   if(x.split('=')[0] == "login_astro_student") document.location = 'source/class.php?number='+id+'&role=students';
   if(x.split('=')[0] == "login_astro_professor") document.location = 'source/class.php?number='+id+'&role=professor';


    
  }
  else{
    
  }
  
</script>



        <form class="flex flex-col gap-2"  method="post" action="login_procces.php">
          <div>
            <label for="id" class="block mb-2 text-sm font-medium text-gray-900">User ID</label>
            <input type="text" id="number" name="number"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:astro-blue focus:border-blue-500 block w-full p-2.5"
              placeholder="1, 2, 3, etc."  inputmode="numeric" required>
          </div>
          <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
            <input type="text" id="username" name="username"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:astro-blue focus:border-blue-500 block w-full p-2.5"
              placeholder="Andrew, Alex, John Doe, etc." required>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" id="password" name="password"required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:astro-blue focus:border-blue-500 block w-full p-2.5"
              placeholder="" >
          </div>
          <button
            class="text-white bg-button-blue hover:bg-[#2a3ca0] transition duration-150 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-4">
            Log in
          </button>
          <div class="absolute bottom-6 text-center" name="reset" aria-required="">
            <a href="" class="">
              <p class="text-sm text-gray-500 hover:underline underline-offset-2">Forgot your password? Contact an
                administrator</p>
            </a>
          </div>
</form>
       
        
      </div>
    </div>
  </div>
  <script src="./scripts/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>


</html>