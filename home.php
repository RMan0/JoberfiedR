  

  <section id="banner">
   
 <!-- Slider -->
<div id="main-slider" class="flexslider">
    <ul class="slides">
        <li>
            <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/1.png" alt="" />
            <div class="flex-caption">
                <!-- Add content for the first slide here -->
            </div>
        </li>
      
    </ul>
</div>
<!-- End Slider -->

 
    <div class="slider">
        <!-- Images will be added here dynamically -->
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="slick/slick.min.js"></script>
    <script>
        // Fetch image data from the server
        $.getJSON('api/get_images.php', function(data) {
            const slider = $('.slider');
            data.forEach(image => {
                slider.append(
                    `<div><img src="${image.image_url}" alt="${image.title}"></div>`
                );
            });

            // Initialize the slider
            $('.slider').slick({
                autoplay: true,
                arrows: false
            });
        });
    </script>


  </section> 
  <section id="call-to-action-2" style="background-color: #fff; 
                                       border-width: 1px; 
                                       border-color: grey; 
                                       box-shadow: 0 1px 3px 0  #ccc;
                                       border-radius: 10px;">
    <div class="container" >
      <div class="row">
        <div class="col-md-10 col-sm-9" >
          <h3>Partner with Business Leaders</h3>
          <p>Development of successful, long term, strategic relationships between customers and suppliers, based on achieving best practice and sustainable competitive advantage. In the business partner model, HR professionals work closely with business leaders and line managers to achieve shared organisational objectives.</p>
        </div>
       <div class="col-md-2 col-sm-3">
          <a href="#" class="btn btn-primary">Read More</a>
        </div> 
      </div>
    </div>
  </section>
  <!-------------------------------------------------------START CARD----------------------------------------------------------->

  <section id="content" style="background-color: #F1F0F0;">
    <div class="container" >
      <div class="row">     
        <div class="col-md-12 ">
        <div class="aligncenter"><h2 class="aligncenter">Job</h2>
      <div class="info-blocks-in" style="margin-top: 25px;">

    
<?php 
      $sql = "SELECT * FROM `tbljob`";
      $mydb->setQuery($sql);
      $comp = $mydb->loadResultList();


      foreach ($comp as $job ) {
        # code...
    
    ?>
    
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-building-o"></i>
                <div class="info-blocks-in" style="background-color: #fff; 
                                       border-width: 1px; 
                                       border-color: grey; 
                                       box-shadow: 0 2px 3px 0  #ccc;
                                       border-radius: 10px;
                                       margin-top: 30px;
                                       padding-bottom: 30px;">
                    <div  id="image-container">
                      <img title="job photo"  data-target="#myModal"  data-toggle="modal"  src="<?php echo web_root.'admin/vacancy/'.$job->JOBPHOTO; ?>">  
                    </div>
                    <p><?php echo $job->JOBPHOTO;?></p>
                    <h3><?php echo $job->CATEGORY;?></h3>
                    <p><?php echo $job->OCCUPATIONTITLE;?></p>
                    <p>Salary :<?php echo $job->SALARIES;?></p>
                    <p>Qualification/Work Experience :<?php echo $job->QUALIFICATION_WORKEXPERIENCE;?></p>
                    <p>Job Description :<?php echo $job->JOBDESCRIPTION;?></p>
                    <p>Date Posted :<?php echo $job->DATEPOSTED;?></p>
                    
                    <?php
            if (isLoggedIn()) {
        if (isset($_GET['search'])) {
            $COMPANYNAME = $_GET['search'];
        } else {
            $COMPANYNAME = '';
        }
        
        $sql = "SELECT * FROM `tblcompany` c, `tbljob` j 
                WHERE c.`COMPANYID` = j.`COMPANYID` AND COMPANYNAME LIKE '%" . $COMPANYNAME . "%' 
                ORDER BY DATEPOSTED DESC";
        $mydb->setQuery($sql);
        $jobList = $mydb->loadResultList();

      
            echo '<a href="' . web_root . 'index.php?q=viewjob&search=' . $job->JOBID . '" class="btn btn-main btn-next-tab">View Details</a><br>';
    } else {
        echo '<a class="btn btn-main btn-next-tab pull-right login" data-target="#myModal" data-toggle="modal" href="">Login to Apply</a><br>';
    }
    ?>
                </div>
                
            </div>
           
    <?php } ?> 
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>

  <!-------------------------JOB SECTION---------------------->
  <!--<section id="content">
  
  
  <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="aligncenter"><h2 class="aligncenter">Company</h2>
         </div>
        <br/>
      </div>
    </div>

<?php
$sql = "SELECT * FROM `tblcompany`";
$mydb->setQuery($sql);
$comp = $mydb->loadResultList();

function isLoggedIn() {
    return isset($_SESSION['APPLICANTID']);
}

foreach ($comp as $company) {
    echo '<div class="col-sm-4 info-blocks">';
    echo '<i class="icon-info-blocks fa fa-building-o"></i>';
    echo '<div class="info-blocks-in">';
    echo '<h3>' . $company->COMPANYNAME . '</h3>';
    echo '<div class="table-responsive mailbox-messages">';
    
    $sql = "SELECT * FROM `tblcompany` c, `tbljobregistration` j, `tblfeedback` f 
            WHERE c.`COMPANYID` = j.`COMPANYID` AND j.`REGISTRATIONID` = f.`REGISTRATIONID`";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();
    
    foreach ($cur as $result) {
        echo '<div>';
        echo '<p>' . $result->REMARKS . '</p>';
        echo '</div>';
    }

    echo '<div>'; // Open a new <div> for the "Apply Now" button card.
    
    if (isLoggedIn()) {
        if (isset($_GET['search'])) {
            $COMPANYNAME = $_GET['search'];
        } else {
            $COMPANYNAME = '';
        }
        
        $sql = "SELECT * FROM `tblcompany` c, `tbljob` j 
                WHERE c.`COMPANYID` = j.`COMPANYID` AND COMPANYNAME LIKE '%" . $COMPANYNAME . "%' 
                ORDER BY DATEPOSTED DESC";
        $mydb->setQuery($sql);
        $jobList = $mydb->loadResultList();

        foreach ($jobList as $job) {
            echo '<a href="' . web_root . 'index.php?q=viewjob&search=' . $job->JOBID . '" class="btn btn-main btn-next-tab">Apply Now!</a><br>';
        }
    } else {
        echo '<a class="btn btn-main btn-next-tab pull-right login" data-target="#myModal" data-toggle="modal" href="">Login to Apply</a><br>';
    }

    echo '</div>'; // Close the <div> for the "Apply Now" button card.
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>
 </div>
  </section>-->
                
                
               


<!-------------------------TRAINING SECTION---------------------->
<section id="content" style="background-color: #F1F0F0;">
    <div class="container" >
      <div class="row">     
        <div class="col-md-12 " style="background-color: #fff; 
                                       border-width: 1px; 
                                       border-color: grey; 
                                       box-shadow: 0 2px 3px 0  #ccc;
                                       border-radius: 10px;">
        <div class="aligncenter"><h2 class="aligncenter">Training</h2></div>
      <div class="info-blocks-in" style="margin-top: 25px;"> 
          <?php 
            $sql = "SELECT * FROM `tblcategory`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.'</a></div>';
            }
          ?>
        </div>
        </div>
      </div>
      </div>    
  </section>    
<!-------------------------TRAINING SECTION END---------------------->
<section id="content" style="background-color: #F1F0F0;">
    <div class="container" >
      <div class="row">     
        <div class="col-md-12 " style="background-color: #fff; 
                                       border-width: 1px; 
                                       border-color: grey; 
                                       box-shadow: 0 2px 3px 0  #ccc;
                                       border-radius: 10px;">
                                       
        <div class="aligncenter"><h2 class="aligncenter">Training</h2></div>
      <div class="info-blocks-in" style="margin-top: 25px;">
          <?php 
            $sql = "SELECT * FROM `tblcategory`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.web_root.'index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.'</a></div>';
            }
          ?>
      </div>
        </div>
      </div>
      </div>
   
  </section>    

  <section id="content-3-10" class="content-block data-section nopad content-3-10">
  <div class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">

    </div>
  </div>

  <div class="container-fluid" >
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
        <div class="editContent">
          <h3>About Peso</h3>
        </div>
        <div class="editContent"  style="height:235px;">
          <p> 
          &nbsp;&nbsp;The Public Employment Service Office or PESO is a multi-service facility established to provide employment information and assistance to the Department of Labor and Employment (DOLE) clients and constituents of Local Government Units (LGU).<br/><br/>

        </div> 
      </div>
    </div><!-- /.row-->
  </div><!-- /.container -->
</section>
  
  <div class="about home-about">
        <div class="container">
            
           
                  </div>
              </div>
  