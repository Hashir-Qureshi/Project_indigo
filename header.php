        <nav class="navbar fixed-top first-navbar center">
            <div class="navbar-text py-0 mx-auto" style="text-align: center;" >
              <div class="navbar-header ">
                  <span href="" style="font-family:'Roboto', sans-serif; color:#fff;"><b>C.H.E.S.S.</b></span>
                  <div style="font-family:'Roboto Condensed', sans-serif; color:#fff;">Computerized Homework Exercise SyStem</div>
              </div>
            </div>
        </nav>

        <nav class="navbar fixed-top " style="background-color: #333; margin-top:53.5938px; text-align: center; margin-bottom:0; height: 45px;">
            
                
                    <span class="mr-auto" href="" style="font-family:'Roboto Condensed', sans-serif; color:#fff;"><b><?php echo "Logged in as: ".ucfirst($_SESSION['user'])?></b></span>
                    <form class="ml-auto" action="" method="POST"  style="margin-top: auto;">
                        <button type="submit" class="btn btn-default btn-primary btn-sm" name="logout" value="Logout">Logout</button>                        
                    </form>
                
            
        </nav>  