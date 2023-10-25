  
  <section id="banner">
   
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/1.png" alt="" />
                <div class="flex-caption">
                    <h3>peso</h3> 
                    <h3>mabini</h3> 
          <p>Here to help you have a satisfying career.</p> 
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Specialize</h3> 
          <p>Success depends on work</p> 
           
                </div>
              </li>
            </ul>
        </div>
  <!-- end slider -->
 
  </section> 
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Partner with Business Leaders</h3>
          <p>Development of successful, long term, strategic relationships between customers and suppliers, based on achieving best practice and sustainable competitive advantage. In the business partner model, HR professionals work closely with business leaders and line managers to achieve shared organisational objectives.</p>
        </div>
       <div class="col-md-2 col-sm-3">
          <a href="#" class="btn btn-primary">Read More</a>
        </div> 
      </div>
    </div>
  </section>
  
  <section id="content">
  
  
  <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="aligncenter"><h2 class="aligncenter">Job</h2>
         </div>
        <br/>
      </div>
    </div>



  

<!-------------------------------------------------------START CARD----------------------------------------------------------->

    
<?php 
      $sql = "SELECT * FROM `tbljob`";
      $mydb->setQuery($sql);
      $comp = $mydb->loadResultList();


      foreach ($comp as $job ) {
        # code...
    
    ?>
    
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-building-o"></i>
                <div class="info-blocks-in">
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
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aligncenter">
            <h2 class="aligncenter">Training</h2>  
          </div>
        </div>
      </div>
      
      <div class="row">
        
        <div class="col-md-12 " style="background-color: #e4ffe4; box-shadow: 4px 4px 5px 0.5px #ccc;">
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

  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aligncenter">
            <h2 class="aligncenter">Popular Jobs</h2>  
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12 " style="background-color: #e4ffe4; box-shadow: 4px 4px 5px 0.5px #ccc;">
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
  </section>    
  <section id="content-3-10" class="content-block data-section nopad content-3-10">
  <div class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">

    </div>
  </div>

  <div class="container-fluid">
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
              
            </div>
            
                        
             
            <br>
           
            </div>
            
          </div>