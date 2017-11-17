<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bitcoin Blockchain Explorer</title>

    <!-- Bootstrap -->
    <!-- Remember to update Bootstrap libraries as necessary: https://www.youtube.com/watch?v=OU8wX88mulk-->
    <!-- Quick start use Bootstrap CDN: -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
      
    <script type='text/javascript' src='http://www.x3dom.org/download/x3dom.js'> </script>

    <script
    src="http://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
  </script>


    <link rel='stylesheet' type='text/css' href='http://www.x3dom.org/download/x3dom.css'/>
    <link href="../styles/custom.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>

      
    <!-- 
        * This div provides a default nav bar style, which can be fixed at the top of the screen
        * You can set also use navbar-inverse to make the navbar black, but I have set this in CSS instead, and you can also set the navbar-static-top to ...
    --> 
    <div class="navbar navbar-preheader navbar-default navbar-fixed-top" role="navigation">  
      <div class="container"> 
        <div class="navbar-header">
          <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> -->
          <div class="logo">
            <a class="navbar-brand" href="#"><h1>Exploring Blockchain Transactions</h1></a>
          </div>
          <div class="logo">
            <a class="navbar-brand" href="#"><h2>An API and web socket approach to visualizing bitcoin blockchain transactions </h2></a>
          </div>
        </div> 
      </div>
    </div>
          
  <!-- Create a fluid container to hold the contents-->
  <div class="container-fluid"> 
    <!-- Use a Bootstrap 4 collaspe accordion to show and hide each of the 3 parts of the blockchain tutor 
            http://v4-alpha.getbootstrap.com/components/collapse/
    -->
    <div id="accordion" role="tablist" aria-multiselectable="true">   
      
      <!-- Topics in Computer Science: Exploring the Bitcoin Blockchain-->
      <!-- Set up a collapsible card presenting Bitcoin echange rates --> 
      <div class="card">
          <div class="card-header" role="tab" id="headingOne">
              <div class="mb-0">
                <!-- Make the div clickable using one of several ways:
                     1) with 'a href', strictly speaking should use the 'a href' attribute together wrapped around the div in HTML5 (I think), but doing it this way means we would have to style away the default inline on the link. But, it has the advantage of making the whole div tag clickable.
                     2) We also appear to be able to just use the a href to target the div collapse, but this might not be pucker, although it works also wth a p, and other element?
                     3) Use the data-target attribute, which is simple and non-controvertial, I think?
                 -->
                <div class="section_1" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"></div> 
              </div>
          </div>

          <!-- Use the class="collapse in" to open the block in load -->
          <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block">
              <div class="row">
                <div class="col-sm-4" style="background-color:lightgrey;">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <!-- <img class="img-thumbnail" id="1" data-toggle="modal" data-target="#myModal" src="assets/images/image_1.jpg" alt="Part 1 WIP Image 1"> -->
                  <div id="image_0" style="border:none" >Media object will insert here</div>
                </div> <!-- End column -->
                <div class="col-sm-4" style="background-color:lightgrey;">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_1" style="border:none" >Media object will insert here</div>
                </div> <!-- End column -->
                <div class="col-sm-4" style="background-color:lightgrey;">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_2" style="border:none" >Media object will insert here</div>
                </div> <!-- End column -->
              </div> <!--End image row -->             
            
              <div class="row">
                <div class="col-sm-4" style="background-color:lavender;">
                    <!-- Create title, subtitle and short descriptions as required -->
                    <div class="title_0"></div> 
                    <div class="subTitle_0"></div> 
                    <div class="row"> 
                        <div class="col-sm-8" style="background-color:lightcyan;"> 
                            <div class="description_0"></div>
                        </div>
                        <div class="col-sm-4" style="background-color:lightgray;"> 
                            <div id="bitfinex_lp"></div>
                            <!-- <a href="#" class="btn btn-danger">Download</a> --> 
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end column -->
                
                <div class="col-sm-4" style="background-color:lavender;">
                    <!-- Create title, subtitle and short descriptions as required -->
                    <div class="title_1"></div> 
                    <div class="subTitle_1"></div>  
                    <div class="row"> 
                        <div class="col-sm-8" style="background-color:lightcyan;">      
                            <div class="description_1"></div>  
                        </div>
                        <div class="col-sm-4" style="background-color:lightgray;">      
                            <div id="bitstamp_lp"></div>
                            <!-- <a href="#" class="btn btn-danger">Download</a> -->
                        </div>
                    </div>
                </div> <!-- end column -->
                
                <div class="col-sm-4" style="background-color:lavender;">
                    <!-- Create title, subtitle and short descriptions as required -->
                    <div class="title_2"></div> 
                    <div class="subTitle_2"></div>  
                    <div class="row">
                        <div class="col-sm-8" style="background-color:lightcyan;">     
                            <div class="description_2"></div> 
                        </div>
                        <div class="col-sm-4" style="background-color:lightgray;">     
                          <div id="coinbase_lp"></div> 
                            <!-- <a href="#" class="btn btn-danger">Download</a> -->
                        </div>
                  </div>
                </div> <!-- end column -->
              </div> <!-- end title and sub-title row -->   

            </div> <!-- end the panel body -->
          </div> <!-- end the panel collapse -->
      </div> <!-- end the card -->
        
      <!-- Set up a collapsible card presenting Bitcoin blockchain information using APIs --> 
      <div class="card">
          <div class="card-header" role="tab" id="headingTwo">
              <div class="mb-0">
                <div class="section_2" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"></div>
              </div>
          </div>

          <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-block">

              <div class="row">               
                
                <div class="col-sm-3">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_3" style="border:none" >Media object will insert here</div>
                  <div class="title_3"></div>
                  <div class="subTitle_3"></div>        
                  <div class="description_3"></div>
                  <div id="current_block_height"></div>
                  <!-- <a href="#" class="btn btn-danger">Download</a> -->
                </div> 

                <div class="col-sm-3">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_4" style="border:none" >Media object will insert here</div>
                  <div class="title_4"></div>
                  <div class="subTitle_4"></div>        
                  <div class="description_4"></div>  
                  <div id="bits_transacted"></div>
                  <!-- <a href="#" class="btn btn-danger">Download</a> -->
                </div>

                <div class="col-sm-3">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_5" style="border:none" >Media object will insert here</div>
                  <div class="title_5"></div> 
                  <div class="subTitle_5"></div>        
                  <div class="description_5"></div> 
                  <div id="miner_address"></div>
                  <!-- <a href="#" class="btn btn-danger">Download</a> -->
                </div>
                
                <div class="col-sm-3">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_6" style="border:none" >Media object will insert here</div>
                  <div class="title_6"></div> 
                  <div class="subTitle_6"></div>        
                  <div class="description_6"></div>
                  <div id="amount"></div>
                  <!-- <a href="#" class="btn btn-danger">Download</a> -->
                </div>
                
                <div class="col-sm-3">
                  <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                  <div id="image_7" style="border:none" >Media object will insert here</div>
                  <div class="title_7"></div>
                  <div class="subTitle_7"></div>        
                  <div class="description_7"></div> 
                  <div id="total_bitcoins"></div>
                  <!-- <a href="#" class="btn btn-danger">Download</a> -->
                </div>
              </div> <!-- end the row -->
            </div> <!-- end the card block -->
          </div> <!-- end the card collapse -->
      </div> <!-- end the card-->
    
      <!-- Set up a collapsible card presenting bitcoin blockchain information using Websockets--> 
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <div class="mb-0">
              <div class="section_3" data-toggle="collapse" data-parent="#accordion" data-target="#collapse3" aria-expanded="false" aria-controls="collapse2"></div>
            </div>
        </div>

        <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-block">

            <div class="row">               
              
              <div class="col-sm-4">
                <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal -->
                <div id="image_8" style="border:none" >Media object will insert here</div>
                <div class="title_8"></div>
                <div class="subTitle_8"></div>        
                 <div class="description_8"></div> 
                 <div id="messages"></div>
                <!-- <a href="#" class="btn btn-danger">Download</a> -->
              </div> 

            </div> <!-- end the row -->
          </div> <!-- end the card block -->
        </div> <!-- end the card collapse -->
      </div> <!-- end the card-->

      <!-- Set up a collapsible card presenting Bitcoin blockchain information using Webchain APIs--> 
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <div class="mb-0">
              <div class="section_4" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4" aria-expanded="false" aria-controls="collapse2"></div>
            </div>
        </div>

        <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-block">

            <div class="row">               
              
              <div class="col-sm-4">
                <!-- Make this asset a thumbnail image acting as a button to launch a larger image in a Bootstrap modal
                <div id="image_3" style="border:none" >Media object will insert here</div>
                <div class="title_3"></div>
                <div class="subTitle_3"></div>        
                <div class="description_3"></div>  -->
                <!-- <a href="#" class="btn btn-danger">Download</a> -->
              </div> 

            </div> <!-- end the row -->
          </div> <!-- end the card block -->
        </div> <!-- end the card collapse -->
      </div> <!-- end the card-->

    </div> <!-- end accordion -->   
  </div> <!-- end container -->

  <!-- Create a shared Modal for all the images to display the larger version of the above image assets -->
  <div id="myModal" class="modal fade"  role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <!-- modal header -->
        <div class="modal-header">
          <!-- I need to figure out how to pass the subTitle into the model to chnage the Modal header for each asset? -->
          <div class="modal-title">Image Asset</div>
        </div>
        <!-- modal body -->
        <div class="modal-body">
            <img class="img-responsive" src="">
        </div>
        <!-- modal footer -->
        <div class="modal-footer"> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>
  
      
      
  <!-- 
   * This div provides a default nav bar style, which can be fixed at the bottom of the screen
   * You can set also use navbar-inverse to make the navbar black, and style the footer text with navbar-text
   --> 
  <!--<div class="navbar navbar-static-bottom navbar-inverse" role="navigation">-->
  <div class="footer">
    <div class="container-fluid">   
      <div class="navbar-text pull-left">
        <p> &copy 2017 Topics in Computer Science — Blockchain Tutorials</p>
      </div>
      <div class="navbar-text pull-right">
          <div class="name">Tutor Name</div>
          <div class="email">Contact</div>
      </div>
    </div>
  </div> 
      
  <!-- Modal -->
  <div class="modal fade" id="sooModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Statement of Originality</h4>
        </div>
        <div class="modal-body">
          <div class="statement"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      
      

  <!-- jQuery and tether are necessary for Bootstrap's JavaScript plugins) -->
  <!-- Quick start user the Bootsrap CDN, but update as necessary -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

  <script src="../scripts/video.js"></script>
  <script src="../scripts/lightBox.js"></script>    
  <script src="../scripts/getViewData.js"></script>
  <script src="../scripts/bitcoinTransactionValuesRealtime.js"></script>
  <script src="../scripts/getBitcoinData.js"></script>

  </body>
</html>