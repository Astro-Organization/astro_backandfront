<?php
$id = $_GET['number'];
$role = $_GET['role'];
?>
<nav class="flex justify-between items-center px-8 py-4 bg-white shadow-sm">
  <div class="flex items-center gap-4">
    <button type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
      aria-controls="drawer-example">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
        <path fill="currentColor" d="M3 18v-2h18v2H3Zm0-5v-2h18v2H3Zm0-5V6h18v2H3Z" />
      </svg>
    </button>
    <logo class="flex gap-2 items-center">
      <img src="../assets/logo/logo.png" class="w-[35px] h-[35px]">
     
      <p class="text-xl font-shadows-light">Astro <?php echo $role ?></p>
    </logo>
  </div>
</nav>

<div id="drawer-example"
  class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 font-poppins"
  tabindex="-1" aria-labelledby="drawer-label">
  <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base text-gray-500">Menu</h5>
  <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-error rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z" />
    </svg>
    <span class="sr-only">Close menu</span>
  </button>
  
  <form class="flex flex-col gap-3 text-md mt-2" method='post'>
  <?php echo "<a class='nav-link flex gap-4 items-center text-nav-ico' href='./class.php?number=$id&role=$role''>" ?>
      <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 256 256">
          <path fill="currentColor"
            d="M244.8 150.4a8 8 0 0 1-11.2-1.6A51.6 51.6 0 0 0 192 128a8 8 0 0 1-7.37-4.89a8 8 0 0 1 0-6.22A8 8 0 0 1 192 112a24 24 0 1 0-23.24-30a8 8 0 1 1-15.5-4A40 40 0 1 1 219 117.51a67.94 67.94 0 0 1 27.43 21.68a8 8 0 0 1-1.63 11.21ZM190.92 212a8 8 0 1 1-13.84 8a57 57 0 0 0-98.16 0a8 8 0 1 1-13.84-8a72.06 72.06 0 0 1 33.74-29.92a48 48 0 1 1 58.36 0A72.06 72.06 0 0 1 190.92 212ZM128 176a32 32 0 1 0-32-32a32 32 0 0 0 32 32Zm-56-56a8 8 0 0 0-8-8a24 24 0 1 1 23.24-30a8 8 0 1 0 15.5-4A40 40 0 1 0 37 117.51a67.94 67.94 0 0 0-27.4 21.68a8 8 0 1 0 12.8 9.61A51.6 51.6 0 0 1 64 128a8 8 0 0 0 8-8Z" />
        </svg>
      </div>
      <p class="hover:translate-y-[-3px] transition-transform duration-200">Courses</p>
    </a>
    <?php echo "<a class='nav-link flex gap-4 items-center text-nav-ico' href='./program.php?number=$id&role=$role''>" ?>
      <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 256 256">
          <path fill="currentColor"
            d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h13.39a8 8 0 0 0 7.23-4.57a48 48 0 0 1 86.76 0a8 8 0 0 0 7.23 4.57H216a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16ZM104 168a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm112 32h-56.57a63.93 63.93 0 0 0-13.16-16H192a8 8 0 0 0 8-8V80a8 8 0 0 0-8-8H64a8 8 0 0 0-8 8v96a8 8 0 0 0 6 7.75A63.72 63.72 0 0 0 48.57 200H40V56h176Z" />
        </svg>
      </div>
      <p class="hover:translate-y-[-3px] transition-transform duration-200">Classes</p>
    </a>
    
    <?php echo "<a class='nav-link flex gap-4 items-center text-nav-ico' href='./forum.php?number=$id&role=$role''>" ?>
      <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 256 256">
          <path fill="currentColor"
            d="M216 42H40a14 14 0 0 0-14 14v128a14 14 0 0 0 14 14h59.47a2 2 0 0 1 1.71 1L116 223.2a14 14 0 0 0 24 .05L154.82 199a2 2 0 0 1 1.71-1H216a14 14 0 0 0 14-14V56a14 14 0 0 0-14-14Zm2 142a2 2 0 0 1-2 2h-59.47a14 14 0 0 0-12 6.75L129.72 217a2 2 0 0 1-3.46 0l-14.8-24.22a14.09 14.09 0 0 0-12-6.77H40a2 2 0 0 1-2-2V56a2 2 0 0 1 2-2h176a2 2 0 0 1 2 2Zm-80-64a10 10 0 1 1-10-10a10 10 0 0 1 10 10Zm-44 0a10 10 0 1 1-10-10a10 10 0 0 1 10 10Zm88 0a10 10 0 1 1-10-10a10 10 0 0 1 10 10Z" />
        </svg>
      </div>
      <p class="hover:translate-y-[-3px] transition-transform duration-200">Forum</p>
    </a>
    <?php echo "<a class='nav-link flex gap-4 items-center text-nav-ico' href='./stats.php?number=$id&role=$role''>" ?>
      <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
          <path fill="currentColor"
            d="m21 16l-7.775-6.075q-.675-.525-1.512-.413t-1.338.813l-2.75 3.8L4.25 11.45q-.3-.25-.625-.35T3 11V7.25q.125 0 .288.038t.312.162L7 10l4.375-6.15q.25-.35.675-.413t.775.213L17 7h3q.425 0 .713.288T21 8v8ZM4 20q-.425 0-.713-.288T3 19v-5.725q.175 0 .325.05t.3.175L8 17l3.4-4.675q.25-.35.663-.413t.762.213l8.175 6.4V19q0 .425-.288.713T20 20H4Z" />
        </svg>
      </div>
      <p class="hover:translate-y-[-3px] transition-transform duration-200">Stats</p>
    </a>
   
</form>
<style>
nav{

  z-index:3;
  width:1000vh;
  top:0;
  transition: all 0.3 ease-in-out;
}


</style>
<script>
const nav = document.querySelector('nav')
window.addEventListener('scroll', fixNav)
function fixNav(){
  if(window.ScrollY > nav.offsetHeight + 150) {
    nav.classList.add('active');
  } else {
    nav.classList.remove('active')
  }
}
</script>

<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'project');
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$role = $_GET['role'];

$sql = "SELECT name FROM $role where id=$id";
$result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
      $name = $row['name'];
      echo"
      <div class='absolute bottom-6'>
    <div class='flex gap-2 items-center'>
      <div class='flex gap-2 items-center'>
        <div>
          <div class='flex gap-1'>
            <h1 class=''>$name</h1>
        <br>
            <p class='text-astro-blue uppercase'>$role</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
"; 
    }
?>

  
