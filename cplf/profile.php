
<?php include_once('includes/header.php');?>
<main class="container" style="margin-top:90px">
     <div class="d-flex align-items-center p-3 my-3 text-white  rounded lbgradient shadow-sm">
        <div class="lh-100">
          <h1 class="mb-0 text-white lh-100">Profile</h1>
          <small>Your Profile Page</small>
        </div>
      </div>


  
   <div class="row">
    
    <div class="col-md-4 col-lg-4 col-md-12">

    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <img src="http://cloud.blwcplfonline.org/V2/profile_pics/cpm34431539114890.jpg" alt="" class="rounded-circle mt-3 mb-lg-3" width="100%">

   
    <h5 class="text-capitalize text-center">Pastor Rachel Adeoye</h5>
    <p class="text-center ">Assistant Campus Pastor</p>
    <p class="text-center ">BLW Campus Ministry, Unilag</p>
    <p class="text-center text-primary ">chrismkpadorom@yahoo.com</p>
   
    <hr>

    <div class="form-group ml-3 mr-3 mb-3 text-center">
    <div class="fupload file btn btn-sm btn-primary">
	  Update profile picture<input type="file" name="file"/>
      </div>
  </div>
 
    </div>
    </div>

    <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="my-3 p-3 bg-white rounded shadow-sm ">
      

        <div class="bd-example">
<form>
  
<div class="form-row " >
 <div class="form-group col-md-6">
   <div class="form-group">
      <label for="firstname">First name:</label>
      <input type="text" class="form-control" id="" placeholder="First Name">
    </div>
</div>
  <div class="form-group col-md-6">
     <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="" placeholder="Last Name">
   </div>
  </div>
  </div>

   <div class="form-group">
      <label for="inputEmail4">Email:</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="tel" class="form-control" id="" placeholder="+234 9094 628370">
    </div>

  <div class="form-group">
    <label for="inputAddress">Address:</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>

  
  <div class="form-row">
    <div class="form-group col-md-6">
      <div class="form-group">
      <label for="lastname">Birthday:  <small>(DD/MM/YY)</small></label>
      <input type="text" class="form-control" id="" placeholder="05/04/1996">
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
      <label for="lastname">Country:</label>
      <input type="text" class="form-control" id="" placeholder="Email">
      </div>
    </div>
 </div>



   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City:</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State:</label>
      <select id="inputState" class="form-control">
        <option selected="">Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip:</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>

   <div class="form-group">
    <label for="fellowship">Designation in fellowship:</label>
    <input type="text" class="form-control" id="Designation">
  </div>


   <div class="form-group">
    <label for="scripture">Favorite scripture:</label>
    <textarea class="form-control" id="scripture" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="quote">Favorite Pastor Chris’ quote:</label>
    <textarea class="form-control" id="quote" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="love">What do you love to do most?:</label>
    <textarea class="form-control" id="love" rows="3"></textarea>
  </div>
  
    <button type="submit" class="btn  sm-lg btn-primary">Update Profile</button>
     </form>
    </div>
      </div>
    </div>
    
  </div>
</main>

<?php include_once('includes/footer.php');?>