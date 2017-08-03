        <nav class="navbar fixed-top first-navbar" style="text-align: center;">
            <div class="navbar-text py-0">
              <div class="navbar-header">
                  <span href="" style="font-family:'Roboto', sans-serif; color:#fff;"><b>C.H.E.S.S</b></span>
                  <div style="font-family:'Roboto', sans-serif; color:#fff;">Computerized Homework Exercise SyStem</div>
              </div>
            </div>
        </nav>

        <nav class="navbar fixed-top" style="background-color: #333; margin-top:53.5938px; text-align: center; margin-bottom:0;">
            <div class="navbar-text py-0">
                <div class="navbar-header">
                    <span class="float-left" href="" style="font-family:'Roboto', sans-serif; color:#fff;"><b><?php echo "Logged in as: ".$_SESSION['user'];?></b></span>
                    <form class="float-right" action="" method="POST" style="margin-left:0;">
                        <button type="submit" class="btn btn-default btn-primary btn-sm" name="logout" value="Logout">Logout</button>                        
                    </form>
                </div>
            </div>
        </nav>