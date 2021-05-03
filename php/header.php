<header id='header'>
	<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
		<a href='index.php' class='navbar-brand'>
			<h3 class='px-5'>
				<i class='fas fa-shopping-basket'></i><span class="text-info" style="font-family: 'Brush Script MT' ,'cursive' ">&nbsp;ShopAholic</span>
			</h3>
		</a>

		<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup'
		         aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
		         <span class='navbar-toggler-icon'></span>
		</button>         

		<div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
            <h6>
			  <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="index.php"><span class="text-warning">Top</span></a>
        </li>  
        <li class="nav-item">
          <a class="nav-link active" href="all.php"><span class="text-warning">All Products</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="register.php"><span class="text-warning">Register</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php"><span class="text-warning"> Log In</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php"><span class="text-warning"> Log Out</span></a>
        </li>
           
      
      </ul></h6>
		    <div class='mr-auto'></div>         
		   
		    <!-- <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>	 -->
		</div>
		 <div class='navbar-nav mr-sm-2'>
		    	<a href='cart.php' class='nav-item nav-link active'>
		    		<h5 class='cart '>
		    			<i class='fas fa-shopping-cart'></i><span class="text-info">&nbsp;Cart</span>
		    			<?php
		    			if (isset($_SESSION['cart'])){ 
                             $count = count($_SESSION['cart']);
                             echo "<span id='cart_count' class='text-warning bg-light'>$count</span>";
                         }
                         else {
                             echo "<span id='cart_count' class='text-warning bg-light'>0</span>";
                         }
		    			?>
		    		</h5>
		    	</a>
		    </div>

	</nav>
</header>


